@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Prayers Setting</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.prayers',$prayer->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>fajr</label>
            <input type="text" class="form-control" name="fajr"  value="{{ $prayer->fajr }}">
            @error('fajr')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>johor</label>
            <input type="text" class="form-control" name="johor"  value="{{ $prayer->johor }}">
            @error('johor')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>johor</label>
            <input type="text" class="form-control" name="johor"  value="{{ $prayer->johor }}">
            @error('johor')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>magrib</label>
            <input type="text" class="form-control" name="magrib"  value="{{ $prayer->magrib }}">
            @error('magrib')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>esha</label>
            <input type="text" class="form-control" name="esha"  value="{{ $prayer->esha }}">
            @error('esha')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>jummah</label>
            <input type="text" class="form-control" name="jummah"  value="{{ $prayer->jummah }}">
            @error('jummah')
                <span class="btn btn-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection