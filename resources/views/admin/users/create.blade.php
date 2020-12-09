@extends('admin.layouts.admin')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">User Create</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">User Create</h6>
            </div>
            <div class="card-body">
              <form action="{{ route("users.store") }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" 
                    placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" 
                      placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" 
                      >
                  </div>
                <div class="form-group">
                    <label for="select2Multiple">Multiple Roles</label>
                    <select class="select2-multiple form-control" name="roles[]" multiple="multiple"
                      id="select2Multiple">
                      @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

        </div>
      </div>

  </div>
  <!---Container Fluid-->
@endsection
