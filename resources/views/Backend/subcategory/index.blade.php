@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">SubCategory Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.subcategory') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add SubCategory</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> SubCategory English </th>
                <th> SubCategory Arabic </th>
                <th> Category Name </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($subcategories as $subcategory)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$subcategory->subcategory_en}} </td>
                <td> {{$subcategory->subcategory_ar}} </td>
                <td> {{$subcategory->category->category_en}} </td>
                <td> 
                    <a href="{{ route('edit.subcategory',$subcategory->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.subcategory',$subcategory->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $subcategories->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection