<?php

namespace App\Http\Controllers;

use App\Helpers\TimelineLog;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index',compact('workshops'));
    }

    public function create()
    {
        return view('workshops.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'is_published' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/workshops');
            $image->move($destinationPath, $originalName);
            $imagePath = 'uploads/workshops/' . $originalName;
        } else {
            $imagePath = null;
        }

        $workshop = Workshop::create([
            'image' => $imagePath,
            'is_published' => $request->has('is_published') ? 1 : 0
        ]);

        TimelineLog::log("Workshop - {$workshop->id}",'Created');

        return redirect()->route('workshops.list')->with('success','Created!');
    }

    public function editForm($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.edit', compact('workshop'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg,gif',
            'is_published' => 'nullable|boolean'
        ]);

        $workshop = Workshop::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($workshop->image && file_exists(public_path($workshop->image))) {
                unlink(public_path($workshop->image));
            }
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/workshops');
            $image->move($destinationPath, $originalName);
            $imagePath = 'uploads/workshops/' . $originalName;
        } else {
            $imagePath = $workshop->image;
        }

        $workshop->update([
            'image' => $imagePath,
            'is_published' => $request->has('is_published') ? 1 : 0,
        ]);

        TimelineLog::log("Workshop - {$workshop->id}",'Updated');

        return redirect()->route('workshops.list')->with('success','Updated!');
    }

    public function delete($id)
    {
        $workshop = Workshop::findOrFail($id);
        if ($workshop->image && file_exists(public_path($workshop->image))) {
            unlink(public_path($workshop->image));
        }

        $workshop->delete();

        TimelineLog::log("Workshop - {$workshop->id}",'Deleted');

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
