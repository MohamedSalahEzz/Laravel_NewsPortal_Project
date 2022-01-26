@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add District</h4>
        <form class="forms-sample" method="POST" action="{{ route('store.district') }}">
            @csrf
          <div class="form-group">
            <label>District English</label>
            <input type="text" value="{{ old('district_en') }}" class="form-control" name="district_en"  placeholder="District English">
            @error('district_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>District Arabic</label>
            <input type="text" value="{{ old('district_ar') }}" class="form-control" name="district_ar"  placeholder="District Arabic">
            @error('district_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection