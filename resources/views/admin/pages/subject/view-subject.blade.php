@extends('admin.partials.master')

@section('title')
  <title>Subject | BdCollage</title>
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
              <li class="breadcrumb-item active">Subject</li>
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
                <h3 class="card-title">Subject List</h3>
                <a href="{{ route('subject.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Subject</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Subject Name</th>
                      <th>Subject Code</th>
                      <th>Department</th>
                      <th>Semester</th>
                      <th>Total Mark</th>
                      <th>TC</th>
                      <th>TF</th>
                      <th>PC</th>
                      <th>PF</th>
                      <th>Cradit</th>
                      <th>Pass Mark</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allSubject as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->subject_code }}</td>
                          <td>{{ $value->department->name }}</td>
                          <td>{{ $value->semester->name }}</td>
                          <td>{{ $value->total_mark }}</td>
                          <td>{{ $value->tc }}</td>
                          <td>{{ $value->tf }}</td>
                          <td>{{ $value->pc }}</td>
                          <td>{{ $value->pf }}</td>
                          <td>{{ $value->cradit }}</td>
                          <td>{{ $value->pass_mark }}</td>
                          <td>
                            <a href="{{ route('subject.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('subject.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Subject Name</th>
                      <th>Subject Code</th>
                      <th>Department</th>
                      <th>Semester</th>
                      <th>Total Mark</th>
                      <th>TC</th>
                      <th>TF</th>
                      <th>PC</th>
                      <th>PF</th>
                      <th>Cradit</th>
                      <th>Pass Mark</th>
                      <th>Action</th>
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

