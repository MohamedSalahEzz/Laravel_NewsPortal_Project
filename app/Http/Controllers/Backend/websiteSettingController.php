<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\websiteSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class websiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mainWebsetting()
    {
        $websetting = DB::table('website_settings')->first();
        if (empty($websetting)) {
            $data = [];
            websiteSetting::create($data);
        }
        $websetting = DB::table('website_settings')->first();
        return view('Backend.settings.website', compact('websetting'));
    }

    public function mainWebUpdate(Request $request, $id)
    {
        $websetting = websiteSetting::findOrFail($id);
        $data = array();
        $data['address_en'] = $request->address_en;
        $data['address_ar'] = $request->address_ar;
        $data['phone_en'] = $request->phone_en;
        $data['phone_ar'] = $request->phone_ar;
        $data['email'] = $request->email;

        $oldlogo = request()->oldlogo;
        $logo = request()->logo;
        if ($logo) {
            $logo_one = uniqid() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(320, 130)->save('image/logo/' . $logo_one);
            $data['logo'] = 'image/logo/' . $logo_one;
            $websetting->update($data);
            unlink($oldlogo);

            Toastr::success('Website Setting Updated Successfully', 'success');
            return redirect()->route('website.setting');
        } else {
            $data['logo'] = $oldlogo;
            $websetting->update($data);
            Toastr::success('Website Setting Updated Successfully', 'success');
            return redirect()->route('website.setting');
        }

    }
}
