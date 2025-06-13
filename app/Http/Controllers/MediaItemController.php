<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
use Illuminate\Http\Request;

class MediaItemController extends Controller
{
    public function index()
    {
        $mediaItems = MediaItem::all();
        return view('mediaItems.index',compact('mediaItems'));
    }

    public function create()
    {
        return view('mediaItems.create');
    }

    public function add(Request $request)
    {
        
    }

    public function editForm($id)
    {
        $mediaItem = MediaItem::findOrFail($id);
        return view('mediaItems.edit', compact('mediaItem'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
