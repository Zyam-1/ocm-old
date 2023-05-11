<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}"/>

  <!-- Google Font: Source Sans Pro -->
 
  
  <!-- Font Awesome Icons -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" >
  
  <!-- IonIcons -->
  <link href="{{ asset('ionicons.min.css')}} rel="stylesheet" >
  
  <!-- Theme style -->
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
  <!-- DataTables -->
  <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" >

  <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet" >

  <!-- fancyfileuploader -->
  <link rel="stylesheet" href="{{ asset('plugins/fancy-file-uploader/fancy_fileupload.css') }}" />

  <!-- daterange picker -->
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" >

  <!-- Tempusdominus Bootstrap 4 -->
  <link href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" >

  <!-- Bootstrap4 Duallistbox -->
  <link href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}" rel="stylesheet" >
  
  <!-- BS Stepper -->
  <link href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}" rel="stylesheet" >

  <link href="{{ asset('css/custom.css?1') }}" rel="stylesheet"/>
  
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>  
<style>
body{
font-family:Ariel;

font-size:16px;
}
</style>

</head>

  <button type="button" id="print" class="btn btn-warning d-none" style="float:right;padding: 13px;font-size: 11px;" >Print</button>

<body>
        
      

        
       @foreach ($response['OCMRequestTestsDetails'] as $key => $OCMRequestTestsDetail)
                
        <div style="width:310px;text-align: left;font-size:12px; margin-top:2px" class="bg-white samples" id="Print_{{$OCMRequestTestsDetail->PhlebotomySampleID}}">
                                       
            
             <div class="pl-2 mt-2 p-0 float-left w-100"><b>{{$response['OCMRequest'][0]->PatName}}</b> 
                
                <?php 
                if($response['OCMRequest'][0]->RequestPriority != 'Normal') {

                    echo '<b class="text-danger" style="float: right;position: relative;right: 60px;font-size: 20px;">U</b>';
                }
                ?>
                
            </div>

              <div class="p-1 float-right d-none"><b>Printed {{$OCMRequestTestsDetail->PhlebotomySampleDateTime}}</b></div>

                 <div style="clear: both;"></div>

           
                                                    <div class="px-2" style="display:inline-block;overflow: hidden;height: 15px;"><b>{{$response['OCMRequest'][0]->DoB}} {{$response['OCMRequest'][0]->Sex}} 
                                                    
                                                     MRN {{$response['OCMRequest'][0]->Chart}}</b></div>

                                                      <div class="px-2"><b>
                                                       <!--  {{$OCMRequestTestsDetail->Hospital}}
                                                        / -->
                                                        {{$response['OCMRequest'][0]->Ward}}
                                                        <!-- /
                                                         {{$response['OCMRequest'][0]->bed}} -->
                                                         </b></div>

                                            <div class="p-0 pb-0 text-center">
                                                @if($OCMRequestTestsDetail->PhlebotomySampleID != '')
                                               
                                                <h3 style="height:57px;width: 180px;"><?php    echo DNS1D::getBarcodeSVG($OCMRequestTestsDetail->PhlebotomySampleID, 'C93',1.8,48) ; ?></h3>
                                              
                                               
                                                @endif
                                                </div> 

                                                 <div class="row px-2 pb-0 text-center">
                                                    <div class="col-md-12" style="background: none;overflow: hidden;width: 85%;">
                                                        <b 
    style="width: 70%;
    display: inline-block;
    background: none;
    overflow: hidden;
    margin: 0 auto;"
>
                                                    <?php
                                                        $res =  App\Http\Controllers\requests::TestCodes($OCMRequestTestsDetail->sample);
                                                          $re = implode('/',$res);
                                                          if(count($res) == 0) {
                                                            ?>
                                                            <script type="text/javascript">
                                                                 location.reload();
                                                            </script>
                                                            <?php
                                                          }
														  //return $res;
                                                        echo $re;
														//return $res0;
                                                 
                                                     ?>   
                                                        </b>
                                                    </div>
                                                </div>

                    
                                                <div class="row px-2 pb-0 pt-0">
                                                    <div style="padding-left: 5px;width:25%;display:inline-block;overflow: hidden;height: 13px;">
                                                        <b>{{$OCMRequestTestsDetail->Sample}}</b>
                                                    </div>
                                                    <div class="col-md-4" style="width:25%;display:inline-block;overflow: hidden;height: 13px;">
                                                        <b>{{$OCMRequestTestsDetail->specialhandling}}</b>
                                                    </div>
                                                    <div class="text-right" style="width:33%;display:inline-block;overflow: hidden;height: 13px;">
                                                        <b>{{$OCMRequestTestsDetail->Hospital}}</b>
                                                    </div>
                                                </div>
                                                

                                                <div style="writing-mode: vertical-rl; margin-top: -145px;float: right;margin-right: 56px;">
                                                    <b>
                                                        <?php echo 'Printed - ';

                                                            
                                                            if($response['Samples'][$key]->PhlebotomySampleDateTime == '') {

                                                                echo date("h:i:sa");

                                                            } else {

                                                                echo substr($response['Samples'][$key]->PhlebotomySampleDateTime,8);
                                                            }

                                                        ?>
                                                        
                                                    </b></div>

            </div>

    @endforeach






<style type="text/css" media="print">
@page {
     size: auto;   /* auto is the initial value */
     margin: 0 auto;  /* this affects the margin in the printer settings */
     page-break-after: auto;
}
</style>
<script type="text/javascript">
        $(document).ready(function(){
document.getElementsByTagName("BODY")[0].onafterprint = function() {myFunction()};

function myFunction() {
   window.top.close();
}


var ids = $('.samples').map(function() {
       
        var id = $(this).attr('id');

           $("#print").click(function(){
 
            function printData()
        {
           var divToPrint=document.getElementById(id);
           newWin= window.print();
           newWin.document.write(divToPrint.outerHTML);
           newWin.print();
           newWin.close();
        }

    printData();
});
    
            
        });

       $( "#print" ).trigger( "click" );
});

             

   




</script>
                                        
</body>
</html>