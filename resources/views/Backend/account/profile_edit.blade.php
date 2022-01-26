@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Profile Update</h4>
      <form class="forms-sample" method="post" action="{{ route('update.profile',$editData->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="exampleInputName1">User Name</label>
          <input type="text" class="form-control" name="name" value="{{ $editData->name }}">
        </div>
                <div class="form-group">
          <label for="exampleInputName1">User Email</label>
          <input type="text" class="form-control" name="email" value="{{ $editData->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">User Mobile</label>
            <input type="text" class="form-control" name="mobile" value="{{ $editData->mobile }}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">User Address</label>
            <input type="text" class="form-control" name="address" value="{{ $editData->address }}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">User position</label>
            <input type="text" class="form-control" name="position" value="{{ $editData->position }}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">User Gender</label>
            <select class="form-control" id="type" name="gender">
              <option disabled="" selected="">--Select Type--</option>
              <option value="male" {{ $editData->gender == "male"? "selected":"" }}>Male</option>
              <option value="female" {{ $editData->gender == "female"? "selected":"" }}>Female</option>
            </select>
          </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputFile">User Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputFile">User Image</label>
            <img id="showImage" src="{{ (!empty($editData->image))? url('upload/user_images'.$editData->image):url('upload/No_image.png') }}"
            style="width: 100px; height: 100px; border: 1px solid #000000">
        </div>



    <button type="submit" class="btn btn-primary mr-2">Submit</button>
  </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
