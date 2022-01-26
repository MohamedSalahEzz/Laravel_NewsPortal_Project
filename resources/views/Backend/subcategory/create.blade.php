@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add SubCategory</h4>
        <form class="forms-sample" method="POST" action="{{ route('store.subcategory') }}">
            @csrf
          <div class="form-group">
            <label>SubCategory English</label>
            <input type="text" value="{{ old('subcategory_en') }}" class="form-control" name="subcategory_en"  placeholder="SubCategory English">
            @error('subcategory_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>SubCategory Arabic</label>
            <input type="text" value="{{ old('subcategory_ar') }}" class="form-control" name="subcategory_ar"  placeholder="SubCategory Arabic">
            @error('subcategory_ar')
            <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option disabled="" selected="">--Select Category--</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_en }} | {{ $category->category_ar }}</option>
                @endforeach
              </select>
              @error('category_id')
              <span class="btn btn-danger">{{ $message }}</span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection