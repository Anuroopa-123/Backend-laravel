<?php

namespace App\Http\Controllers;

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
        
    }

    public function editForm($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.edit', compact('workshop'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
