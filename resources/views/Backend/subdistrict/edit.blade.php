@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit SubDistrict</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.subdistrict',$subdistrict->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>SubDistrict English</label>
            <input type="text" value="{{$subdistrict->subdistrict_en}}" class="form-control" name="subdistrict_en">
            @error('subdistrict_en')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>SubDistrict Arabic</label>
            <input type="text" value="{{$subdistrict->subdistrict_ar}}" class="form-control" name="subdistrict_ar">
            @error('subdistrict_ar')
            <span class="btn btn-danger">{{ $message }}</span>
        @enderror
          </div>
          <div class="form-group">
            <label>District</label>
            <select class="form-control" name="district_id">
                <option disabled="" selected="">--Select District--</option>
                @foreach ($districts as $district)
                <option
                @if ($district->id == $subdistrict->district_id)
                    selected='selected'
                @endif
                value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_ar }}</option>
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