<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory as RequestsSubCategory;
use App\Models\category;
use App\Models\subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategories = subcategory::with('category')->paginate(4);
        return view('Backend.subcategory.index', compact('subcategories'));
    }

    public function addSubCategory()
    {
        $categories = DB::table('categories')->get();
        return view('Backend.subcategory.create', compact('categories'));
    }

    public function storesubCategory(RequestsSubCategory $request)
    {
        $validatedData = $request->validated();
        subcategory::create($validatedData);
        toastr::success('SubCategory Inserted Successfully', 'success');
        return redirect()->route('admin.subcategories');
    }

    public function editSubCategory($id)
    {
        $subcategory = subcategory::findOrFail($id);
        $categories = category::all();
        return view('Backend.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function updateSubCategory(RequestsSubCategory $request, $id)
    {
        $subcategory = subcategory::findOrFail($id);
        $validatedData = $request->validated();
        $subcategory->update($validatedData);
        toastr::success('SubCategory Updated Successfully', 'success');
        return redirect()->route('admin.subcategories');
    }

    public function deleteSubCategory($id)
    {
        $subcategory = subcategory::findOrFail($id);
        $subcategory->delete();
        toastr::error('SubCategory Deleted Successfully', 'success');
        return redirect()->route('admin.subcategories');
    }

}
