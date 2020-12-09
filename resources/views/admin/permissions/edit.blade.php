@extends('admin.layouts.admin')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Permissions Edit</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Permissions</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
              <h6 class="m-0 font-weight-bold text-primary">Permissions Edit</h6>
            </div>
            <div class="card-body">
              <form action="{{ route("permissions.update",[$permission->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" 
                    placeholder="Name" value="{{ old('name', isset($permission) ? $permission->name : '') }}">
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
