@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Photos Gallery Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.photo') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add photos</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Photo Title </th>
                <th> Photo Image </th>
                <th> Type </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($photos as $photo)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$photo->title}} </td>
                <td> <img src="{{asset($photo->photo)}}" style="width:50px; height:50px;"> </td>
                <td> 
                    @if ($photo->type == 1)
                        <span class="badge badge-success">Pig Photo</span>
                    @else
                        <span class="badge badge-info">Small Photo</span>
                    @endif
                </td>
                <td> 
                    <a href="{{ route('edit.photo',$photo->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.photo',$photo->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $photos->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection