<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index',compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function add(Request $request)
    {
        
    }

    public function editForm($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
