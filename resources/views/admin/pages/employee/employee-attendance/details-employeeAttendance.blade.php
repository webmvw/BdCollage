@extends('admin.partials.master')

@section('title')
  <title>Employee Attendance Details | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Attendance Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employeeAttendance.view') }}">Employee Attendance</a></li>
              <li class="breadcrumb-item active">Employee Attendance Details</li>
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
                <h3 class="card-title">Details Employee Attendance - {{ date('F j, Y', strtotime($allData[0]->date)) }}</h3>
                <a href="{{ route('employeeAttendance.view') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Employee Attendance List</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Date</th>
                      <th>Attend Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->employee->name }}</td>
                          <td>{{ $value->employee->id_no }}</td>
                          <td>{{ date('F j, Y', strtotime($value->date)) }}</td>
                          <td>{{ $value->attend_status }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Date</th>
                      <th>Attend Status</th>
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

