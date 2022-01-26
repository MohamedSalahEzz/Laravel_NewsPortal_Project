<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\district;
use App\Models\post;
use App\Models\subcategory;
use App\Models\subdistrict;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('Backend.post.create', compact('categories', 'districts'));
    }

    public function getSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    public function getSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }
    public function index()
    {
        $posts = post::with(['category', 'subcategory', 'district', 'subdistrict'])->orderBy('id', 'desc')->paginate(4);
        return view('Backend.post.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $data['title_en'] = request()->title_en;
        $data['title_ar'] = request()->title_ar;
        $data['category_id'] = request()->category_id;
        $data['subcategory_id'] = request()->subcategory_id;
        $data['district_id'] = request()->district_id;
        $data['subdistrict_id'] = request()->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = request()->tags_en;
        $data['tags_ar'] = request()->tags_ar;
        $data['details_en'] = request()->details_en;
        $data['details_ar'] = request()->details_ar;
        $data['headline'] = request()->headline;
        $data['bigthumbnail'] = request()->bigthumbnail;
        $data['first_section'] = request()->first_section;
        $data['first_section_thumbnail'] = request()->first_section_thumbnail;
        $data['post_date'] = date('d-m-y');
        $data['post_month'] = date("F");

        $image = request()->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/' . $image_one);
            $data['image'] = 'image/posting/' . $image_one;
            post::create($data);
            Toastr::success('Post Inserted Successfully', 'success');
            return redirect()->route('index.post');
        } else {
            return redirect()->back();
        }
    }

    public function editPost($id)
    {
        $posts = post::findOrFail($id);
        $categories = category::all();
        $subcategories = subcategory::where('category_id', $posts->subcategory_id)->get();
        $districts = district::all();
        $subdistricts = subdistrict::where('district_id', $posts->subdistrict_id)->get();
        return view('Backend.post.edit', compact('posts', 'categories', 'subcategories', 'districts', 'subdistricts'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = post::findOrFail($id);

        $data['title_en'] = request()->title_en;
        $data['title_ar'] = request()->title_ar;
        $data['category_id'] = request()->category_id;
        $data['subcategory_id'] = request()->subcategory_id;
        $data['district_id'] = request()->district_id;
        $data['subdistrict_id'] = request()->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = request()->tags_en;
        $data['tags_ar'] = request()->tags_ar;
        $data['details_en'] = request()->details_en;
        $data['details_ar'] = request()->details_ar;
        $data['headline'] = request()->headline;
        $data['bigthumbnail'] = request()->bigthumbnail;
        $data['first_section'] = request()->first_section;
        $data['first_section_thumbnail'] = request()->first_section_thumbnail;

        $oldimage = request()->oldimage;
        $image = request()->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/' . $image_one);
            $data['image'] = 'image/posting/' . $image_one;
            unlink($oldimage);
            $post->update($data);

            Toastr::success('Post Updated Successfully', 'success');
            return redirect()->route('index.post');
        } else {
            $data['image'] = $oldimage;
            $post->update($data);
            Toastr::success('Post Updated Successfully', 'success');
            return redirect()->route('index.post');
        }
    }

    public function deletePost($id)
    {
        $post = post::findOrFail($id);
        unlink($post->image);
        $post->delete();
        Toastr::error('Post Deleted Successfully', 'success');
        return redirect()->route('index.post');
    }
}
