<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ad;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class adsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ad_list()
    {
        $ads = DB::table('ads')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.advertisement.ads', compact('ads'));
    }

    public function ad_add()
    {
        return view('Backend.advertisement.createads');
    }

    public function storeAds(Request $request)
    {
        $data['link'] = $request->link;

        if ($request->type == 1) {
            $image = $request->ad;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(970, 90)->save('image/ads/' . $image_one);
                $data['ad'] = 'image/ads/' . $image_one;
                $data['type'] = 1;
                ad::create($data);
                Toastr::success('Horizontal Ad Inserted Successfully', 'success');
                return redirect()->route('ads_list');
            } else {
                return redirect()->back();
            }
        } else {
            $image = $request->ad;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(500, 500)->save('image/ads/' . $image_one);
                $data['ad'] = 'image/ads/' . $image_one;
                $data['type'] = 0;
                ad::create($data);
                Toastr::success('Vertical Ad Inserted Successfully', 'success');
                return redirect()->route('ads_list');
            } else {
                return redirect()->back();
            }
        }

    }

    public function editAds($id)
    {
        $ad = ad::findOrFail($id);
        return view('Backend.advertisement.editads', compact('ad'));
    }

    public function updateAds(Request $request, $id)
    {
        $ad = ad::findOrFail($id);
        $data['link'] = $request->link;
        $oldad = $request->oldad;
        if ($request->type == 1) {
            $image = request()->ad;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(970, 90)->save('image/ads/' . $image_one);
                $data['ad'] = 'image/ads/' . $image_one;
                $data['type'] = 1;
                unlink($oldad);
                $ad->update($data);
                Toastr::success('Horizontal Advertisement Updateded Successfully', 'success');
                return redirect()->route('ads_list');
            } else {
                $data['ad'] = $oldad;
                $ad->update($data);
                Toastr::success('Horizontal Advertisement Updateded Successfully', 'success');
                return redirect()->route('ads_list');
            }
        } else {
            $image = request()->ad;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(500, 500)->save('image/ads/' . $image_one);
                $data['ad'] = 'image/ads/' . $image_one;
                $data['type'] = 0;
                unlink($oldad);
                $ad->update($data);
                Toastr::success('Vertical Advertisement Updateded Successfully', 'success');
                return redirect()->route('ads_list');
            } else {
                $data['ad'] = $oldad;
                $ad->update($data);
                Toastr::success('Vertical Advertisement Updateded Successfully', 'success');
                return redirect()->route('ads_list');
            }
        }
    }

    public function deleteAds($id)
    {
        $ad = ad::findOrFail($id);
        unlink($ad->ad);
        $ad->delete();
        return redirect()->route('ads_list');
    }
}
