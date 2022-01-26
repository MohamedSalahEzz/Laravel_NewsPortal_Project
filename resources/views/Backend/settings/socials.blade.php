@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Socials Setting</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.socials',$social->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>Facebook</label>
            <input type="text" class="form-control" name="facebook"  value="{{ $social->facebook }}">
            @error('facebook')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <input type="text" class="form-control" name="twitter"  value="{{ $social->twitter }}">
            @error('twitter')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Youtube</label>
            <input type="text" class="form-control" name="youtube"  value="{{ $social->youtube }}">
            @error('youtube')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Linkedin</label>
            <input type="text" class="form-control" name="linkedin"  value="{{ $social->linkedin }}">
            @error('linkedin')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Instagram</label>
            <input type="text" class="form-control" name="instagram"  value="{{ $social->instagram }}">
            @error('instagram')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection