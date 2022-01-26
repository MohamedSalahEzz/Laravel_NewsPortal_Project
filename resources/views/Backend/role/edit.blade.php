@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Roles Add</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.writer',$writers->id) }}">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $writers->name }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $writers->email }}">
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="category" value="1"
                      @if ($writers->category == 1)
                          checked="";
                      @endif
                      > Category <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-success">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="district" value="1"
                      @if ($writers->district == 1)
                      checked="";
                    @endif
                      > District <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-info">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="post" value="1"
                      @if ($writers->post == 1)
                      checked="";
                  @endif
                      > Post <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-danger">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="setting" value="1"
                      @if ($writers->setting == 1)
                      checked="";
                  @endif
                      > Setting <i class="input-helper"></i></label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="website" value="1"
                      @if ($writers->website == 1)
                      checked="";
                  @endif
                      > Wibsite <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-success">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="gallery" value="1"
                      @if ($writers->gallery == 1)
                      checked="";
                  @endif
                      > Gallery <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-info">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="ads" value="1"
                      @if ($writers->ads == 1)
                      checked="";
                  @endif
                      > Advertisment <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-danger">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="role" value="1"
                      @if ($writers->role == 1)
                      checked="";
                  @endif
                      > Role <i class="input-helper"></i></label>
                  </div>
                </div>
              </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection