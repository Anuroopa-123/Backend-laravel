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
        $result = Entrepreneurship::where('is_published', true)
                                    ->orderBy('created_at','desc')
                                    ->get()->toArray();
        return $result;
    }

    public function events($category)
    {
        $result = Event::where('is_published', true)
                        ->where('category',$category)
                        ->get()->toArray();
        return $result;
    }

    public function hackathons()
    {
        $result = Hackathon::where('is_published', true)->with('showcaseImages')->get();
        return $result;
    }

    public function jobs()
    {
        $result = Job::where('is_published', true)->get()->toArray();
        return $result;
    }

    public function mediaCategories()
    {
        $result = MediaCategory::where('is_published', true)->get()->toArray();
        return $result;
    }

    public function mediaItems($category)
    {
        $result = MediaItem::where('is_published', true)
                            ->where('category',$category)
                            ->get()->toArray();
        return $result;
    }

    public function news()
    {
        $result = News::where('is_published', true)->get()->toArray();
        return $result;
    }

    public function sliders()
    {
        $result = Slider::where('is_published', true)->get()->toArray();
        return $result;
    }

    public function workshops()
    {
        $result = Workshop::where('is_published', true)->get()->toArray();
        return $result;
    }
}
