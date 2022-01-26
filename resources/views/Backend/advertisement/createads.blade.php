@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">New Advertisememt Insert</h4>
      <form class="forms-sample" method="post" action="{{ route('storeAds') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Advertisememt Link</label>
          <input type="text" class="form-control" name="link">
        </div>
      <div class="form-group">
        <label for="exampleInputFile">News Image Upload</label>
        <input type="file" class="form-control-file" id="exampleInputFile" name="ad">
      </div>
        <div class="form-group">
          <label for="exampleInputName1">Advertisememt Type</label>
          <select class="form-control" id="type" name="type">
            <option disabled="" selected="">--Select Type--</option>
            <option value="1">Horizontal</option>
            <option value="0">Vertical</option>
          </select>
        </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
  </form>
</div>

@endsection