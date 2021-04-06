
@extends('admin.partials.master')

@section('title')
  <title>Manage Grade Point | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('gradePoint.view') }}">Manage Grade Point</a></li>
              <li class="breadcrumb-item active">Add Grade Point</li>
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
                <h3 class="card-title">Add Grade Point</h3>
                <a href="{{ route('gradePoint.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Grade Point List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('gradePoint.store') }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="grade_name">Grade Name <span style="color:red">*</span></label>
                            <input type="text" name="grade_name" class="form-control" id="grade_name" placeholder="Enter Grade Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="grade_point">Grade Point <span style="color:red">*</span></label>
                            <input type="number" name="grade_point" class="form-control" id="grade_point" placeholder="Enter Grade Point">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="start_mark">Start Mark <span style="color:red">*</span></label>
                            <input type="number" name="start_mark" class="form-control" id="start_mark" placeholder="Enter Start Mark">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="end_mark">End Mark <span style="color:red">*</span></label>
                            <input type="number" name="end_mark" class="form-control" id="end_mark" placeholder="Enter End Mark">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="start_point">Start Point <span style="color:red">*</span></label>
                            <input type="number" name="start_point" id="start_point" class="form-control" placeholder="Enter Start Point">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="end_point">End Point <span style="color:red">*</span></label>
                            <input type="number" name="end_point" id="end_point" class="form-control" placeholder="Enter End Point">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks">
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
      grade_name: {
        required: true,
      },
      grade_point: {
        required: true,
        number:true,
      },
      start_mark: {
        required: true,
        number:true,
      },
      end_mark: {
        required: true,
        number:true,
      },
      start_point: {
        required: true,
        number:true,
      },
      end_point:{
        required: true,
        number:true,
      },
    },
    messages: {
      grade_name: {
        required: "Please enter grade name",
      },
      grade_point: {
        required: "Please enter grade point",
        number: "Invalid grade point",
      },
      start_mark: {
        required: "Please enter start mark",
        number: "Invalid start mark",
      },
      end_mark: {
        required: "Please enter end mark",
        number: "Invalid end mark",
      },
      start_point: {
        required: "Please enter start point",
        number: "Invalid start point",
      },
      end_point: {
        required: "Please enter end point",
        number: "Invalid end point"
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