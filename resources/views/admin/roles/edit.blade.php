@extends('admin.layouts.admin')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Roles Edit</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Roles</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Roles Edit</h6>
            </div>
            <div class="card-body">
              <form action="{{ route("roles.update", [$role->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" 
                    placeholder="Name" value="{{ old('name', isset($role) ? $role->name : '') }}">
                </div>
                <div class="form-group">
                    <label for="select2Multiple">Multiple Permissions</label>
                    <select class="select2-multiple form-control" name="permission[]" multiple="multiple"
                      id="select2Multiple">
                      @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
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
