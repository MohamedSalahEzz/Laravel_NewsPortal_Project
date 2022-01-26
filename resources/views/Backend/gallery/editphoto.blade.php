@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">New Photo Insert</h4>
      <form class="forms-sample" method="post" action="{{ route('update.photo',$photo->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="exampleInputName1">Photo Title</label>
          <input type="text" class="form-control" name="title" value="{{ $photo->title }}">
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputFile">News Image Upload</label>
            <input type="file" class="form-control-file" id="exampleInputFile" name="photo">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputFile">Old Image Uploaded</label>
            <img src="{{ URL::to($photo->photo) }}" style="width: 70px; height: 50px">
            <input type="hidden" name="oldphoto" value="{{ $photo->photo }}">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Photo Type</label>
          <select class="form-control" id="type" name="type">
            <option disabled="" selected="">--Select Type--</option>
            <option value="1">Pig Photo</option>
            <option value="0">Small Photo</option>
          </select>
        </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
  </form>
</div>

@endsection
