<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeData = HomeSlide::find(1);
        return view('admin.home.home_slider', compact('homeData'));
    }

    public function updateHomeSlide(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'short_title' => 'required|min:3',
            'vedio_url' => 'required',
            'home_img' => 'required'
        ]);

        $sliderId = $request->value;
    }
}
