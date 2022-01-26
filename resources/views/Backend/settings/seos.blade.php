@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Seos Setting</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.seos',$seo->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>Meta Author</label>
            <input type="text" class="form-control" name="meta_author"  value="{{ $seo->meta_author }}">
            @error('meta_author')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control" name="meta_title"  value="{{ $seo->meta_title }}">
            @error('meta_title')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>Meta Keyword</label>
            <input type="text" class="form-control" name="meta_keyword"  value="{{ $seo->meta_keyword }}">
            @error('meta_keyword')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Meta Description</label>
            <textarea class="form-control" name="meta_description" id="summernote">
              {{ $seo->meta_description }}
            </textarea>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Google Analytics</label>
            <textarea class="form-control" name="google_analytics" id="summernote">
              {{ $seo->google_analytics }}
            </textarea>
          </div>
          <div class="form-group">
            <label>Google Verification</label>
            <input type="text" class="form-control" name="google_verification"  value="{{ $seo->google_verification }}">
            @error('google_verification')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Alexa Analytics</label>
            <textarea class="form-control" name="alexa_analytics" id="summernote">
              {{ $seo->alexa_analytics }}
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection