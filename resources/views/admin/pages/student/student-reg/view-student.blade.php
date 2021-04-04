@extends('admin.partials.master')

@section('title')
  <title>Manage Student | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
                <h3 class="card-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Student</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('student.registration.search') }}" method="GET" id="quickForm">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="department">Department <span style="color:red">*</span></label>
                        <select class="form-control select2" name="department" id="department">
                          <option value="">Select Department</option>
                          @foreach($departments as $department)
                          <option value="{{ $department->id }}" {{ (@$department_id == $department->id)? 'selected': '' }}>{{ $department->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="session">Session <span style="color:red">*</span></label>
                        <select class="form-control select2" name="session" id="session">
                          <option value="">Select Session</option>
                          @foreach($sessions as $session)
                          <option value="{{ $session->id }}" {{ (@$session_id == $session->id)? 'selected': '' }}>{{ $session->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-primary" name="search" style="margin-top: 32px">Search</button>
                    </div>
                  </div>
                  </form>
                </div>
                <div class="card-body">
                  @if(!@$search)
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Roll</th>
                      <th>Department</th>
                      <th>Session</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allStudent as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            @if($value->student->image == null)
                            <img src="{{ asset('public/img/user.png') }}" style="width: 50px;height: 50px;" align="user image">
                            @else
                            <img src="{{ asset('public/img/students/'.$value->student->image) }}" style="width: 60px;height: 60px;" align="user image">
                            @endif
                          </td>
                          <td>{{ $value->student->name }}</td>
                          <td>{{ $value->student->id_no }}</td>
                          <td>{{ $value->roll }}</td>
                          <td>{{ $value->department->name }}</td>
                          <td>{{ $value->session->name }}</td>
                          @if(Auth::user()->role_id == 1)
                          <td>{{ $value->student->code }}</td>
                          @endif
                          <td>
                            <a href="{{ route('student.registration.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('student.registration.details', $value->id) }}" title="Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Roll</th>
                      <th>Department</th>
                      <th>Session</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  @else
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Roll</th>
                      <th>Department</th>
                      <th>Session</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allStudent as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            @if($value->student->image == null)
                            <img src="{{ asset('public/img/user.png') }}" style="width: 50px;height: 50px;" align="user image">
                            @else
                            <img src="{{ asset('public/img/students/'.$value->student->image) }}" style="width: 60px;height: 60px;" align="user image">
                            @endif
                          </td>
                          <td>{{ $value->student->name }}</td>
                          <td>{{ $value->student->id_no }}</td>
                          <td>{{ $value->roll }}</td>
                          <td>{{ $value->department->name }}</td>
                          <td>{{ $value->session->name }}</td>
                          @if(Auth::user()->role_id == 1)
                          <td>{{ $value->student->code }}</td>
                          @endif
                          <td>
                            <a href="{{ route('student.registration.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('student.registration.details', $value->id) }}" title="Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Roll</th>
                      <th>Department</th>
                      <th>Session</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  @endif
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

<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      department: {
        required: true,
      },
      session: {
        required: true,
      },
    },
    messages: {
      department: {
        required: "Please select department",
      },
      session: {
        required: "Please select session",
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

