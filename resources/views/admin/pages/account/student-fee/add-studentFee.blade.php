@extends('admin.partials.master')

@section('title')
  <title>Add Student Fee | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Student Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('account.student.fee.view') }}">View Student Fee</a></li>
              <li class="breadcrumb-item active">Add Student Fee</li>
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
                <h3 class="card-title">Add Student Fee</h3>
                <a href="{{ route('account.student.fee.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> View Student Fee</a>
              </div>
              
              <!-- /.card-header --> 
                <div class="card-body">
                  <div class="row">
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
                        <label for="feeCategory">Fee Category <span style="color:red">*</span></label>
                        <select class="form-control select2" name="feeCategory" id="feeCategory">
                          <option value="">Select Fee Category</option>
                          @foreach($feeCategories as $feeCategory)
                          <option value="{{ $feeCategory->id }}">{{ $feeCategory->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="date">Date</label>
                      <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date">
                    </div>
                    <div class="col-md-3">
                      <span class="btn btn-primary" id="search" style="margin-top: 32px">Search</span>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                  <div id="DocumentResults"></div>
                  <script id="document-template" type="text/x-handlebars-template">
                    <form action="{{ route('account.student.fee.store') }}" method="post">
                      @csrf
                      <table class="table table-sm table-bordered table-striped" style="width: 100%">
                        <thead>
                          <tr class="table-primary">
                            @{{{thsource}}}
                          </tr>
                        </thead>
                        <tbody>
                          @{{#each this}}
                          <tr>
                            @{{{tdsource}}}
                          </tr>
                          @{{/each}}
                        </tbody>
                      </table>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </script>
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

<script type="text/javascript">
   $(document).on('click', '#search', function(){
    var department = $('#department').val();
    var session = $('#session').val();
    var feeCategory = $('#feeCategory').val();
    var date = $('#date').val();

    if(department == ''){
      toastr.error("Please select Department.");
      return false;
    }
    if(session == ''){
      toastr.error("Please select Session.");
      return false;
    }
    if(feeCategory == ''){
      toastr.error("Please select fee Category");
      return false;
    }
    if(date == ''){
      toastr.error("Please select date");
      return false;
    }

    $.ajax({
      url: "{{ route('account.fee.get.student') }}",
      type: "GET",
      data:{department:department, session:session, feeCategory:feeCategory, date:date},
      success:function(data){
        var source = $('#document-template').html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
      }
    });
  })
</script>


@endsection

