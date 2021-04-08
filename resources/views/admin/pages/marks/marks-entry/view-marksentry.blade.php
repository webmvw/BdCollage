@extends('admin.partials.master')

@section('title')
  <title>Student Marks Entry | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Marks Entry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Marks Entry</li>
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
                <h3 class="card-title">Student Marks Entry</h3>
              </div>
              
              <!-- /.card-header -->
              <form action="{{ route('student.marks.entry.store') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="semester">Semester <span style="color:red">*</span></label>
                        <select class="form-control select2" name="semester" id="semester">
                          <option value="">Select Semester</option>
                          @foreach($semesters as $semester)
                          <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subject">Subject <span style="color:red">*</span></label>
                        <select class="form-control select2" name="subject" id="subject">
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exam">Exam <span style="color:red">*</span></label>
                        <select class="form-control select2" name="exam" id="exam">
                          <option value="">Select Exam</option>
                          @foreach($exams as $exam)
                          <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <span class="btn btn-primary" id="search" style="margin-top: 32px">Search</span>
                    </div>
                  </div>
                </div>
                
                <div class="card-body d-none" id="marks-entry">
                  <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="table-primary">
                      <th>SL</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Department</th>
                      <th>Session</th>
                      <th>Marks</th>
                    </tr>
                    </thead>
                    <tbody id="marks-entry-tr">

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="mark-entry-btn" class="btn btn-success d-none">Submit</button>
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

  $(document).on('change', '#department', function(){
    var department = $('#department').val();
    $.ajax({
      url: "{{ route('get.all.subject') }}",
      type: "GET",
      data:{department:department},
      success:function(data){
        var html = '<option value="">Select Subject</option>';
        $.each(data,function(key,v){
          html += '<option value="'+v.id+'">'+v.name+'</option>';
        });
        $('#subject').html(html);
      }
    })
  })

  $(document).on('click', '#search', function(){
    var department = $('#department').val();
    var session = $('#session').val();
    var semester = $('#semester').val();
    var subject = $('#subject').val();
    var exam = $('#exam').val();
    if(session == ''){
      toastr.error("Please select Session.");
      return false;
    }
    if(semester == ''){
      toastr.error("Please select Semester");
      return false;
    }
    if(department == ''){
      toastr.error("Please select Department.");
      return false;
    }
    if(subject == ''){
      toastr.error("Please select Subject.");
      return false;
    }
    if(exam == ''){
      toastr.error("Please select Exam.");
      return false;
    }

    $.ajax({
      url: "{{ route('get.students.formarksentry') }}",
      type: "GET",
      data:{department:department, session:session},
      success:function(data){
        $('#marks-entry').removeClass('d-none');
        $('#mark-entry-btn').removeClass('d-none');
        var html='';
        $.each(data, function(key,v){
          html+='<tr>'+
                  '<td>'+(key+1)+'</td>'+
                  '<td>'+v.student.name+'</td>'+
                  '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                  '<td>'+v.department.name+'</td>'+
                  '<td>'+v.session.name+'</td>'+
                  '<td><input type="number" class="form-control" placeholder="Enter Marks" name="mark[]" value="" required></td>'
                  '</tr>';
        });
        html=$('#marks-entry-tr').html(html);
      }
    });
  })
</script>



@endsection

