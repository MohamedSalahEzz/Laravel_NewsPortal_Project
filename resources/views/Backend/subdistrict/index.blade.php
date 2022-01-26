@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">SubDistrict Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.subdistrict') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add SubDistrict</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> SubDistrict English </th>
                <th> SubDistrict Arabic </th>
                <th>District</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($subdistricts as $subdistrict)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$subdistrict->subdistrict_en}} </td>
                <td> {{$subdistrict->subdistrict_ar}} </td>
                <td> {{$subdistrict->district->district_en}} </td>
                <td> 
                    <a href="{{ route('edit.subdistrict',$subdistrict->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.subdistrict',$subdistrict->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $subdistricts->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>


@endsection