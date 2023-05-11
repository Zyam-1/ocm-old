<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Request # {{$data['OCMRequest'][0]->ReqestID}} | {{$data['OCMRequest'][0]->PatName}} Report</title>
  <!-- <link href='http://fonts.googleapis.com/css?family=Signika:600|Roboto+Condensed' rel='stylesheet' type='text/css'> -->

</head>
<style type="text/css">
@page {
    margin-top:20px;
    margin-left:0px;
    margin-right:0px;
    margin-bottom:5px;
    }
</style>
<body style='font-family:sans-serif;font-size:15px;line-height: 1.4;'>
  
                                
          <!-- Main content -->
            <div class="invoice p-3 mb-3" style="width:750px;margin: 0 auto;">
              <!-- title row -->
              <div class="row">
               
                <div class="col-12">
                  <div style="width: 50%;display: inline-block;">
                    
                    <h2>Report</h2>

                    <br><br>

                    <h3 class="profile-username text-left mb-1"  style="margin:0;">Patient Info</h3>

                                            <p class="text-dark text-left m-0" style="margin:0;">
                                                <b id="patname">{{$data['OCMRequest'][0]->PatName}}</b>
                                             </p>
                                             <p class="text-dark text-left m-0" style="margin:0;">
                                                <b id="patSex" style="">

                                                  @if($data['OCMRequest'][0]->Sex == 'F')
                                                  Female
                                                  @elseif($data['OCMRequest'][0]->Sex == 'M')
                                                  Male
                                                  @else
                                                  Other
                                                  @endif

                                                </b> / 
                                                <b id="patage">
                                                  <?php  echo date("d-m-Y", strtotime($data['DoB']));
                                                     ?>
                                                </b>
                                            </p>
                                            <p class="text-dark text-left m-0 mb-2" id="pataddress"  style="margin:0;">
                                              <b>{{$data['OCMRequest'][0]->Address0}}</b>
                                            </p>



                  </div>

                  <div style="width: 48%;display: inline-block;text-align: right;padding-top: 10px;">
                    
                    <h4 style="padding:20px 5px 0 5px;">
                    <img style="width:100px;" src='{{ public_path("images/".$data["business"][0]->file) }}'> 

                            <p class="text-dark text-left m-0" style="margin:0;">
                                <b id="patname">{{$data["business"][0]->name}}</b>
                             </p>

                             <p class="text-dark text-left m-0" style="margin:0;">
                                <b id="patname">{{$data["business"][0]->phone}}</b>
                             </p>

                             <p class="text-dark text-left m-0" style="margin:0;">
                                <b id="patname">{{$data["business"][0]->email}}</b>
                             </p>

                             <p class="text-dark text-left m-0" style="margin:0;">
                                <b id="patname">{{$data["business"][0]->address}}</b>
                                <b id="patname">{{$data["business"][0]->city}}</b>
                                <b id="patname">{{$data["business"][0]->state}}</b>
                                <b id="patname">{{$data["business"][0]->country}}</b>
                             </p>
                      </h4>       

                         <script type="text/php">
                          if ( isset($pdf) ) {
                              $url = 'http://localhost/ocm/images/62c42a4a731b9.jpeg';
                              $x = 10;
                              $y = 10;
                              $text = "Page  {PAGE_NUM} of {PAGE_COUNT}";
                              $font = $fontMetrics->get_font("sans-serif", "bold");
                              $size = 10;
                              $color = array(0,0,0);
                              $word_space = 0.0;  //  default
                              $char_space = 0.0;  //  default
                              $angle = 0.0;   //  default
                              $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                          }
                      </script>

                  </div>


                  
                </div>
                <!-- /.col -->
              </div>



                                            

                                            <div class="row">

                                              <hr style="margin-bottom: 25px;margin-top: 15px;" />

                                            <div class="col-md-6" style="display: inline-block;width: 40%;">
                                               
                                                <label>Patient MRN : </label> <span id="patmrn">{{$data['OCMRequest'][0]->Chart}}</span>
                                                <br>
                                                 <label>Clinician : </label> <span id="clinician">{{$data['OCMRequest'][0]->Clinician}}</span>
                                                 <br>
                                                 <label>Location : </label> <span id="ward">
                                                   
                                                    @if($data['OCMRequest'][0]->Ward != null) 

                                                      @if($data['OCMRequest'][0]->bed != null)
                                                      {{$data['OCMRequest'][0]->Ward}} - Bed {{$data['OCMRequest'][0]->bed}} 
                                                      @else
                                                      {{$data['OCMRequest'][0]->Ward}} 
                                                      @endif

                                                      
                                                      @else

                                                      @if($data['OCMRequest'][0]->bed != null)
                                                      {{$data['OCMRequest'][0]->Ward}} - Bed {{$data['OCMRequest'][0]->bed}} 
                                                      @else
                                                     {{$data['OCMRequest'][0]->clinic}} 
                                                      @endif
                                                      
                                                      @endif

                                                 </span>
                                            </div>



                                             <div class="col-md-4" style="display: inline-block;width: 35%;">
                                                <label>Date Time : </label> 
                                                <span id="datetime">
                                                  <?php 
                                                                if($data['OCMRequest'][0]->ExecutionDateTime != '' || $data['OCMRequest'][0]->ExecutionDateTime != null) {

                                                                  echo date("d-m-Y H:i", strtotime($data['OCMRequest']));

                                                                }
                                                                ?>
                                                </span>
                                                <br>
                                                <label>Request #</label> 
                                                <span id="requestid">
                                                  {{$data['OCMRequest'][0]->ReqestID}}
                                                </span>
                                                <br>
                                                <label>Request Episode : </label> 
                                                <span id="episode">
                                                  {{$data['OCMRequest'][0]->RequestEpisodeID}}
                                                </span>
                                            </div>


                                            <div class="col-md-2"  style="display: inline-block;width: 22%;">
                                                <label>Fasting : </label> <span id="fasting">{{$data['OCMRequest'][0]->RequestFasting}}</span>
                                                <br>
                                                <label>Priority : </label> <span id="priority">{{$data['OCMRequest'][0]->RequestPriority}}</span>
                                            </div>



               <!-- Table row -->
              <div class="row" style="margin-top: 10px;">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" style='width:100%; border-spacing: 0px;border-collapse: separate;'>
                    
                       <?php if(count($data['results']) > 0) { ?>

                    <thead style="color: white;text-align: left;">
                    <tr>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">SampleID</th>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">Test</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Result</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Ranges</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Units</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Flags</th>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">Comments</th>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">SignedBy</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                 
                    @foreach ($data['results'] as $BioResult)
                   
                     <tr>
                      <td class="text-left">{{$BioResult->PhlebotomySampleID}}</td>
                      <td style="padding: 5px 10px;text-align: left;">{{$BioResult->testname}}</td>
                      <td style="padding: 5px 10px;text-align: center;">
                        @if($BioResult->result == '')
                          
                        @else
                        {{$BioResult->result}} 
                        @endif
                      </td>
                      <td style="padding: 5px 10px;text-align: center;">{{$BioResult->NormalLow}} - {{$BioResult->NormalHigh}}</td>
                      <td style="padding: 5px 10px;text-align: center;">{{$BioResult->Units}}</td>
                       
                       <td style="padding: 5px 10px;text-align: center;">
                        @if($BioResult->Flags == 'H')
                          <button style="background:red;padding: 5px 15px;border: 0px;color: white;" class="btn btn-danger">H</button>
                        @elseif($BioResult->Flags == 'L')
                          <button class="btn btn-info" style="background:#0d47a1;padding: 5px 15px;border: 0px;color: white;">L</button>
                          @endif
                      </td>

                      <td style="padding: 5px 10px;">{{$BioResult->Comment}}</td>
                      <td>{{$BioResult->name}}</td>
                    </tr> 
         
                    @endforeach
                  <?php } else { ?> 

                     <thead style="color: white;text-align: left;">
                    <tr>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">Test</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Result</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Ranges</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Units</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Flags</th>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">Comments</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($data['requested'] as $BioResult)
                     <tr>

                      <td style="padding: 5px 10px;text-align: left;">{{$BioResult->testname}}</td>
                      <td style="padding: 5px 10px;text-align: center;"> - </td>
                      <td style="padding: 5px 10px;text-align: center;"> - </td>
                      <td style="padding: 5px 10px;text-align: center;"> - </td>
                      <td style="padding: 5px 10px;text-align: center;"> - </td>
                      <td style="padding: 5px 10px;"> - </td>
                    </tr>
                    @endforeach

                  <?php } ?>

                    

                    </tbody>
                  </table>
                </div>




                  <div class="col-12 table-responsive mt-5" style="margin-top:100px">
                    <hr>
                    <h5>Additional Comments</h5>
                  <table class="table table-striped" style='width:100%; border-spacing: 0px;border-collapse: separate;'>
                    
                       <?php if(count($data['observations']) > 0) { ?>

                    <thead style="color: white;text-align: left;display: none;">
                    <tr>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">SampleID</th>
                      <th style="text-align: left;background: #{{$data['colorscheme']}};padding: 5px 10px;">Comments</th>
                      <th style="text-align: center;background: #{{$data['colorscheme']}};padding: 5px 10px;">Datetime</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                 
                    @foreach ($data['observations'] as $observation)
                   
                     <tr>
                      <td class="text-left">{{$observation->sampleid}}</td>
                      <td style="padding: 5px 10px;text-align: left;">{{$observation->message}}</td>
                      <td>{{$observation->datetime}}</td>
                    </tr> 
         
                    @endforeach
                  <?php } ?>

                    

                    </tbody>
                  </table>
                </div>



        

                <!-- /.col -->
              </div>
              <!-- /.row -->


                       
            </div> 

</body>
</html>
