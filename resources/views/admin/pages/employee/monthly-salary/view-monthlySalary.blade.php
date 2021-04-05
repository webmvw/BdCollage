@extends('admin.partials.master')

@section('title')
  <title>Monthly Salary | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Monthly Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Monthly Salary</li>
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
                <h3 class="card-title">Employee Monthly Salary</h3>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="date">Select any date of Month</label>
                        <input type="date" name="date" id="date" placeholder="select Date" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-primary" id="search" style="margin-top: 32px">Search</button>
                    </div>
                  </div>
                </div>  
                <div class="card-body">
                  <div id="DocumentResults"></div>
                  <script id="document-template" type="text/x-handlebars-template">
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="card-title">Employee Monthly Salary sheet</p>
                      <p>Date: @{{{monthname}}}</p>
                    </div>
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
    var date = $('#date').val();

    if(date == ''){
      toastr.error("Please select Date.");
      return false;
    }

    $.ajax({
      url: "{{ route('employee.monthly.salary.details') }}",
      type: "GET",
      data:{date:date},
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

