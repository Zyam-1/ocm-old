@include('layouts.header')
  
  <style type="text/css">
.flex-wrap {
    -webkit-flex-wrap: wrap!important;
    -ms-flex-wrap: wrap!important;
    flex-wrap: wrap!important;
    width: 34%;
    display: inline-block;
    text-align: center;
    top: -3px;
}
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">BL1200 Codes Mapping </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">BL1200 Codes Mapping </li>
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

                           <div class="row">
                                    
                             <div class="col-md-12 mb-3">  
                    
                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-8 m-auto">
                                                    <h2 class="text-center">Query Save</h2>
                                                        <!-- <div class="col-auto">
                                                            <label class="sr-only" for="dbselect">Database</label>
                                                            <select name="dbselect" id="dbselect" class="form-control">
                                                                <option value="CavanTest">CavanTest</option>
                                                                <option value="CavanTest">CavanTransfusion</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-auto ">
                                                            <div class="input-group my-4 ">
                                                                <label for="userid" class="mt-1 form-label">Username</label>
                                                                <input type="text" class="ml-2 form-control" id="userid" name="userid">
                                                      
                                                                <label for="pass"  class="ml-2 mt-1 form-label">Password</label>
                                                                <input type="text" class="ml-2 form-control" id="pass" name="pass">
                                                            </div>
                                                          
                                                        </div> -->
                                                        <div class="col-auto">
                                                            <hr>
                                                        <div class="form-check pl-0">
                                                            <label for="querytext">Enter Queries here</label>
                                                            <textarea name="querytext"id="querytext" class="w-100 form-control" rows="10"><?php for($i=0; $i<count($sql);$i++)
                                                            {
                                                                echo $sql[$i]->dbquery;
                                                                 echo "\n";
                                                            }?></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary save ml-2 mt-2">Save</button>
                                                    <button type="button" class="btn btn-secondary run ml-2 mt-2">Run</button>
                                                </div>
                                             </div>   
                                        </form>

                                 </div>

                             </div> 

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

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>





<script>
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var querytext="";

    $(document).on('click','.save',function(){


     let formmy=document.getElementById("form");
     let formd=new FormData(formmy);

     console.log(formd);

     swal({
      title: "Are you sure?",
      text: "Once Inserted, you will not be able to recover this file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,

    }).then((willDelete) => {
   if (willDelete) {

   
    $.ajax({
            type:'post',
            url:'{{route('saveQuery')}}',
            data: formd,
            processData: false,
            contentType: false,
        
        }).done(function(response){

            console.log(response);

            if(response.success == true){

            Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Data Saved Successfully',
                    icon: 'bx bx-info-circle'
                });

            } else{

            }

        })


        } else {
            swal("Your file is safe!");
        }
        table.ajax.reload();

        });

        event.preventDefault();

    });

    function getSelectionText() {
        var text = "";
        var activeEl = document.activeElement;
        var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;
        if (
        (activeElTagName == "textarea") || (activeElTagName == "input" &&
        /^(?:text|search|password|tel|url)$/i.test(activeEl.type)) &&
        (typeof activeEl.selectionStart == "number")
        ) {
            text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
        } else if (window.getSelection) {
            text = window.getSelection().toString();
        }
        return text;
    }

      document.onmouseup = document.onkeyup = document.onselectionchange = function() {
        // document.getElementById("sel").value = getSelectionText();
        querytext = getSelectionText();
      };

    $(document).on('click','.run',function(){

      // var dbselect = document.getElementById("dbselect").value;
      console.log(querytext);

      $.ajax({
            type:'post',
            url:'{{route('runQuery')}}',
            data: {querytext: querytext},
            // processData: false,
            // contentType: false,
        
        }).done(function(response){
            console.log(response);
        });

    });
});
</script>

@endpush
