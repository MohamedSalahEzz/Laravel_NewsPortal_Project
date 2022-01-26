@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Category</h4>
        <form class="forms-sample" method="POST" action="{{ route('store.category') }}">
            @csrf
          <div class="form-group">
            <label>Category English</label>
            <input type="text" value="{{ old('category_en') }}" class="form-control" name="category_en"  placeholder="Category English">
            @error('category_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Category Arabic</label>
            <input type="text" value="{{ old('category_ar') }}" class="form-control" name="category_ar"  placeholder="Category Arabic">
            @error('category_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection