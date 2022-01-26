<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Admin Logout');
    }

    public function accountSetting()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('Backend.account.profile', compact('editData'));
    }

    public function editProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('Backend.account.profile_edit', compact('editData'));
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['address'] = $request->address;
        $data['position'] = $request->position;
        $data['gender'] = $request->gender;

        $oldimage = request()->oldimage;
        $image = request()->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 130)->save('image/profile/' . $image_one);
            $data['image'] = 'image/profile/' . $image_one;
            $editData->update($data);
            unlink($oldimage);

            Toastr::success('User Profile Updated Successfully', 'success');
            return redirect()->route('account.setting');
        } else {
            $data['image'] = $oldimage;
            $editData->update($data);
            Toastr::success('User Profile Updated Successfully', 'success');
            return redirect()->route('account.setting');
        }
    }
}
