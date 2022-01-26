@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Ads Gallery Bage</h4>
        <div class="template-demo">
            <a href="{{ route('add.ads') }}"><button type="button" class="btn btn-primary btn-fw" style="float: right">Add ads</button></a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Ads Title </th>
                <th> Ads Image </th>
                <th> Type </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
                @foreach ($ads as $ad)
              <tr>
                <td> {{$i++}} </td>
                <td> {{$ad->link}} </td>
                <td> <img src="{{asset($ad->ad)}}" style="width:100px; height:100px;"> </td>
                <td> 
                    @if ($ad->type == 1)
                        <span class="badge badge-success">Horizontal</span>
                    @else
                        <span class="badge badge-info">Vertical</span>
                    @endif
                </td>
                <td> 
                    <a href="{{ route('edit.ads',$ad->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.ad',$ad->id) }}" onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</a>
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