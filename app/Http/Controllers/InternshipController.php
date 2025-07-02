<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string',
            'email' => 'required|email',
            'contactNumber' => 'required|string',
            'collegeName' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'duration' => 'required|string',
            'course' => 'required|string',
            'referredBy' => 'nullable|string'
        ]);

        Internship::create($request->all());

        return response()->json(['message' => 'Internship data stored successfully'], 201);
    }

    public function index()
    {
        $internships = Internship::latest()->get();
        return view('internships.index', compact('internships'));
    }

    public function create()
    {
        return view('Internships.create');
    }
}
