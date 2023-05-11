@include('layouts.header')
  
<style type="text/css">
.select2-container {
    display: inline-block;
}
.text-sm .select2-container--default .select2-selection--multiple, select.form-control-sm~.select2-container--default .select2-selection--multiple {
    height: auto;
    padding: 5px;
    padding-bottom: 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #ced4da;
    border: 1px solid #ced4da;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}
table label {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400 !important;
}
thead {
    background: #ced4da;
    color: white;
}
.table td, .table th {
    padding: 5px;
    font-weight: 400;
}
td label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    width: 150px;
}
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #ced4da;
    background-color: #ced4da;
    box-shadow: none;
}

.customIcons {
  list-style-type: none;
  padding-left: 0;
}

.customIcons li {
  display: inline-block;
}

.customIcons img {
  filter: grayscale(100%);
}


.customIcons input[type="radio"][id^="myCheckbox"] {

  display: none;
}

.customIcons label {
  border: 1px solid #fff;
  padding: 5px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

.customIcons label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 23px;
  transition-duration: 0.4s;
  transform: scale(0);
}

.customIcons label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

.customIcons :checked + label {
  border-color: #ddd;
}

.customIcons :checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

.customIcons :checked + label img {
  transform: scale(0.9);
  /* box-shadow: 0 0 5px #333; */
    filter: grayscale(0%);
  z-index: -1;
}
.form-control {
    height: 40px;
    padding: 10px;
    font-size: 20px;
    border: 0px;
    border-bottom: 1px solid #ced4da;
    border-radius: 0px;
}
.text-sm .select2-container--default .select2-selection--single .select2-selection__rendered, select.form-control-sm~.select2-container--default .select2-selection--single .select2-selection__rendered {
    margin-top: 3px;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 0px solid #ced4da;
    border-radius: 0px;
    border-bottom: 1px solid #ced4da;
    font-size: 20px;
    padding: 5px;
    height: 40px !important;
}

.select2-container--default .select2-selection--multiple {
    background-color: white;
    border: 1px solid #ced4da;
    border-radius: 0;
    cursor: text;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #ced4da;
    border: 5px solid #ced4da;
    border-radius: 1px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
    font-size: 15px;
}

label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
    padding-left:10px ;
}
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Generate Report
                <a class="btn btn-info btn-sm" href="{{route('ReportsList')}}"><i class="fas fa-arrow-left"></i> GO BACK </a>
            </h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
				
				<div class="row">
					
					<div class="col-md-12">
						
						<div class="card card-primary card-outline mb-2">
			              <div class="card-body">
			                <form id="form">
			                  <h4 class="mb-3">Report Generator</h4>
			                  <br>
			                  <div class="row"> 
			                  {{ csrf_field() }}
			                  
			                  <div class="col-md-5 mb-3">
			                  	 <input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
			                  	 <input placeholder="Report Title *" autocomplete="off" type="text" placeholder="" class="form-control" id="name" name="name" value="">
			                  	</div>

			         

                          		<div class="col-md-3 mb-3">
			                    <select class="form-control" name="report" id="report">
			                    	<option value="" disabled selected>Generate Report from</option>
			                    	<option>Samples</option>
			                    	<option>Results</option>
			                    	<option>Activity Logs</option>
			                    </select>
			                  	</div>


			                  	<div class="col-md-12 mt-3">
			                  	<label style="font-size:20px">Show As</label>
									<ul class="customIcons">
									  <li>
									    <input type="radio" id="myCheckbox1" class="interface" name="interface" value="Table"  />
									    <label for="myCheckbox1">
									    	<img src="{{ asset('images/4598376.png') }}" />
									    	<label class="d-block m-0 text-center">Table</label>
									    </label>
									  </li>

									  <li>
									    <input type="radio" id="myCheckbox2" class="interface" name="interface" value="Bar Chart" />
									    <label for="myCheckbox2">
									    	<img src="{{ asset('images/610128.png') }}" />
									    	<label class="d-block m-0 text-center">Bar Chart</label>
									    </label>
									  </li>

									  <li>
									    <input type="radio" id="myCheckbox3" class="interface" name="interface" value="Line Chart"  />
									    <label for="myCheckbox3">
									    	<img src="{{ asset('images/1807350.png') }}" />
									    	<label class="d-block m-0 text-center">Line Chart</label>
									    </label>
									  </li>

									  <li>
									    <input type="radio" id="myCheckbox4" class="interface" name="interface" value="Pie Chart"  />
									    <label for="myCheckbox4">
									    	<img src="{{ asset('images/893220.png') }}" />
									    	<label class="d-block m-0 text-center">Pie Chart</label>
									    </label>
									  </li>
									</ul>
			                  	</div>


			                  	<div class="col-md-12"></div>
			                  	
			                  	<div class="col-md-12 mb-3">
			                  	<label style="font-size:20px">Group Filters  
			                  		
			                  		<small><div style="display: inline-block;"  class="custom-control custom-checkbox pl-5">
			                        <input class="custom-control-input" type="checkbox" name="allgroups" id="allgroups">
			                        <label for="allgroups" class="custom-control-label pl-0">Select All</label></div> </small>

			                  	</label>
			                    <select style="width:100%" name="filters[]" id="filters" multiple="">
			                    	<option>Users</option>
			                  		<option>Departments</option>
			                  		<option>Roles</option>
			                    </select>
			                  	</div>



			                  	<div class="col-md-12 mb-3">
			                  	<label style="font-size:20px">Predefined Dateranges

			                  		<small><div style="display: inline-block;"  class="custom-control custom-checkbox pl-5">
			                        <input class="custom-control-input" type="checkbox" name="alldates" id="alldates">
			                        <label for="alldates" class="custom-control-label pl-0">Select All</label></div> </small>

			                  	</label>
			                    <select style="width:100%" name="dates[]" id="dates" multiple="">
			                    	<option >Today</option>
			                  		<option >Yesterday</option>
			                  		<option >This Week</option>
			                  		<option >Last Week</option>
			                  		<option >This Month</option>
			                  		<option >Last Month</option>
			                  		<option >This Year Q1</option>
			                  		<option >This Year Q2</option>
			                  		<option >This Year Q3</option>
			                  		<option >This Year Q4</option>
			                  		<option >All of This Year</option>
			                  		<option >Last Year Q1</option>
			                  		<option >Last Year Q2</option>
			                  		<option >Last Year Q3</option>
			                  		<option >Last Year Q4</option>
			                  		<option >All of Last Year</option>
			                  		<option >Custom Date</option>
			                    </select>
			                  	</div>





			                  	<div class="col-md-12 mb-3">
			                  	<label style="font-size:20px">Make Available on Dashboard</label>
			                      <div class="custom-control custom-checkbox pl-5">
			                      	<input  type="hidden" name="dashboard" value="0">
			                        <input class="custom-control-input" type="checkbox" name="dashboard" id="dashboard" value="1">
			                        <label for="dashboard" class="custom-control-label pl-0">Yes</label></div> 
			                  	</div>


			                  	<div class="col-md-12 mb-3 d-none piechart">
			                  	<label style="font-size:20px">Key Information</label>
			                      <select style="width:100%" name="piechart[]" id="piechart" multiple="">
			                    </select>
			                  	</div>




			            
			                 </div> 

			                 	<div id="results"></div>


			                </form>
			                
			                </div>
			          </div>

			          
			   			<button type="button" class="btn btn-primary float-right mb-2 AddUpdatebtn">Generate Report</button>
			            



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
	   				

	   			var data = @json($data);

	   			 var editmode = data['editmode'];
	   			 var report = data['report'];
	   			 var reportfilteroptions = data['reportfilteroptions'];
	   			 var reportsoptions = data['reportsoptions'];
	   			 
	   			 if(editmode == 'yes') {

	   			 	 $( "#id" ).val(report[0].id);
	   			 	 $( "#name" ).val(report[0].name);
	   			 	 $( "#report" ).val(report[0].report).trigger('change');

	   			 	   if(report[0].interface == 'Table') {
                        	$("#myCheckbox1").prop("checked", true);
	                    } 
	                    else if(report[0].interface == 'Bar Chart') {
                        	$("#myCheckbox2").click();
	                    }
	                    else if(report[0].interface == 'Line Chart') {
                        	$("#myCheckbox3").prop("checked", true);
	                    }
	                    else if(report[0].interface == 'Pie Chart') {
                        	$("#myCheckbox4").prop("checked", true);
	                    } 


	                    if(report[0].dashboard == 1) {
                        	
                        	$("#dashboard").prop("checked", true);
	                    } 
		   				
		   				const dates = [];
		   				const filters = [];

		   				if(reportfilteroptions.length > 0) {

		   					$( reportfilteroptions ).each(function( index ) { 

		   						 if(reportfilteroptions[index].name == 'dates') {

		   						 	dates.push(reportfilteroptions[index].value);
		   						 }

		   						 if(reportfilteroptions[index].name == 'filter') {

		   						 	filters.push(reportfilteroptions[index].value);
		   						 }		
		   					})	
		   				}

		   				if(reportsoptions.length > 0) {

		   					$.ajax({
						            type: "get",
						            url:"{{ route( 'getModuleList') }}",
						            data: {'id' : report[0].id, 'report' : report[0].report },
						            timeout: 600000,
						            success: function(data) {
									
										$('#results').html(data)
						                  
					                }
					            });

		   				 }

		   				$('#dates').val(dates).trigger('change');
		   				$('#filters').val(filters).trigger('change');

	   			 }
	   			 	


			     $( "#report" ).select2();
			     $( "#interface" ).select2();
			     $( "#dates" ).select2({ multiple: true });
			     $( "#filters" ).select2({ multiple: true });
			     $( "#piechart" ).select2({ multiple: true });
			     

			     $(document).on('click', '#SelectAllA', function () {  

			     	$('.columns:checkbox').not(this).prop('checked', this.checked);

			     		if($('#SelectAllA').is(":checked") == false) { 

			     			$('.columns0').val(0);

			     		} else {

			     			$( ".columns0" ).each(function( index ) {
								  column = $( this ).attr('data');
								   var id = "#A-"+column+'columns';
								   $(id).val(column)
								 });
			     		}

			  	 })

			  	  $(document).on('click', '#SelectAllB', function () {  

			     	$('.columnfilters:checkbox').not(this).prop('checked', this.checked);

			     	if($('#SelectAllB').is(":checked") == false) { 

			     			$('.columnfilters0').val(0);

			     		} else {

			     			$('.columnfilters0').val(1);
			     		}


			  	 })

			  	   $(document).on('change', '#SelectAllC', function () {  

			     	$('.sortings:checkbox').not(this).prop('checked', this.checked);

			     	if($('#SelectAllC').is(":checked") == false) { 

			     			$('.sortings0').val(0);

			     		} else {

			     			$('.sortings0').val(1);
			     		}


			  	 })

		
		 $(document).on('change', '#report', function () {  

					$('#interface').val('').trigger('change'); 
			})
			



	    $(document).on('click', '.interface', function () {  


	    		var id = $("#id").val();
	    		var type = $(this).val();
	    		var report = $('#report').val();

	    		if(type == null) {
	    			
	    			return false;
	    		}


		    		if(type == 'Table') {

		    		$.ajax({
		            type: "get",
		            url:"{{ route( 'getModuleList') }}",
		            data: {'id' : id, 'report' : report },
		            timeout: 600000,
		            success: function(data) {
					
						$('#results').html(data)
		                  
		                }

		             });

		    		} else if(type == 'Bar Chart') { 

		    			$('#results').html('')
		    		}
		    		else if(type == 'Pie Chart') { 


		    			$('#piechart').empty().trigger('change')
		    			$('.piechart').attr('style', 'display: block !important');

		    			if(report == 'Samples') {

		    				$("#piechart").append(new Option("Samples Count", "Samples Count"));
		    				$("#piechart").append(new Option("Profiles Count", "Profiles Count"));
		    				$("#piechart").append(new Option("Tests Count", "Tests Count"));		
		    			}

		    			if(report == 'Results') {

		    				$("#piechart").append(new Option("Results Count", "Results Count"));
		    				$("#piechart").append(new Option("Flags Count", "Flags Count"));		
		    			}

		    			if(report == 'Activity Logs') {

		    				$("#piechart").append(new Option("Top 10 Activities", "Top 10 Activities"));
		    				$("#piechart").append(new Option("Top 10 Users", "Top 10 Users"));		
		    			}

		    			$('#results').html('')
		    		}
		    				

	    	
	    	})



	    	 $(document).on('change', '#piechart', function () {  

					var report = $('#report').val();

			
			})



				$(document).on('click', '.columns', function () { 

                   var value = "#A-"+this.id;
                   var param = this.id;
                   
                    if($('#' + this.id).is(":checked") == true) {

                    	 $(value).val(param.replace('columns',''));

                    } else {

                        $(value).val(0);
                    }
               })

               $(document).on('click', '.columnfilters', function () { 

                   var value = "#B-"+this.id;
                   var param = this.id;
                   
                    if($('#' + this.id).is(":checked") == true) {

                    	 $(value).val(1);

                    } else {

                        $(value).val(0);
                    }
               })

               $(document).on('click', '.sortings', function () { 

                   var value = "#C-"+this.id;
                   var param = this.id;
                   
                    if($('#' + this.id).is(":checked") == true) {

                    	 $(value).val(1);

                    } else {

                        $(value).val(0);
                    }
               })






  		// if not  edit mode 
            if(editmode == 'no') {

                $('.AddUpdatebtn').attr('id','btnAdd');

            } else {
            
                $('.AddUpdatebtn').attr('id','btnUpdate');
            }


            //add and update js code

            $(".AddUpdatebtn").click(function (event) {


                
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form')[0];

                    // Create an FormData object
                    var data = new FormData(form);


                    // append account names to form 
                     var accountname = $(".accountname");
                     
                        for(var i = 0; i < accountname.length; i++){
                            
                             data.append("accountname[]", $(accountname[i]).text());

                        }
                        


                    if(this.id == 'btnAdd') {

                        var url = "{{ route('addReport') }}";        
                       
                    } else {

                        var url = "{{ route('updateReport') }}";   

                    }


                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: url,
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {
                            //console.log(data);
                                if ($.isEmptyObject(data.error)){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                window.location = "{{route('ReportsList')}}"; 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                            }

                        });


      

       		 });



  $(document).ready(function() {
    
	    $("#allgroups").click(function(){
	       
	        if($("#allgroups").is(':checked')){
	            
	            $("#filters > option").prop("selected", "selected");
	            $("#filters").trigger("change");
	        } else {
	            
	            $("#filters").val(null).trigger("change");
	        }

	    });

	    $("#alldates").click(function(){
	       
	        if($("#alldates").is(':checked')){
	            
	            $("#dates > option").prop("selected", "selected");
	            $("#dates").trigger("change");
	        } else {
	            
	            $("#dates").val(null).trigger("change");
	        }

	    });

});

</script>
@endpush
