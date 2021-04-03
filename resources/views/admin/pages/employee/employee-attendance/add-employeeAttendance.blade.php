
@extends('admin.partials.master')

@section('title')
  <title>Add Employee Attendance | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employeeAttendance.view') }}">Employee Attendance List</a></li>
              <li class="breadcrumb-item active">Add Employee Attendance</li>
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
                <h3 class="card-title">Add Employee Attendance</h3>
                <a href="{{ route('employeeAttendance.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee Attendance List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('employeeAttendance.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="date">Date <span style="color:red">*</span></label>
                            <input type="date" name="date" id="date" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6"></div>
                      </div>

                      <table class="table table-bordered table-sm table-striped" width="100%">
                        <thead>
                          <tr class="table-primary">
                            <th rowspan="2" class="text-center" style="vertical-align: middle;width:5%;">SL</th>
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                            <th colspan="3" class="text-center" style="width: 30%">Attendance Status</th>
                          </tr>
                          <tr class="table-primary">
                            <th class="text-center">Present</th>
                            <th class="text-center">Leave</th>
                            <th class="text-center">Absent</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $key=>$value)
                          <tr id="div{{ $value->id }}">
                            <input type="hidden" name="employee_id[]" value="{{ $value->id }}">
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $value->name }} ({{ $value->id_no }})</td>
                            <td class="text-center">
                              <input type="radio" name="attend_status{{$key}}" value="Present" id="present{{$key}}" checked>
                              <label for="present{{$key}}">Present</label>
                            </td>
                            <td class="text-center">
                              <input type="radio" name="attend_status{{$key}}" value="Leave" id="leave{{$key}}">
                              <label for="leave{{$key}}">Leave</label>
                            </td>
                            <td class="text-center">
                              <input type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}">
                              <label for="absent{{$key}}">Absent</label>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form> 

              <div class="card-footer"></div>
            </div> <!-- .card end -->

          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      date: {
        required: true,
      },
    },
    messages: {
      date: {
        required: "Please enter Date.",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


@endsection
