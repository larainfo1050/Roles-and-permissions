@extends('admin.layouts.admin')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Permissions</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Permissions</li>
        <li class="breadcrumb-item active" aria-current="page">Index</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="{{ route('permissions.create') }}" class="btn btn-info">create</a>
            <h6 class="m-0 font-weight-bold text-primary">Permissions List</h6>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
                </tr>
              </thead>
              
              <tbody>
                @foreach($permissions as $key => $permission)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $permission->name }}</td>
                  <td>
                      <a class="btn btn-xs btn-primary" href="{{ route('permissions.edit', $permission->id) }}">
                        Edit
                    </a>
                </td>
                  <td>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('are You Sure ? ') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
     
    </div>
    <!--Row-->

  </div>
  <!---Container Fluid-->
@endsection
