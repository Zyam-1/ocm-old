<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Scan Sample
         
       </h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Scan Sample</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">



<div class="row">
<div class="form-group col-md-3" >
<input type="text" class="form-control" placeholder="Sample #" id="sampleid" autofocus="autofocus" >
</div>
<div class="form-group col-md-4">

<input type="button" id ="submit" value="Submit" class="btn btn-info">

<input type="button" id ="addons" value="Order Addons" class="btn btn-primary">
</div>
</div>    


<div class="container-fluid">
<div class="card card-primary card-outline">
                      <div class="card-body table-responsive"> 
<table id="ss"  class=" table table-striped">
                    
                    <thead>
                    
                    <tr>
                    
                    
                    <th>SampleID</th>
                    <th>ProfileID</th>
                    <th>PatName</th>
                    <th>DOB</th>

                    <th>Urgent</th>
                    <th>Sample Date</th>
                    <th>Received Date</th>
                     <th>Actions</th> 

                   
       
       
                     
                    
                     
       
       
                     
                     </tr>
       
       
                        </thead>
                        <tbody id="noice">

                        </tbody>
</table >

                        <button class="btn btn-info d-none mt-2" style="padding:10px" id="placeholder" >
Place Order
</button>



</div>


</div>
     



           


             

        </div>
</div>
  <!-- /.row -->
</div>
<!-- /.content-wrapper -->


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




function inputfocus(){
 
$('#sampleid').val('').removeAttr('checked').removeAttr('selected');
 $('#sampleid').focus();
}

function senddata () {
var sid = $("#sampleid").val();

$.ajax({
url: "{{ route('ScanSample') }}",
method: 'POST', 
data : {
sid:sid
}

})
.done(function(response){
console.log(response+"sss");



 $("#noice").append(response);
 $("#placeholder").removeClass('d-none');


  inputfocus();

}).fail(function (jqXHR, textStatus, errorThrown) {
// Request failed. Show error message to user. 
// errorThrown has error message.
Lobibox.notify('warning', {
                          pauseDelayOnHover: true,
                          continueDelayOnInactiveTab: false,
                          position: 'top right',
                          msg: "Sample# does not exist",
                          icon: 'bx bx-info-circle'
                      });
                      
inputfocus(); //focuses input field

})

event.preventDefault();


}

function Orderadd () {
var sid = $("#sampleid").val();

$.ajax({
url: "{{ route('OrderSample') }}",
method: 'POST', 
data : {
sid:sid
}

})
.done(function(response){
console.log(response+"sss");



 $("#noice").append(response);
 $("#placeholder").removeClass('d-none');


  inputfocus();

}).fail(function (jqXHR, textStatus, errorThrown) {
// Request failed. Show error message to user. 
// errorThrown has error message.
Lobibox.notify('warning', {
                          pauseDelayOnHover: true,
                          continueDelayOnInactiveTab: false,
                          position: 'top right',
                          msg: "Sample# does not exist",
                          icon: 'bx bx-info-circle'
                      });
                      
inputfocus(); //focuses input field

})

event.preventDefault();


}










$("#delrow").click(function(){
delrow();
});
//  function delrow(){

//   var a=$('#ss tr:last').remove(); 
//   // console.log(a);
//   // a.last().remove();    
//  }

$('table').on('click', '#delrow', function(e){
$(this).closest('tr').remove()
})


var wage = document.getElementById("sampleid");


wage.addEventListener("keyup", function (e) {

//checks whether the pressed key is "Enter"

if (e.code === "Enter"||e.code==="NumpadEnter") { 

var a=$('table td');
if(a.length!=0){
var sid = $("#sampleid").val();
var tablesid = document.getElementsByName('sID[]');

// var b=tablesid.val();
s=[];
      // console.log(input2) 
      for (var i = 0; i < tablesid.length; i++) {
          var b = tablesid[i];
          s[i] = b.value  ;
         
        
                             
      }

 

      
      const arrOfNum = [];

    s.forEach(s => {
      arrOfNum.push(Number(s));
    });    
          console.log(arrOfNum);

if(s.includes(sid)){
         
           Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Sample Already selected.',
                        icon: 'bx bx-info-circle'
                    });
                    return false;  

        } 
        

}
senddata();
}
});


$("#submit").click(function(){

var a=$('table td');
if(a.length!=0){
var sid = $("#sampleid").val();
var tablesid = document.getElementsByName('sID[]');

// var b=tablesid.val();
s=[];
      // console.log(input2) 
      for (var i = 0; i < tablesid.length; i++) {
          var b = tablesid[i];
          s[i] = b.value  ;
         
        
                             
      }

 

      
      const arrOfNum = [];

    s.forEach(s => {
      arrOfNum.push(Number(s));
    });    
          console.log(arrOfNum);

if(s.includes(sid)){
         
           Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Sample Already selected.',
                        icon: 'bx bx-info-circle'
                    });
                    return false;  

        } 
        

}
senddata();

});

function duplicate_check(){


} 



$("#addons").click(function(){

var a=$('table td');
if(a.length!=0){
var sid = $("#sampleid").val();
var tablesid = document.getElementsByName('sID[]');

// var b=tablesid.val();
s=[];
  // console.log(input2) 
  for (var i = 0; i < tablesid.length; i++) {
      var b = tablesid[i];
      s[i] = b.value  ;
     
    
                         
  }



  
  const arrOfNum = [];

s.forEach(s => {
  arrOfNum.push(Number(s));
});    
      console.log(arrOfNum);

if(s.includes(sid)){
     
       Lobibox.notify('warning', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Sample Already selected.',
                    icon: 'bx bx-info-circle'
                });
                return false;  

    } 
    

}
Orderadd();

});










$(document).on('click', '#placeholder', function () {


      var input2 = document.getElementsByName('sID[]');
      
s=[];
      // console.log(input2) 
      for (var i = 0; i < input2.length; i++) {
          var b = input2[i];
          s[i] = b.value  ;
        
                             
      }
      var input3 = document.getElementsByName('sdate[]');
      
      sdate=[];
                  // console.log(input2) 
                  for (var i = 0; i < input3.length; i++) {
                      var c = input3[i];
                      sdate[i] = c.value  ;
                                         
                  }
                  var input4 = document.getElementsByName('rdate[]');
      
      rdate=[];
                  // console.log(input2) 
                  for (var i = 0; i < input4.length; i++) {
                      var d = input4[i];
                      rdate[i] = d.value  ;
                                         
                  }
      $.ajax({
url: "{{ route('Scanpost') }}",
method: 'POST',
data : {
sdate:sdate,
rdate:rdate,
s:s
}

})
.done(function(response){
Lobibox.notify('success', {
                          pauseDelayOnHover: true,
                          continueDelayOnInactiveTab: false,
                          position: 'top right',
                          msg: "Order Placed Successfully",
                          icon: 'bx bx-check-circle'
                      });
                      $("#noice").html('');
                      
 $("#placeholder").addClass('d-none');
 inputfocus(); //focuses input field   



});
     
});

});








            

</script>
@endpush
