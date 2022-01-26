@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Users Roles</h4>
        <div class="template-demo">
            <a href="{{ route('add.writer') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add Writer</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Role </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($writers as $writer)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$writer->name}} </td>
                <td> 
                    @if ($writer->category == 1)
                        <span class="badge badge-primary">Category</span>
                    @else
                    @endif
                    @if ($writer->district == 1)
                    <span class="badge badge-success">District</span>
                    @else
                    @endif
                    @if ($writer->post == 1)
                        <span class="badge badge-info">Post</span>
                    @else
                    @endif
                    @if ($writer->setting == 1)
                        <span class="badge badge-danger">Setting</span>
                    @else
                    @endif
                    @if ($writer->website == 1)
                        <span class="badge badge-primary">Website</span>
                    @else
                    @endif
                    @if ($writer->gallery == 1)
                        <span class="badge badge-success">Gallery</span>
                    @else
                    @endif
                    @if ($writer->ads == 1)
                        <span class="badge badge-info">Advertisement</span>
                    @else
                    @endif
                    @if ($writer->role == 1)
                        <span class="badge badge-danger">Role</span>
                    @else
                    @endif
                </td>
                <td> 
                    <a href="{{ route('edit.writer',$writer->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.writer',$writer->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection