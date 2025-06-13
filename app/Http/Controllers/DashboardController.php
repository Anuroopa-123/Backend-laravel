<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneurship;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $entrepreneurships = Entrepreneurship::all()->toArray(); 
        $events = Event::all()->toArray();

        $timelines = array_merge(
            $entrepreneurships,
            $events,
        );

        return view('dashboard', compact('timelines'));
    }
}
