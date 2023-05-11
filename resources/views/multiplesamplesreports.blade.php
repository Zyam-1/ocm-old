@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

				
				<div class="row">
					
					<div class="col-md-12">
						
						<div class="card card-primary card-outline">
			              <div class="card-body">
			                <form id="form">
			                  <h4>Cumulative Sample Reports</h4>
			                  <div class="row"> 
			                  {{ csrf_field() }}
			                  <div class="form-group col-md-3">
			                  	<label>Date From</label>
			                    <input type="date" placeholder="" class="form-control" id="date1" name="date1" value="">
			                  </div>
			                  <div class="form-group col-md-3">
			                  	<label>Date To</label>
			                    <input type="date" placeholder="" class="form-control" id="date2" name="date2" value="">
			                  </div>
			                   <div class="form-group col-md-3">
			                  	<label>User</label>
			                    <select class="form-control" name="user" id="user">
			                    	<option>All</option>
			                    </select>
			                  </div>

			                  <div class="col-md-12">
			                  	<button type="button" id="viewReport" class="btn btn-primary">View Report</button>
			                  </div>
			                 </div> 
			                </form>
			                
			                </div>
			            </div>

			            <div class="card card-primary card-outline">
			              <div class="card-body">
			                  <h4>Results</h4>
			                	<div id="results">
			                		No result found :(
			                	</div>
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
<script type="text/javascript">
	   

	    $(document).on('click', '#viewReport', function () {  

	    		var sampleid = $('#sampleid').val();

	    		if(sampleid == null || sampleid == '') {

	    			 Lobibox.notify('info', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: 'Module is under development.',
                                icon: 'bx bx-info-circle'
                            });

	    			return false;
	    		}


		    		$.ajax({
		            type: "get",
		            url:"{{ route( 'sampleInfo') }}",
		            data: {'sampleid' : sampleid },
		            timeout: 600000,
		            success: function(data) {
		               
					 if ($.isEmptyObject(data.error)){
                     
		               	 	$('#results').html(data);
                		
							} else {

				    			$('#results').html('No result found :(');

							     Lobibox.notify('warning', {
							            pauseDelayOnHover: true,
							            continueDelayOnInactiveTab: false,
							            position: 'top right',
							            msg: data.error,
							            icon: 'bx bx-info-circle'
							        });
							     $(".savebtn").prop("disabled", false);
							}

		                  
		                }

		             });			

	    })


</script>
@endpush
