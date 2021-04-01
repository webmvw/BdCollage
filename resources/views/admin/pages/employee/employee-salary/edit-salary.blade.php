
@extends('admin.partials.master')

@section('title')
  <title>Encrement Salary | BdCollage</title>
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
              <li class="breadcrumb-item active">Encrement Salary</li>
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
                <h3 class="card-title">Encrement Salary</h3>
                <a href="{{ route('employee.salary.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee List</a>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <p><strong>Employer Name:</strong> {{ $employee->name }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Employer ID:</strong> {{ $employee->id_no }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Designation:</strong> {{ $employee->designation->name }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Joining Date:</strong> {{ date('F j, Y', strtotime($employee->join_date)) }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Present Salary:</strong> {{ $employee->salary }}/=</p>
                  </div>
                </div>
                <hr>
              </div>
              <!-- /.card-header -->
                 <form method="post" action="{{ route('employee.salary.update', $employee->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="encrement_amount">Encrement Amount</label>
                            <input type="number" name="encrement_amount" id="encrement_amount" class="form-control" placeholder="Enter Encrement Amout">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="effected_date">Effected Date</label>
                            <input type="date" name="effected_date" id="effected_date" class="form-control">
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
      encrement_amount: {
        required: true,
        number: true,
      },
      effected_date: {
        required: true,
      }
    },
    messages: {
      encrement_amount: {
        required: "Please enter semester name",
        number: "Invalid input. Only number allowed.",
      },
      effected_date: {
        required: "Please enter effected date",
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
