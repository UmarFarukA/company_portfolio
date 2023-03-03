<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;

class AboutController extends Controller
{
    public function AboutSetup()
    {
        $aboutpage = About::find(1);
        return view('admin.about.about_all', compact('aboutpage'));
    }

    public function updateAbout(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'about_img' => 'required'
        ]);

        $about_id = $request->id;

        if ($request->file('about_img')) {
            $image = $request->file('about_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('uploads/home_images/' . $filename);

            $save_url = 'uploads/home_images/' . $filename;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_img' => $save_url
            ]);
            // dd($validatedData);

            session()->flash("message", "About page updated successfully");
            return redirect()->back();
        } else {
        }
    }

    // Upload Multi-image view
    public function uploadMultiImage()
    {
        $multiImage = MultiImage::all();
        return view('admin.about.upload_multi_image', compact('multiImage'));
    }

    // Store multiple Images
    public function storeMultipleImages(Request $request)
    {
        $validateField = $request->validate(['image_path' => 'required']);

        if ($request->file('image_path')) {
            $multipleImage = $request->file('image_path');
            foreach ($multipleImage as $image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(220, 220)->save('uploads/About_images/' . $imageName);
                $save_url = 'uploads/About_images/' . $imageName;
                MultiImage::create([
                    'image_path' => $save_url
                ]);
            }

            $notification = array(
                "message" => "Successfully uploaded",
                "alert-type" => "success"
            );
            return redirect()->back()->with($notification);
        } else {
        }
    }

    // View uploaded Multiple images
    public function viewUploadedImages()
    {
        $allImages = MultiImage::all();
        return view('admin.about.view_multi_images', compact('allImages'));
    }

    // Edit images
    public function editMultiImage($id)
    {
        $editImage = MultiImage::findOrFail($id);
        return view('admin.about.edit_multi_image', compact('editImage'));
    }

    // Update Multi Image
    public function updateImage(Request $request)
    {
        $validateImage = $request->validate(['image_path' => 'required']);
        $imgId = $request->id;

        if ($request->file('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('uploads/About_images/' . $imageName);
            $save_url = 'uploads/About_images/' . $imageName;
            MultiImage::findOrFail($imgId)->update([
                'image_path' => $save_url
            ]);
            $notification = array(
                'message' => 'Image successfully updated',
                'alert-type' => 'success'
            );
            return redirect(route('about.view_images'))->with($notification);
        } else {
        }
    }

    // Delete Multi image
    public function deleteImage($id)
    {
        $image = MultiImage::findOrFail($id);
        $img = $image->image_path;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image successfully deleted',
            'alert-type' => 'success'
        );
        return redirect(route('about.view_images'))->with($notification);
    }
}
