<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;

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

        $sliderId = $request->id;

        if ($request->file('home_img')) {
            $image = $request->file('home_img');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 582)->save('uploads/home_images/' . $image_name);
            $save_url = 'uploads/home_images/' . $image_name;


            HomeSlide::findOrFail($sliderId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'vedio_url' => $request->vedio_url,
                'home_img' => $save_url
            ]);

            session()->flash("message", "Slider updated with Image successfully");
            return redirect()->back();
        } else {
        }
    }
}
