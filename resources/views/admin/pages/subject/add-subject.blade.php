
@extends('admin.partials.master')

@section('title')
  <title>Add Subject | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('subject.view') }}">Subject</a></li>
              <li class="breadcrumb-item active">Add Subject</li>
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
                <h3 class="card-title">Add Subject</h3>
                <a href="{{ route('subject.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Subject List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('subject.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Subject Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Subject Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="subject_code">Subject Code</label>
                            <input type="number" name="subject_code" class="form-control" id="subject_code" placeholder="Enter Subject Code">
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
      name: {
        required: true,
        maxlength:60,
      },
      subject_code: {
        required: true,
        number: true,
      },
    },
    messages: {
      name: {
        required: "Please enter subject name",
        maxlength: "Your name must be at least 60 characters long"
      },
      subject_code: {
        required: "Please enter subject code",
        number: "Invalid insert! only number allowed.",
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
