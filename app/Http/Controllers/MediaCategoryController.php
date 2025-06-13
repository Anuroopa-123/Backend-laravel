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
        
    }

    public function editForm($id)
    {
        $mediaCategory = MediaCategory::findOrFail($id);
        return view('mediaCategories.edit', compact('mediaCategory'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
