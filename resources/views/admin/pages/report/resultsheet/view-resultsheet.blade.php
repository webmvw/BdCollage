@extends('admin.partials.master')

@section('title')
  <title>Student Resultsheet | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Resultsheet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Resultsheet</li>
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
                <h3 class="card-title">Student Resultsheet</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('student.resultsheet.get') }}" method="POST" id="quickForm" target="_blank">
                @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="department">Department <span style="color:red">*</span></label>
                      <select name="department" id="department" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="session">Session <span style="color:red">*</span></label>
                      <select name="session" id="session" class="form-control">
                        <option value="">Select Session</option>
                        @foreach($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester <span style="color:red">*</span></label>
                      <select name="semester" id="semester" class="form-control">
                        <option value="">Select Semester</option>
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exam">Exam Type <span style="color:red">*</span></label>
                      <select name="exam" id="exam" class="form-control">
                        <option value="">Select Exam</option>
                        @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
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
      department: {
        required: true,
      },
      session:{
        required: true,
      },
      semester:{
        required: true,
      },
      exam:{
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

