@extends('admin.partials.master')

@section('title')
  <title>Employee Assign Leave List | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Assign Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Assign leave List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Assign Leave List</h3>
                <a href="{{ route('employee.assign.leave.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Assign Leave</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>CL Leave</th>
                      <th>ML Leave</th>
                      <th>LWP Leave</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allEmployeeAssignLeaves as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->employee->name }}({{ $value->employee->id_no }})</td>
                          <td>{{ $value->cl }}</td>
                          <td>{{ $value->ml }}</td>
                          <td>{{ $value->lwp }}</td>
                          <td>
                            <a href="{{ route('employee.assign.leave.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>CL Leave</th>
                      <th>ML Leave</th>
                      <th>LWP Leave</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
            </div>
          </div>

        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

