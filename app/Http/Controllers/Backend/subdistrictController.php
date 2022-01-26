<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubDistrict as RequestsSubDistrict;
use App\Models\district;
use App\Models\subdistrict;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class subdistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subdistricts = subdistrict::with('district')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.subdistrict.index', compact('subdistricts'));
    }

    public function addSubDistrict()
    {
        $districts = DB::table('districts')->get();
        return view('Backend.subdistrict.create', compact('districts'));
    }

    public function storeSubDistrict(RequestsSubDistrict $request)
    {
        $validatedDate = $request->validated();
        subdistrict::create($validatedDate);
        Toastr::success('SubDistrict Inserted Successfully', 'success');
        return redirect()->route('admin.subdistrict');
    }

    public function editSubDistrict($id)
    {
        $subdistrict = subdistrict::findOrFail($id);
        $districts = district::all();
        return view('Backend.subdistrict.edit', compact('subdistrict', 'districts'));
    }

    public function updateSubDistrict(RequestsSubDistrict $request, $id)
    {
        $subdistrict = subdistrict::findOrFail($id);
        $validatedDate = $request->validated();
        $subdistrict->update($validatedDate);
        Toastr::success('SubDistrict Updated Successfully', 'success');
        return redirect()->route('admin.subdistrict');
    }

    public function deleteSubDistrict($id)
    {
        $subdistrict = subdistrict::findOrFail($id);
        $subdistrict->delete();
        Toastr::error('SubDistrict Deleted Successfully', 'success');
        return redirect()->route('admin.subdistrict');
    }
}
