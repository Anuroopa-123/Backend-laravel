<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function add(Request $request)
    {
        
    }

    public function editForm($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.edit', compact('slider'));
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        
    }
}
