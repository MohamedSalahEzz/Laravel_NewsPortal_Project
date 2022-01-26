@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Category</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.category',$category->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>Category English</label>
            <input type="text" class="form-control" name="category_en"  value="{{ $category->category_en }}">
            @error('category_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Category Arabic</label>
            <input type="text" class="form-control" name="category_ar"  value="{{ $category->category_ar }}">
            @error('category_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection