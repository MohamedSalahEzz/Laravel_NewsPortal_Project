@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Notices Setting</h4>
        <br>
        <div class="template-demo">
            @if ($notice->status == 1)
            <bold class="text-success"> The notices are  Active</bold>
            <a href="{{ route('deactive.notice', $notice->id) }}"><button type="button" class="btn btn-danger btn-fw">DeActive</button></a>
            @else
            <bold class="text-danger"> The notices are  DeActive</bold><br>
            <a href="{{ route('active.notice',$notice->id) }}"><button type="button" class="btn btn-success btn-fw">Active</button></a>
            @endif
        </div>
        <br><br>
        <form class="forms-sample" method="POST" action="{{ route('update.notice',$notice->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleTextarea1">Notices</label>
                <textarea class="form-control" name="notice" id="summernote">
                  {{ $notice->notice }}
                </textarea>
              </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection