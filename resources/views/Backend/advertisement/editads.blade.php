@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">New Advertisement Insert</h4>
      <form class="forms-sample" method="post" action="{{ route('update.ads',$ad->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="exampleInputName1">Adveryisement link</label>
          <input type="text" class="form-control" name="link" value="{{ $ad->link }}">
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputFile">News Image Upload</label>
            <input type="file" class="form-control-file" id="exampleInputFile" name="ad">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputFile">Old Image Uploaded</label>
            <img src="{{ URL::to($ad->ad) }}" style="width: 70px; height: 50px">
            <input type="hidden" name="oldad" value="{{ $ad->ad }}">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Adveryisement Type</label>
          <select class="form-control" id="type" name="type">
            <option disabled="" selected="">--Select Type--</option>
            <option value="1">Horizontal</option>
            <option value="0">vertical</option>
          </select>
        </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
  </form>
</div>

@endsection
