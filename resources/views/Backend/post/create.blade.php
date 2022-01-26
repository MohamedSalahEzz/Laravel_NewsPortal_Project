@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">New Post Insert</h4>
      <form class="forms-sample" method="post" action="{{ route('store.post') }}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputName1">Title In English</label>
          <input type="text" class="form-control" name="title_en">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputName1">Title In Arabic</label>
            <input type="text" class="form-control" name="title_ar">
          </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputName1">Category</label>
          <select class="form-control" id="category_id" name="category_id">
            <option disabled="" selected="">--Select Category--</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{$category->category_en}} | {{$category->category_ar}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputName1">SubCategory</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id">
            <option disabled="" selected="">--Select Category--</option>
            </select>
          </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputName1">District</label>
          <select class="form-control" id="district_id" name="district_id">
            <option disabled="" selected="">--Select District--</option>
            @foreach ($districts as $district)
            <option value="{{ $district->id }}">{{$district->district_en}} | {{$district->district_ar}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputName1">SubDistrict</label>
            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
            <option disabled="" selected="">--Select District--</option>
            </select>
          </div>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">News Image Upload</label>
        <input type="file" class="form-control-file" id="exampleInputFile" name="image">
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputName1">Tags English</label>
          <input type="text" class="form-control" name="tags_en">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputName1">Tags Arabic</label>
            <input type="text" class="form-control" name="tags_ar">
          </div>
    </div>
         <div class="form-group">
          <label for="exampleTextarea1">Details English</label>
          <textarea class="form-control" name="details_en" id="summernote"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Details Arabic</label>
            <textarea class="form-control" name="details_ar" id="summernote1"></textarea>
        </div>
        <div class="text-center">
            <h4>Extra Options</h4>
        </div><br>
        <div class="row">
            <label class="form-check-label col-md-3">
                <input value="1" name="headline" type="checkbox" class="form-check-input"> Headline <i class="input-helper"></i></label>
            <label class="form-check-label col-md-3">
                <input value="1" name="bigthumbnail" type="checkbox" class="form-check-input"> General Big Thumbnail <i class="input-helper"></i></label>
            <label class="form-check-label col-md-3">
                <input value="1" name="first_section" type="checkbox" class="form-check-input"> First Section <i class="input-helper"></i></label>
            <label class="form-check-label col-md-3">
                <input value="1" name="first_section_thumbnail" type="checkbox" class="form-check-input"> First Section Thumbnail <i class="input-helper"></i></label>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
<!-- This For Category -->
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/get/subcategory/') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subcategory_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>

 <!-- This For District -->
 <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="district_id"]').on('change', function(){
              var district_id = $(this).val();
              if(district_id) {
                  $.ajax({
                      url: "{{  url('/get/subdistrict/') }}/"+district_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdistrict_id").empty();
                               $.each(data,function(key,value){
                                   $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>

@endsection