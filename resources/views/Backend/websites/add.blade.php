@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add WebSites</h4>
        <form class="forms-sample" method="POST" action="{{ route('store.website') }}">
            @csrf
          <div class="form-group">
            <label>Website Name</label>
            <input type="text" value="{{ old('website_name') }}" class="form-control" name="website_name"  placeholder="Website Name">
            @error('website_name')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Website Link</label>
            <input type="text" value="{{ old('website_link') }}" class="form-control" name="website_link"  placeholder="Website Link">
            @error('website_link')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection