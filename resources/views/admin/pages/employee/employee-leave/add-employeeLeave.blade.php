
@extends('admin.partials.master')

@section('title')
  <title>Add Employee Leave | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employeeLeave.view') }}">Employee Leave List</a></li>
              <li class="breadcrumb-item active">Add Employee Leave</li>
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
                <h3 class="card-title">Add Employee Leave</h3>
                <a href="{{ route('employeeLeave.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee Leave List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('employeeLeave.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="employee_id">Employee <span style="color:red">*</span></label>
                            <select name="employee_id" id="employee_id" class="form-control select2">
                              <option value="">Select Employee</option>
                              @foreach($employees as $employee)
                              <option value="{{ $employee->id }}">{{ $employee->name }}({{ $employee->id_no }})</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-warning" role="alert">
                            You can select only one leave type from the three leave types.  
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="cl">CL Leave</label>
                            <input type="number" name="cl" id="cl" class="form-control">
                            <span id="cl_info"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="ml">ML Leave</label>
                            <input type="number" name="ml" id="ml" class="form-control">
                            <span id="ml_info"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="lwp">LWP Leave</label>
                            <input type="number" name="lwp" id="lwp" class="form-control">
                            <span id="lwp_info"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="start_date">Start Date <span style="color:red">*</span></label>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="end_date">End Date <span style="color:red">*</span></label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="leave_reason">Leave Reason <span style="color:red">*</span></label>
                            <textarea class="form-control" name="leave_reason" id="leave_reason" placeholder="Leave Reason"></textarea>
                          </div>
                        </div>
                      </div>
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
      employee_id: {
        required: true,
      },
      start_date:{
        required: true,
      },
      end_date: {
        required: true,
      },
      leave_reason: {
        required: true,
      },
    },
    messages: {
      employee_id: {
        required: "Please select employee",
      },
      start_date:{
        required: "Please enter start date",
      },
      end_date:{
        required: "Please enter end date",
      },
      leave_reason: {
        required: "Please enter Leave Reason,",
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
