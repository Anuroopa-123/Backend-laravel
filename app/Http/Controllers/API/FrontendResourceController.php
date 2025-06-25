<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Entrepreneurship;
use App\Models\Event;
use App\Models\Hackathon;
use App\Models\Job;
use App\Models\MediaCategory;
use App\Models\MediaItem;
use App\Models\News;
use App\Models\Slider;
use App\Models\Workshop;

class FrontendResourceController extends Controller
{
    public function entrepreneurships()
    {
        $result = Entrepreneurship::all()->toArray();
        return $result;
    }

    public function events()
    {
        $result = Event::all()->toArray();
        return $result;
    }

    public function hackathons()
    {
        $result = Hackathon::with('showcaseImages')->get();
        return $result;
    }

    public function jobs()
    {
        $result = Job::all()->toArray();
        return $result;
    }

    public function mediaCategories()
    {
        $result = MediaCategory::all()->toArray();
        return $result;
    }

    public function mediaItems()
    {
        $result = MediaItem::all()->toArray();
        return $result;
    }

    public function news()
    {
        $result = News::all()->toArray();
        return $result;
    }

    public function sliders()
    {
        $result = Slider::all()->toArray();
        return $result;
    }

    public function workshops()
    {
        $result = Workshop::all()->toArray();
        return $result;
    }
}
