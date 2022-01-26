@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit SubCategory</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.subcategory',$subcategory->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>SubCategory English</label>
            <input type="text" class="form-control" name="subcategory_en"  value="{{ $subcategory->subcategory_en }}">
            @error('subcategory_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>SubCategory Arabic</label>
            <input type="text" class="form-control" name="subcategory_ar"  value="{{ $subcategory->subcategory_ar }}">
            @error('subcategory_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option disabled="" selected="">--Select Category--</option>
                @foreach ($categories as $category)
                <option @if ( $category->id == $subcategory->category_id)
                    selected="selected"
                @endif value="{{ $category->id }}">{{ $category->category_en }} | {{ $category->category_ar }}</option>
                @endforeach
              </select>
              @error('category_id')
              <span class="btn btn-danger">{{ $message }}</span>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection