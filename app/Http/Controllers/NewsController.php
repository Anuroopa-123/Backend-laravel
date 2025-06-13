<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index',compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function add(Request $request)
    {
        
    }

    public function editForm($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
