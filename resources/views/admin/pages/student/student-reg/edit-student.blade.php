
@extends('admin.partials.master')

@section('title')
  <title>Edit Student | BdCollage</title>
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
              <li class="breadcrumb-item"><a href="{{ route('student.registration.view') }}">Student</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
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
                <h3 class="card-title">Edit student - {{ $assignStudent->student->name }}</h3>
                <a href="{{ route('student.registration.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Student List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('student.registration.update', $assignStudent->id) }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Name <span style="color:red">*</span></label>
                            <input type="text" value="{{ $assignStudent->student->name }}" name="name" class="form-control" id="name" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input type="email" value="{{ $assignStudent->student->email }}" name="email" class="form-control" id="email" placeholder="Enter Email">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="phone">Phone <span style="color:red">*</span></label>
                            <input type="number" value="{{ $assignStudent->student->mobile }}" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="address">Address <span style="color:red">*</span></label>
                            <input type="text" value="{{ $assignStudent->student->address }}" name="address" class="form-control" id="address" placeholder="Enter Address">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="gender">Gender <span style="color:red">*</span></label>
                            <select class="form-control" name="gender" id="gender">
                              <option value="Male" {{ ($assignStudent->student->gender == 'Male')? 'selected': '' }}>Male</option>
                              <option value="Female" {{ ($assignStudent->student->gender == 'Female')? 'selected': '' }}>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="religion">Religion <span style="color:red">*</span></label>
                            <select class="form-control" name="religion" id="religion">
                              <option value="Islam" {{ ($assignStudent->student->religion == 'Islam')? 'selected': '' }}>Islam</option>
                              <option value="Hindu" {{ ($assignStudent->student->religion == 'Hindu')? 'selected': '' }}>Hindu</option>
                              <option value="Buddho" {{ ($assignStudent->student->religion == 'Buddho')? 'selected': '' }}>Buddho</option>
                              <option value="Khristan" {{ ($assignStudent->student->religion == 'Khristan')? 'selected': '' }}>Khristan</option>
                              <option value="Others" {{ ($assignStudent->student->religion == 'Others')? 'selected': '' }}>Others</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fname">Father's Name <span style="color:red">*</span></label>
                            <input type="text" value="{{ $assignStudent->student->fname }}" name="fname" class="form-control" id="fname" placeholder="Enter Father's Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="mname">Mother's Name <span style="color:red">*</span></label>
                            <input type="text" value="{{ $assignStudent->student->mname }}" name="mname" class="form-control" id="mname" placeholder="Enter Mother's Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="dob">Date Of Birth <span style="color:red">*</span></label>
                            <input type="date" value="{{ $assignStudent->student->dob }}" name="dob" class="form-control" id="dob" placeholder="Enter Date Of Birth">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="department">Department <span style="color:red">*</span></label>
                            <select class="form-control select2" name="department" id="department">
                              <option value="">Select Department</option>
                              @foreach($departments as $department)
                              <option value="{{ $department->id }}" {{ ($assignStudent->department->id == $department->id)? 'selected': '' }}>{{ $department->name }}</option>
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
                              <option value="{{ $session->id }}" {{ ($assignStudent->session->id == $session->id)? 'selected': '' }}>{{ $session->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" value="{{ $assignStudent->discount->discount }}" name="discount" id="discount" placeholder="Enter Discount">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          @if($assignStudent->student->image == null)
                          <img id="showImage" src="{{ asset('public/img/user.png') }}" align="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                          @else
                          <img src="{{ asset('public/img/students/'.$assignStudent->student->image) }}" style="width: 80px;height: 80px;" align="user image">
                          @endif
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
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
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        number:true,
      },
      address: {
        required: true,
        maxlength:60,
      },
      gender: {
        required: true,
      },
      religion: {
        required: true,
      },
      fname: {
        required: true,
      },
      mname: {
        required: true,
      },
      dob: {
        required: true,
      },
      department: {
        required: true,
      },
      session: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Please enter session name",
        maxlength: "Your session name must be at least 60 characters long",
      },
      email: {
        required: "Please enter email address",
        email: "Invalid email address",
      },
      phone: {
        required: "Please enter phone number",
        number: "Invalid Phone number",
      },
      address: {
        required: "Please enter address",
        maxlength: "Your address must be at least 60 characters long",
      },
      gender: {
        required: "Please select gender",
      },
      religion: {
        required: "Please select religion",
      },
      fname: {
        required: "Please enter father's name",
      },
      mname: {
        required: "Please enter mother's name",
      },
      dob: {
        required: "Please enter date of birth",
      },
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