<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class extraController extends Controller
{
    public function english()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'english');
        return redirect()->back();
    }

    public function arabic()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'arabic');
        return redirect()->back();
    }

    public function postSingle($id)
    {
        $post = post::with(['category', 'district', 'user'])->findOrFail($id);

        return view('main.singlePost', compact('post'));
    }

    public function all_post($id, $category_en)
    {
        $cateposts = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('main.cateposts', compact('cateposts'));
    }

    public function all_postsub($id, $subcategory_en)
    {
        $subcateposts = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('main.subcateposts', compact('subcateposts'));
    }

    public function getSubDistrictFrontend($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function searchDistrict(Request $request)
    {
        $districtId = $request->district_id;
        $subdistrictId = $request->subdistrict_id;
        $cateposts = DB::table('posts')->where('district_id', $districtId)->
            where('subdistrict_id', $subdistrictId)->orderBy('id', 'desc')->paginate(5);
        return view('main.cateposts', compact('cateposts'));
    }
}
