@extends('admin.partials.master')

@section('title')
  <title>Menage Employee | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                <h3 class="card-title">Employee List</h3>
                <a href="{{ route('employee.registration.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employee</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>ID No</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Joining Date</th>
                      <th>Salary</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allEmployee as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            @if($value->image == null)
                            <img src="{{ asset('public/img/user.png') }}" style="width: 50px;height: 50px;" align="user image">
                            @else
                            <img src="{{ asset('public/img/teacher/'.$value->image) }}" style="width: 60px;height: 60px;" align="user image">
                            @endif
                          </td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->designation->name }}</td>
                          <td>{{ $value->id_no }}</td>
                          <td>{{ $value->mobile }}</td>
                          <td>{{ $value->address }}</td>
                          <td>{{ $value->join_date }}</td>
                          <td>{{ $value->salary }}/=</td>
                          @if(Auth::user()->role_id == 1)
                          <td>{{ $value->code }}</td>
                          @endif
                          <td>
                            <a href="{{ route('employee.registration.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>ID No</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Joining Date</th>
                      <th>Salary</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </tfoot>
                  </table>
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
@endsection

