<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobapplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'resume' => 'required|mimes:pdf'
        ]);

        $resumePath = $request->file('resume')->storeAs('resumes',time().'_'.$request->file('resume')->getClientOriginalName());

        JobApplication::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'resume' => $resumePath
        ]);

        return response()->json(['message'=>'Posted Successfully!']);
    }
}
