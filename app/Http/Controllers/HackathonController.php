<?php

namespace App\Http\Controllers;

use App\Models\Hackathon;
use Illuminate\Http\Request;

class HackathonController extends Controller
{
    public function index()
    {
        $hackathons = Hackathon::all();
        return view('hackathon.index',compact('hackathons'));
    }

    public function create()
    {
        return view('hackathon.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'is_published' => 'nullable|boolean',
            'font_style' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/hackathons');
            $image->move($destinationPath, $originalName);
            $imagePath = 'uploads/hackathons/' . $originalName;
        } else {
            $imagePath = null;
        }

        Hackathon::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'image' => $imagePath,
            'is_published' => $request->has('is_published') ? 1 : 0,
            'font_style' => $request->font_style,
        ]);

        return redirect()->route('hackathons.list')->with('success',"Created successfully");
    }

    public function editForm($id)
    {
        $hackathon = Hackathon::findOrFail($id);
        return view('hackathon.edit', compact('hackathon'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif',
            'is_published' => 'nullable|boolean',
            'font_style' => 'required|string'
        ]);

        // Edit Record
        $event = Hackathon::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            $image = $request->file('image');
            $originalName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/hackathons');
            $image->move($destinationPath, $originalName);
            $imagePath = 'uploads/hackathons/' . $originalName;
        } else {
            $imagePath = $event->image;
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'image' => $imagePath,
            'is_published' => $request->has('is_published') ? 1 : 0,
            'font_style' => $request->font_style
        ]);

        return redirect()->route('hackathons.list')->with('success', 'Updated!');
    }

    public function delete($id)
    {
        $hackathon = Hackathon::findOrFail($id);
        if ($hackathon->image && file_exists(public_path($hackathon->image))) {
            unlink(public_path($hackathon->image));
        }

        $hackathon->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
