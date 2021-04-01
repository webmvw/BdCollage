
@extends('admin.partials.master')

@section('title')
  <title>Increment Salary Details | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employee.salary.view') }}">Employee Salary</a></li>
              <li class="breadcrumb-item active">Increment Salary Details</li>
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
                <h3 class="card-title">Increment Salary Details</h3>
                <a href="{{ route('employee.salary.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee Salary List</a>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <p><strong>Employer Name:</strong> {{ $getEmployee->name }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Employer ID:</strong> {{ $getEmployee->id_no }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Designation:</strong> {{ $getEmployee->designation->name }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Joining Date:</strong> {{ date('F j, Y', strtotime($getEmployee->join_date)) }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Present Salary:</strong> {{ $getEmployee->salary }}/=</p>
                  </div>
                </div>
                <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Previous Salary</th>
                      <th>Present Salary</th>
                      <th>Increment Salary</th>
                      <th>Effected Date</th>
                    </tr>
                  </thead>
                  <thead>
                    @foreach($employeeSelaryLogs as $key=>$value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->previous_salary }}/=</td>
                      <td>{{ $value->present_salary }}/=</td>
                      <td>{{ $value->increment_salary }}/=</td>
                      <td>{{ date('F j, Y', strtotime($value->effected_date)) }}</td>
                    </tr>
                    @endforeach
                  </thead>
                </table>
              </div> 

              <div class="card-footer"></div>
            </div> <!-- .card end -->

          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
