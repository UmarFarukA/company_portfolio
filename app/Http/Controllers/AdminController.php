<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Logout function
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash("message", "Successfully logout");

        return redirect(route('login'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    // Function that returns view for editing user profile
    public  function editProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    // Function that stores updated user profile
    public function storeProfile(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string'
        ]);

        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->username = $request->username;

        if ($request->file('profileImage')) {
            $file = $request->file('profileImage');
            $filename = $userData->username . '_' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/admin_images'), $filename);
            // $imagePath = $request->file('profileImage')->store($filename, 'public');
            $userData['profile_image'] = $filename;
        }

        $userData->save();

        $notification = array(
            "message" => "User successfully created",
            "alert-type" => "success"
        );

        return redirect(route('admin.profile'))->with($notification);
    }

    // Get the change password template
    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $validadateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|same:confirm_password'
        ]);

        if (Auth::check($user->password, $request->oldpassword)) {
            $hashPassword = bcrypt($request->newpassword);
            $user->password = $hashPassword;
            $user->save();

            $notification = array(
                "message" => "Password updated Successfully",
                "alert-type" => "success"
            );
        } else {
            $notification = array(
                "message" => "Invalid password",
                "alert-type" => "warning"
            );
        }

        return redirect()->back()->with($notification);
    }
}
