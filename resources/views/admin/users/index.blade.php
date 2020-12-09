@extends('admin.layouts.admin')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Users</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active" aria-current="page">Index</li>
      </ol>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Row -->
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="{{ route('users.create') }}" class="btn btn-info">create</a>
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
                </tr>
              </thead>
              
              <tbody>
                @foreach($users as $key => $user)
                <tr>
                  <td>{{ $user->id ?? '' }}</td>
                  <td>{{ $user->name ?? '' }}</td>
                  <td>{{ $user->email ?? '' }}</td>
                  <td>
                    @foreach($user->roles()->pluck('name') as $role)
                    <span class="badge badge-info">{{ $role }}</span>
                    @endforeach
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">
                        Edit
                    </a>  
                </td>
                  <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('are You Sure ?') }}');" style="display: inline-block;">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('Delete') }}">
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
