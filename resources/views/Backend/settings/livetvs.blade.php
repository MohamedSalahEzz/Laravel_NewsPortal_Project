@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Live TV Setting</h4>
        <br>
        <div class="template-demo">
            @if ($livetv->status == 1)
            <bold class="text-success"> The LiveTvs are  Active</bold><br>
            <a href="{{ route('deactive.livetv', $livetv->id) }}"><button type="button" class="btn btn-danger btn-fw">DeActive</button></a>
            @else
            <bold class="text-danger"> The LiveTvs are  DeActive</bold><br>
            <a href="{{ route('active.livetv', $livetv->id) }}"><button type="button" class="btn btn-success btn-fw">Active</button></a>
            @endif
        </div>
        <br><br>
        <form class="forms-sample" method="POST" action="{{ route('update.livetv',$livetv->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleTextarea1">Embed Code For Live TV</label>
                <textarea class="form-control" name="embed_code" id="summernote">
                  {{ $livetv->embed_code }}
                </textarea>
              </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection