@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>

        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
      </ol>
    </section>
    <!-- Main content -->
  <section class="content">
      <!--include('layouts.errors-and-messages')-->
      <!-- Default box -->
      @if($employees)
      <div class="box">
          <div class="box-body">
              <h2>Employees</h2>
              <table class="table">
                  <tbody>
                      <tr>
                          <td class="col-md-1">ID</td>
                          <td class="col-md-3">Name</td>
                          <td class="col-md-3">Email</td>
                          <td class="col-md-1">Status</td>
                          <td class="col-md-1">Role</td>
                          <td class="col-md-4">Actions</td>
                      </tr>
                  </tbody>
                  <tbody>
                  @foreach ($employees as $employee)
                      <tr>
                          <td>{{ $employee->id }}</td>
                          <td>{{ $employee->name }}</td>
                          <td>{{ $employee->email }}</td>
                          <td><!--include('layouts.status', ['status' => $employee->status])--></td>
                          <td>Admin</td>
                          <td>
                              <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post" class="form-horizontal">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="delete">
                                  <div class="btn-group">
                                      <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                      <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                      <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                  </div>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
               <a href="{{route('admin.employees.create')}}"><button type="btn" name="links" class="btn btn-default"> new employee</button></a>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
      @endif

  </section>
  <!-- /.content -->
</div>
@endsection
