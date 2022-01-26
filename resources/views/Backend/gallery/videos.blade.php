@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Videos Gallery Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.video') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add Videos</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Video Title </th>
                <th> Type </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($videos as $video)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$video->title}} </td>
                <td> 
                    @if ($video->type == 1)
                        <span class="badge badge-success">Pig Video</span>
                    @else
                        <span class="badge badge-info">Small Video</span>
                    @endif
                </td>
                <td> 
                    <a href="{{ route('edit.video',$video->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.video',$video->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $videos->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection