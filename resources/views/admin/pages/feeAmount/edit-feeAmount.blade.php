
@extends('admin.partials.master')

@section('title')
  <title>Edit Fee Amount | BdCollage</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Fee Amount</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('feeAmount.view') }}">Fee Amount</a></li>
              <li class="breadcrumb-item active">Edit Fee Amount</li>
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
                <h3 class="card-title">Edit Fee Amount</h3>
                <a href="{{ route('feeAmount.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Fee Amount List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('feeAmount.update', $allData[0]->fee_category_id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="feeCategory">Fee Category</label>
                            <select id="feeCategory" name="feeCategory" class="form-control" required>
                              <option value="">Select Fee Category</option>
                              @foreach($feeCategory as $key=>$value)
                              <option value="{{ $value->id }}" {{ ($allData[0]->fee_category_id == $value->id)? 'selected': '' }}>{{ $value->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        </div>
                      </div>
                      <div class="add-item">
                        @foreach($allData as $data)
                        <div class="row delete_whole_extra_item_add">
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="department">Department</label>
                              <select id="department" name="department[]" class="form-control" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $key=>$value)
                                <option value="{{ $value->id }}" {{ ($data->department_id == $value->id)? 'selected': '' }}>{{ $value->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="amount">Amount</label>
                            <input type="text" value="{{ $data->amount }}" name="amount[]" id="amount" class="form-control" placeholder="Enter Amount" required>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-12">
                            <span class="btn btn-success addeventmore" style="margin-top: 32px"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore" style="margin-top: 32px;"><i class="fa fa-minus-circle"></i></span>
                          </div>
                        </div>
                        @endforeach
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

<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <label for="department">Department</label>
            <select id="department" name="department[]" class="form-control" required>
              <option value="">Select Department</option>
              @foreach($departments as $key=>$value)
              <option value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <label for="amount">Amount</label>
          <input type="text" name="amount[]" id="amount" class="form-control" placeholder="Enter Amount" required>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
          <span class="btn btn-success addeventmore" style="margin-top: 32px"><i class="fa fa-plus-circle"></i></span>
          <span class="btn btn-danger removeeventmore" style="margin-top: 32px;"><i class="fa fa-minus-circle"></i></span>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var counter = 0;
    $(document).on("click", ".addeventmore", function(){
      var whole_extra_item_add = $("#whole_extra_item_add").html();
      $(this).closest(".add-item").append(whole_extra_item_add);
      counter++;
    });
    $(document).on('click', '.removeeventmore', function(){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1;
    });
  });
</script>




<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      "feeCategory": {
        required: true,
      },
      "department[]": {
        required: true,
      },
      "amount[]": {
        required: true,
      },
    },
    messages: {
      
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
