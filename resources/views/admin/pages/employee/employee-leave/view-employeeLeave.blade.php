@extends('admin.partials.master')

@section('title')
  <title>Menage Employee Leave | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
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
                <h3 class="card-title">Employee Leave List</h3>
                <a href="{{ route('employeeLeave.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employee Leave</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Leave Reason</th>
                      <th>Leave Type</th>
                      <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($employeeLeaves as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->employee->name }}({{ $value->employee->id_no }})</td>
                          <td>{{ $value->start_date }}</td>
                          <td>{{ $value->end_date }}</td>
                          <td>{{ $value->leave_reason }}</td>
                          <td>
                            @if($value->cl != Null)
                            CL
                            @elseif($value->ml != Null)
                            ML
                            @elseif($value->lwp != Null)
                            LWP
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('employeeLeave.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('employeeLeave.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Leave Reason</th>
                      <th>Leave Type</th>
                      <th width="10%">Action</th>
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

