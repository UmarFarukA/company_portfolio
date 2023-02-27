<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function AboutSetup()
    {
        $aboutpage = About::find(1);
        return view('admin.about.about_all', compact('aboutpage'));
    }

    public function upadateAbout()
    {
    }
}
