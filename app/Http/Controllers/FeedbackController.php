<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email',
            'visitPurpose' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Feedback::create($validated);

        return response()->json(['message' => 'Feedback submitted successfully'], 201);
    }
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('feedback.index', compact('feedbacks'));
    }
    public function create()
    {
        return view('feedbacks.create');
    }
}
