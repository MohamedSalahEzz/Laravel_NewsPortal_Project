<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\website;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class websiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addWebsite()
    {
        return view('Backend.websites.add');
    }

    public function storeWebsite(Request $request)
    {
        $validatedData = request()->validate([
            'website_name' => 'required',
            'website_link' => 'required',
        ]);
        website::create($validatedData);
        Toastr::success('Website Added Successfully', 'success');
        return redirect()->route('website.index');
    }

    public function index()
    {
        $websites = DB::table('websites')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.websites.index', compact('websites'));
    }

    public function edit($id)
    {
        $website = website::findOrFail($id);
        return view('Backend.websites.edit', compact('website'));
    }

    public function update(Request $request, $id)
    {
        $website = website::findOrFail($id);
        $validatedData = request()->validate([
            'website_name' => 'required',
            'website_link' => 'required',
        ]);
        $website->update($validatedData);
        Toastr::success('Website Updated Successfully', 'success');
        return redirect()->route('website.index');
    }

    public function delete($id)
    {
        $website = website::findOrFail($id);
        $website->delete();
        Toastr::error('Website Deleted Successfully', 'success');
        return redirect()->route('website.index');
    }
}
