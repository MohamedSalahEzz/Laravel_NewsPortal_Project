@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add District</h4>
        <form class="forms-sample" method="POST" action="{{ route('store.subdistrict') }}">
            @csrf
          <div class="form-group">
            <label>SubDistrict English</label>
            <input type="text" value="{{ old('subdistrict_en') }}" class="form-control" name="subdistrict_en"  placeholder="SubDistrict English">
            @error('district_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>SubDistrict Arabic</label>
            <input type="text" value="{{ old('subdistrict_ar') }}" class="form-control" name="subdistrict_ar"  placeholder="SubDistrict Arabic">
            @error('district_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <div class="form-group">
            <label>District</label>
            <select class="form-control" name="district_id">
                <option disabled="" selected="">--Select District--</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_ar }}</option>
                @endforeach
              </select>
              @error('district_id')
              <span class="btn btn-danger">{{ $message }}</span>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection