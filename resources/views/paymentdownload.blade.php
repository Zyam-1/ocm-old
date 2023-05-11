<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ config('app.name') }}</title>

</head>
<style type="text/css">
  @page {
margin-top:10px;
margin-left:0px;
margin-right:0px;
margin-bottom:10px;
}
</style>
<body style="font-family: sans-serif;font-size:9px;line-height: 1.4;">
  
                                
          <!-- Main content -->
            <div class="invoice p-3 mb-3" style="width:550px;margin: 0 auto;">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4 style="padding:0 10px 0 10px;">
                    <img style="width:70px;" src='{{ public_path("images/".$data["business"][0]->file) }}'> 
                    <b style="float:right" class="float-right">P A Y M E N T &nbsp; R E C E I P T</b>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info" style="padding:0 10px 0 10px;">
                
                <div class="col-sm-4 invoice-col" style="width:40%;display: inline-block;">
                 Payment From

                  <div>
                    <b>{{ $data['sales'][0]->customername }}</b><br>
                    {{ $data['sales'][0]->address }}<br>
                    {{ $data['sales'][0]->city }} {{ $data['sales'][0]->state }} {{ $data['sales'][0]->country }} {{ $data['sales'][0]->zip }}<br>
                    Phone: {{ $data['sales'][0]->phone }} <br>
                    Email: {{ $data['sales'][0]->email }}
                  </div>

                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="width:33%;display: inline-block;">
                  To
                  <div>
                    <b>{{ $data['business'][0]->name }}</b><br>
                   {{ $data['business'][0]->address }}<br>
                   {{ $data['business'][0]->city }} {{ $data['business'][0]->state }} {{ $data['business'][0]->country }} {{ $data['business'][0]->zip }}<br>
                    Phone: {{ $data['business'][0]->phone }}<br>
                    Email: {{ $data['business'][0]->email }}
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="width:25%;display: inline-block;">
                  <b>Payment ID : </b>{{ $data['sales'][0]->uid }}<br>
                  <b>Payment Date:</b> {{ $data['sales'][0]->date }}<br>
                   @if ($data['sales'][0]->invoice_id != '')
                  <b>Invoice Number :</b> {{ $data['sales'][0]->invoice_id }}<br>
                  @endif
                  <b>Amount:</b> {{ $data['business'][0]->currency }}{{ $data['sales'][0]->total }}
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->

              <div class="row" style="padding:0 10px;">
                <!-- accepted payments column -->
                <pre class="col-6" style='width:100%;display:inline-block;margin-top: 0px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size: 9px;'>
                  <p class="lead">Notes:</p><p class="text-muted well well-sm shadow-none" style="margin-top:0px;">{{ $data['sales'][0]->notes }}
                  </p>
                </pre>
                <!-- /.col -->
              </div>
              <!-- /.row -->

                            </div>
                        </div> 

</body>
</html>
