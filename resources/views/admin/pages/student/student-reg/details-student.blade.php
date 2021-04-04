
@extends('admin.partials.master')

@section('title')
  <title>Details Student | BdCollage</title>
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
              <li class="breadcrumb-item active">Details Student</li>
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
                <h3 class="card-title">Details student - {{ $assignStudent->student->name }}</h3>
                <a href="{{ route('student.registration.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Student List</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    @if($assignStudent->student->image == null)
                    <img id="showImage" src="{{ asset('public/img/user.png') }}" align="user image" style="width:150px; height: 150px;border:1px solid #0069D9;padding:1px;">
                    @else
                    <img id="showImage" src="{{ asset('public/img/students/'.$assignStudent->student->image) }}" style="width: 150px;height: 150px;" align="user image">
                    @endif
                  </div>
                  <div class="col-md-8">
                    <table class="table table-bordered table-striped table-sm">
                      <tr>
                        <td>Department</td>
                        <td>: {{ $assignStudent->department->name }}</td>
                      </tr>
                      <tr>
                        <td>Session</td>
                        <td>: {{ $assignStudent->session->name }}</td>
                      </tr>
                      <tr>
                        <td>ID No</td>
                        <td>: {{ $assignStudent->student->id_no }}</td>
                      </tr>
                      <tr>
                        <td>Roll</td>
                        <td>: {{ $assignStudent->roll }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <hr>
                <table class="table table-bordered table-striped table-sm">
                  <tr>
                    <td>Name</td>
                    <td>: {{ $assignStudent->student->name }}</td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td>: {{ $assignStudent->student->gender }}</td>
                  </tr>
                  <tr>
                    <td>Religion</td>
                    <td>: {{ $assignStudent->student->religion }}</td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>: 0{{ $assignStudent->student->mobile }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>: {{ $assignStudent->student->email }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>: {{ $assignStudent->student->address }}</td>
                  </tr>
                  <tr>
                    <td>Father's Name</td>
                    <td>: {{ $assignStudent->student->fname }}</td>
                  </tr>
                  <tr>
                    <td>Mother's Name</td>
                    <td>: {{ $assignStudent->student->mname }}</td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                    <td>: {{ date('F j, Y', strtotime($assignStudent->student->dob)) }}</td>
                  </tr>
                  <tr>
                    <td>Discount</td>
                    <td>: {{ $assignStudent->discount->discount }}%</td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer"></div>
            </div> <!-- .card end -->

          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection