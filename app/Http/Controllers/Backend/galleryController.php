<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\photo;
use App\Models\video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class galleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function photoGallery()
    {
        $photos = DB::table('photos')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.gallery.photos', compact('photos'));
    }

    public function addPhoto()
    {
        return view('Backend.gallery.createphoto');
    }

    public function storePhoto(Request $request)
    {
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $image = request()->photo;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/photoGallery/' . $image_one);
            $data['photo'] = 'image/photoGallery/' . $image_one;
            photo::create($data);
            Toastr::success('Photo Inserted Successfully', 'success');
            return redirect()->route('photo.gallery');
        } else {
            return redirect()->back();
        }
    }

    public function editPhoto($id)
    {
        $photo = photo::findOrFail($id);
        return view('Backend.gallery.editphoto', compact('photo'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $photo = photo::findOrFail($id);
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $oldphoto = $request->oldphoto;
        $image = request()->photo;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/photoGallery/' . $image_one);
            $data['photo'] = 'image/photoGallery/' . $image_one;
            unlink($oldphoto);
            $photo->update($data);
            Toastr::success('Photo Updateded Successfully', 'success');
            return redirect()->route('photo.gallery');
        } else {
            $data['photo'] = $oldphoto;
            $photo->update($data);
            Toastr::success('Photo Updateded Successfully', 'success');
            return redirect()->route('photo.gallery');
        }
    }

    public function deletePhoto($id)
    {
        $photo = photo::findOrFail($id);
        unlink($photo->photo);
        $photo->delete();
        return redirect()->route('photo.gallery');
    }

    public function videoGallery()
    {
        $videos = DB::table('videos')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.gallery.videos', compact('videos'));
    }

    public function addvideo()
    {
        return view('Backend.gallery.createvideo');
    }

    public function storevideo(Request $request)
    {
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        video::create($data);
        Toastr::success('Video Inserted Successfully', 'success');
        return redirect()->route('video.gallery');
    }

    public function editVideo($id)
    {
        $video = video::findOrFail($id);
        return view('Backend.gallery.editvideo', compact('video'));
    }

    public function updateVideo(Request $request, $id)
    {
        $video = video::findOrFail($id);
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        $video->update($data);
        Toastr::success('Video Updated Successfully', 'success');
        return redirect()->route('video.gallery');
    }

    public function deleteVideo($id)
    {
        $video = video::findOrFail($id);
        $video->delete();
        return redirect()->route('video.gallery');
    }
}
