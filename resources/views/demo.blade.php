@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">



    <div class="card card-primary card-outline">
    <div class="card-body table-responsive">                  
    <form id="formcoag">
    {{ csrf_field() }}
    <div class="row">    
    <div class="col-md-6">

   

<select id="commentid" name="commentid" class="select form-control mt-2">

<option selected disabled hidden>Choose An Option</option>
<option value="demographics">demographics</option>
  <option value="HaemTotals">HaemTotals</option>
  <option value="errorlos">Error Log</option>
  <option value="biotestdefinitions">biotestdefinitions</option>
</select>   
</div>                        
    </div>
    <p class="mt-2">(Select any Table name from OCM)</p>
        <div class="form-check form-check-inline">

</div>

<div class="buttons mt-3">
    <button class="btn btn-primary execute" id = "execute">Execute</button>
</div>

    <div class="row pt-2">
    <div class="col-md-12">
      <!-- <label class="form-label mb-0 mt-2">Comment Template</label> -->
    <!-- <textarea name="Comment Template" id="commenttemplate" class="form-control mt-2" rows="5"></textarea>   -->
    <div class="border" style="height:10vh;">
  
  </div>
    </div>  
    </div>
    <div class="buttons mt-3">
    <button class="btn btn-primary" id ="savebtn">Save</button>
    <button class="btn btn-warning">Clear</button> 
    <button class="btn btn-success">Exit</button>   
    </div>

   
    </form>
                                          


                            </div>
                        </div> 


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@extends('layouts.footer')

@push('script')

<script type="text/javascript">


  $(document).ready(function () {

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


});

var name;

    $(document).on('click', '.execute', function (event) { 
           name = $('#commentid').val();
            // alert(name)
           $('#table2').DataTable().destroy();
          load_data(name);
    });

    function load_data(name = '')
     {
  
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'demo') }}",
            data: {name : name},  
      },
      columns: [
          
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 

     });
    }
    function load_data()

</script>
        
@endpush
