<?php

namespace App\Http\Controllers;

use App\Models\MediaCategory;
use Illuminate\Http\Request;

class MediaCategoryController extends Controller
{
    public function index()
    {
        $mediaCategories = MediaCategory::all();
        return view('mediaCategories.index',compact('mediaCategories'));
    }

    public function create()
    {
        return view('mediaCategories.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'is_published' => 'nullable|boolean'
        ]);

        MediaCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_published' => $request->has('is_published') ? 1 : 0
        ]);

        return redirect()->route('mediaCategories.list')->with('success',"Created!");
    }

    public function editForm($id)
    {
        $mediaCategory = MediaCategory::findOrFail($id);
        return view('mediaCategories.edit', compact('mediaCategory'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'is_published' => 'nullable|boolean'
        ]);

        $mediaCategory = MediaCategory::findOrFail($id);

        $mediaCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_published' => $request->has('is_published') ? 1 : 0,
        ]);

        return redirect()->route('mediaCategories.list')->with('success', "Updated!");
    }

    public function delete($id)
    {
        $mediaCategory = MediaCategory::findOrFail($id);
        $mediaCategory->delete();

        return response()->json(['success'=>true, 'message'=>'Deleted']);
    }
}
