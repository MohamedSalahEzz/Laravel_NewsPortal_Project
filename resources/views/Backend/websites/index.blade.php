@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">WebSites Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.website') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add Website Links</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Website Name </th>
                <th> Website Link </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($websites as $website)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$website->website_name}} </td>
                <td> {{$website->website_link}} </td>
                <td> 
                    <a href="{{ route('website.edit',$website->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('website.delete',$website->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $websites->links('pagination-links') }}
        </div>
      </div>
    </div>
  </div>

@endsection