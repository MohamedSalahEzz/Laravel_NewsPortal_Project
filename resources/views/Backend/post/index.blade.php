@extends('admin.admin_master')
@section('admin')

@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Posts</h4>
        <div class="template-demo">
            <a href="{{ route('create.post') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add Post</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Post Title </th>
                <th> Category </th>
                <th> District </th>
                <th> Image </th>
                <th> Post Date </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($posts as $post)
              <tr>
                <td> {{$i++}} </td>
                <td> {{Str::limit($post->title_en, 10)}} </td>
                <td> {{$post->category->category_en}} </td>
                <td> {{$post->category->category_en}} </td>
                <td> <img src="{{ $post->image }}" style="width:50px; height:50px;" > </td>
                <td> {{Carbon\Carbon::parse($post->post_month)->diffForHumans() }} </td>
                <td> 
                    <a href="{{ route('edit.post',$post->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.post',$post->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $posts->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection

@endsection