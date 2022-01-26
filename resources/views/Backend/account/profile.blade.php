@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">User Profile</h4>

      <a href="{{ route('edit.profile') }}" style="float: right" class="btn btn-primary">Edit Your Profile</a>

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{Auth::user()->image}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">User Name : {{Auth::user()->name}}</h5>
          <p class="card-text">User Email : {{Auth::user()->email}}</p>
          <p class="card-text">User Mobile : {{Auth::user()->mobile}}</p>
          <p class="card-text">User Address : {{Auth::user()->address}}</p>
          <p class="card-text">User Gender : {{Auth::user()->gender}}</p>
          <p class="card-text">User Position : {{Auth::user()->position}}</p>
        </div>
      </div>

</div>

@endsection