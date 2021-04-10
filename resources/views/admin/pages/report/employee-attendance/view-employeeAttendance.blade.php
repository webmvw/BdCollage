@extends('admin.partials.master')

@section('title')
  <title>Employee Employee Attendance Report | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Employee Attendance Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee Employee Attendance Report</li>
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
                <h3 class="card-title">Employee Attendance Report</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('report.employee.attendance.get') }}" method="POST" id="quickForm" target="_blank">
                @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="teacher">Teacher <span style="color:red">*</span></label>
                      <select name="teacher" id="teacher" class="form-control select2">
                        <option value="">Select Teacher</option>
                        @foreach($allData as $value)
                        <option value="{{ $value->id }}">{{ $value->name }} ({{$value->id_no}} - {{$value->designation->name}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="date">Date <span style="color:red">*</span></label>
                      <input type="date" name="date" id="date" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 32px">Submit</button>
                  </div>
                </div>
              </div>
              </form>
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

<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      teacher: {
        required: true,
      },
      date:{
        required: true,
      },
    },
    messages: {
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

