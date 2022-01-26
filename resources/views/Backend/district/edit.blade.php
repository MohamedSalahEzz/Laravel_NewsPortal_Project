@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit District</h4>
        <form class="forms-sample" method="POST" action="{{route('update.district',$district->id)}}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>District English</label>
            <input type="text" value="{{ $district->district_en }}" class="form-control" name="district_en">
            @error('district_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>District Arabic</label>
            <input type="text" value="{{ $district->district_ar }}" class="form-control" name="district_ar">
            @error('district_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection