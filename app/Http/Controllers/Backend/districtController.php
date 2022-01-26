<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\District as RequestsDistrict;
use App\Models\district;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $districts = DB::table('districts')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.district.index', compact('districts'));
    }

    public function addDistrict()
    {
        return view('Backend.district.create');
    }

    public function storeDistrict(RequestsDistrict $request)
    {
        $validatedData = $request->validated();
        district::create($validatedData);
        Toastr::success('District Inserted Successfully', 'success');
        return redirect()->route('admin.district');
    }

    public function editDistrict($id)
    {
        $district = district::findOrFail($id);
        return view('Backend.district.edit', compact('district'));
    }

    public function updateDistrict(RequestsDistrict $request, $id)
    {
        $district = district::findOrFail($id);
        $validatedData = $request->validated();
        $district->update($validatedData);
        Toastr::success('District Updated Successfully', 'success');
        return redirect()->route('admin.district');
    }

    public function deleteDistrict($id)
    {
        $district = district::findOrFail($id);
        $district->delete();
        Toastr::error('District Deleted Successfully', 'success');
        return redirect()->route('admin.district');
    }
}
