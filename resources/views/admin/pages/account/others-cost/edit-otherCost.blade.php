
@extends('admin.partials.master')

@section('title')
  <title>Edit Others Cost | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Account Others Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('account.other.cost.view') }}">Account Others Cost</a></li>
              <li class="breadcrumb-item active">Edit Others Cost</li>
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
                <h3 class="card-title">Edit Others Cost</h3>
                <a href="{{ route('account.other.cost.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Others Cost List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('account.other.cost.update', $accountOtherCost->id) }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="amount">Amount <span style="color:red">*</span></label>
                            <input type="number" value="{{ $accountOtherCost->amount }}" name="amount" class="form-control" id="amount" placeholder="Enter Cost Amount">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="date">Date <span style="color:red">*</span></label>
                            <input type="date" value="{{ $accountOtherCost->date }}" name="date" class="form-control" id="date">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <img id="showImage" src="{{ asset('public/img/account/otherscost/'.$accountOtherCost->image) }}" align="user image" style="width:150px; height: 150px;border:1px solid #0069D9;padding:1px;">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="description">Description</label>
                          <textarea class="form-control" name="description" id="description" placeholder="Enter Others Cost Description">{{ $accountOtherCost->description }}</textarea>
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
      amount: {
        required: true,
        number:true,
      },
      date:{
        required: true,
      },
      description:{
        required: true,
      }
    },
    messages: {
      amount: {
        required: "Please enter cost amount.",
        number: "Invalid amount input.",
      },
      date:{
        required: "Please enter date.",
      },
      description:{
        required: "Please enter description.",
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