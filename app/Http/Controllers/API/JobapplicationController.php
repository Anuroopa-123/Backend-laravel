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
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'resume' => 'required|mimes:pdf'
        ]);

        $resumePath = $request->file('resume')->store('resumes');

        JobApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'resume' => $resumePath
        ]);

        return response()->json(['success'=>true, 'message'=>'Posted Successfully!']);
    }
}
