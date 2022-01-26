<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class roleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listWriter()
    {
        $writers = DB::table('users')->where('type', 0)->get();
        return view('Backend.role.index', compact('writers'));
    }

    public function addWriter()
    {
        return view('Backend.role.create');
    }

    public function storeWriter(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;
        User::create($data);
        Toastr::success('User Role Added Successfully', 'success');
        return redirect()->route('list.writer');
    }
    public function editWriter($id)
    {
        $writers = User::findOrFail($id);
        return view('Backend.role.edit', compact('writers'));
    }

    public function updateWriter(Request $request, $id)
    {
        $writers = User::findOrFail($id);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $writers->update($data);
        Toastr::success('User Role Edited Successfully', 'success');
        return redirect()->route('list.writer');
    }

    public function deleteWriter($id)
    {
        $writers = User::findOrFail($id);
        $writers->delete();
        toastr::error('Writer Deleted Successfully', 'success');
        return redirect()->route('list.writer');
    }
}
