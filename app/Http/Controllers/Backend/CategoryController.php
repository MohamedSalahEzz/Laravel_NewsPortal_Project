<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category as RequestsCategory;
use App\Models\category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(4);
        return view('Backend.category.index', compact('categories'));
    }

    public function addCategory()
    {
        return view('Backend.category.create');
    }

    public function storeCategory(RequestsCategory $request)
    {
        $validatedData = $request->validated();
        category::create($validatedData);
        toastr::success('Category Inserted Successfully', 'success');
        return redirect()->route('admin.categories');
    }

    public function editCategory($id)
    {
        $category = category::findOrFail($id);
        return view('Backend.category.edit', compact('category'));
    }

    public function updateCategory(RequestsCategory $request, $id)
    {
        $category = category::findOrFail($id);
        $validatedData = $request->validated();
        $category->update($validatedData);
        toastr::success('Category Updated Successfully', 'success');
        return redirect()->route('admin.categories');
    }

    public function deleteCategory($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        toastr::error('Category Deleted Successfully', 'success');
        return redirect()->route('admin.categories');
    }
}
