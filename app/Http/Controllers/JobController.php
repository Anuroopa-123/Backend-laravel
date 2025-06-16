<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{public function index()
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
        $request->validate([
            'role' => 'required|string',
            'description' => 'required|string',
            'posted_on' => 'required|date',
            'type' => 'required|string',
            'is_published' => 'nullable|boolean'
        ]);

        Job::create([
            'role' => $request->role,
            'description' => $request->description,
            'posted_on' => $request->posted_on,
            'type' => $request->type,
            'is_published' => $request->has('is_published') ? 1 : 0
        ]);

        return redirect()->route('jobs.list')->with('success',"Created successfully");
    }

    public function editForm($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string',
            'description' => 'required|string',
            'posted_on' => 'required|date',
            'type' => 'required|string',
            'is_published' => 'nullable|boolean'
        ]);

        // Edit Record
        $job = Job::findOrFail($id);

        $job->update([
            'role' => $request->role,
            'description' => $request->description,
            'posted_on' => $request->posted_on,
            'type' => $request->type,
            'is_published' => $request->has('is_published') ? 1 : 0
        ]);

        return redirect()->route('jobs.list')->with('success', 'Updated!');
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
