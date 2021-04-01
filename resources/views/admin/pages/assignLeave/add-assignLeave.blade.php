
@extends('admin.partials.master')

@section('title')
  <title>Add Assign Leave | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Assign Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employee.assign.leave.view') }}">Assign Leave List</a></li>
              <li class="breadcrumb-item active">Add Assign Leave</li>
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
                <h3 class="card-title">Add Assign Leave</h3>
                <a href="{{ route('employee.assign.leave.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Assign Leave List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('employee.assign.leave.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" id="employee_id" class="form-control select2">
                              <option value="">Select Employee</option>
                              @foreach($employees as $employee)
                              <option value="{{ $employee->id }}">{{ $employee->name }}({{ $employee->id_no }})</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="cl">CL Leave</label>
                            <input type="number" name="cl" id="cl" placeholder="Enter CL Max Leave" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="ml">ML Leave</label>
                            <input type="number" name="ml" id="ml" placeholder="Enter ML Max Leave" class="form-control">
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
      cl:{
        required: true,
        number:true,
      },
      ml: {
        required: true,
        number: true,
      },
    },
    messages: {
      employee_id: {
        required: "Please select employee",
      },
      cl:{
        required: "Please enter CL Leave",
        number: "Invalid input",
      },
      ml:{
        required: "Please enter ML Leave",
        number: "Invalid input",
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
