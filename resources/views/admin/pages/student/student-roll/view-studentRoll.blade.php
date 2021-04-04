@extends('admin.partials.master')

@section('title')
  <title>Student Roll Generate | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Roll Generate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Roll Generate</li>
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
                <h3 class="card-title">Student Roll Generate</h3>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="department">Department <span style="color:red">*</span></label>
                        <select class="form-control select2" name="department" id="department">
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
                        <select class="form-control select2" name="session" id="session">
                          <option value="">Select Session</option>
                          @foreach($sessions as $session)
                          <option value="{{ $session->id }}">{{ $session->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary" id="search" style="margin-top: 32px">Search</button>
                    </div>
                  </div>
                </div>
              <form action="{{ route('student.roll.store') }}" method="post">
                @csrf  
                <div class="card-body d-none" id="roll-generate">
                  <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Department</th>
                      <th>Session</th>
                      <th>Roll</th>
                    </tr>
                    </thead>
                    <tbody id="roll-generate-tr">

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="roll_generate_btn" class="btn btn-success d-none">Roll Generate</button>
                </div>
              </form>
            </div>
          </div>

        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).on('click', '#search', function(){
    var department = $('#department').val();
    var session = $('#session').val();
    if(department == ''){
      toastr.error("Please select Department.");
      return false;
    }
    if(session == ''){
      toastr.error("Please select Session.");
      return false;
    }
    $.ajax({
      url: "{{ route('get.register.students') }}",
      type: "GET",
      data:{department:department, session:session},
      success:function(data){
        $('#roll-generate').removeClass('d-none');
        $('#roll_generate_btn').removeClass('d-none');
        var html='';
        $.each(data, function(key,v){
          html+='<tr>'+
                  '<td>'+(key+1)+'</td>'+
                  '<td>'+v.student.name+'</td>'+
                  '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                  '<td>'+v.department.name+'</td>'+
                  '<td>'+v.session.name+'</td>'+
                  '<td><input type="number" class="form-control" placeholder="Enter Roll" name="roll[]" value="'+v.roll+'"></td>'
                  '</tr>';
        });
        html=$('#roll-generate-tr').html(html);
      }
    });
  })
</script>


@endsection

