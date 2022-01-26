@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.category') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add Category</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Category English </th>
                <th> Category Arabic </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($categories as $category)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$category->category_en}} </td>
                <td> {{$category->category_ar}} </td>
                <td> 
                    <a href="{{ route('edit.category',$category->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.category',$category->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $categories->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection