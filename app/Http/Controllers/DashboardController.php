<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneurship;
use App\Models\Event;
use App\Models\Hackathon;
use App\Models\Job;
use App\Models\MediaCategory;
use App\Models\MediaItem;
use App\Models\News;
use App\Models\Slider;
use App\Models\Workshop;

class DashboardController extends Controller
{
    public function index()
    {
        $entrepreneurships = Entrepreneurship::all()->toArray(); 
        $events = Event::all()->toArray();
        $hackthons = Hackathon::all()->toArray();
        $jobs = Job::all()->toArray();
        $mediaCategories = MediaCategory::all()->toArray();
        $mediaItems = MediaItem::all()->toArray();
        $news = News::all()->toArray();
        $sliders = Slider::all()->toArray();
        $workshops = Workshop::all()->toArray();

        $timelines = array_merge(
            $entrepreneurships,
            $events,
            // $hackthons,
            // $jobs,
            // $mediaCategories,
            // $mediaItems,
            // $news,
            // $sliders,
            // $workshops
        );

        $workshopPoster = Workshop::find(1);

        return view('dashboard', compact('timelines', 'workshopPoster'));
    }
}
