@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Website Setting</h4>
        <form class="forms-sample" method="POST" action="{{ route('website.update',$websetting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Website Logo Upload</label>
                  <input type="file" class="form-control-file" id="exampleInputFile" name="logo">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Old Image Uploaded</label><br>
                  <img src="{{ asset($websetting->logo) }}" style="width: 70px; height: 50px">
                  <input type="hidden" name="oldlogo" value="{{ $websetting->logo }}">
                  </div>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Address English</label>
                <textarea class="form-control" name="address_en" id="summernote">{{ $websetting->address_en }}</textarea>
              </div>
              <div class="form-group">
                  <label for="exampleTextarea1">Address Arabic</label>
                  <textarea class="form-control" name="address_ar" id="summernote1">{{ $websetting->address_ar }}</textarea>
              </div>
          <div class="form-group">
            <label>Phone Number in English</label>
            <input type="text" class="form-control" name="phone_en"  value="{{ $websetting->phone_en }}">
          </div>
          <div class="form-group">
            <label>Phone Number in Arabic</label>
            <input type="text" class="form-control" name="phone_ar"  value="{{ $websetting->phone_ar }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email"  value="{{ $websetting->email }}">
          </div>


          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection