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
margin-left:0px;
margin-right:0px;
}
</style>
<body style="font-family: sans-serif;font-size:12px;line-height: 1.6;">
  
                                
          <!-- Main content -->
            <div class="invoice p-3 mb-3" style="width:800px;margin: 0 auto;">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4 style="padding:0 30px 0 30px;">
                    <img style="width:150px;" src='{{ public_path("images/".$data["business"][0]->file) }}'> 
                    <b style="float:right" class="float-right">I N V O I C E</b>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info" style="padding:0 30px 0 30px;">
                
                <div class="col-sm-4 invoice-col" style="width:35%;display: inline-block;">
                  From
                  <div>
                    <b>{{ $data['business'][0]->name }}</b><br>
                   {{ $data['business'][0]->address }}<br>
                   {{ $data['business'][0]->city }} {{ $data['business'][0]->state }} {{ $data['business'][0]->country }} {{ $data['business'][0]->zip }}<br>
                    Phone: {{ $data['business'][0]->phone }}<br>
                    Email: {{ $data['business'][0]->email }}
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="width:38%;display: inline-block;">
                  To
                  <div>
                    <b>{{ $data['sales'][0]->customername }}</b><br>
                    {{ $data['sales'][0]->address }}<br>
                    {{ $data['sales'][0]->city }} {{ $data['sales'][0]->state }} {{ $data['sales'][0]->country }} {{ $data['sales'][0]->zip }}<br>
                    Phone: {{ $data['sales'][0]->phone }} <br>
                    Email: {{ $data['sales'][0]->email }}
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="width:25%;display: inline-block;">
                  <b>Invoice #{{ $data['sales'][0]->invoice_id }}</b><br>
                  <b>Invoice Date:</b> {{ $data['sales'][0]->date }}<br>
                  <b>Payment Due:</b> {{ $data['sales'][0]->due_date }}<br>
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row" style="margin-top: 20px;">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" style='width:100%; border-spacing: 0px;border-collapse: separate;'>
                    <thead style="color: white;text-align: left;">
                    <tr>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Product</th>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Quantity</th>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Price</th>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Tax</th>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Discount</th>
                      <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($data['invoice_details'] as $invoice_detail)
                     <tr>
                      <td style="padding: 10px 20px;">{{$invoice_detail->name}} <br/> <small>{{$invoice_detail->description}}</small></td>
                      <td style="padding: 10px 20px;">{{$invoice_detail->quantity}}</td>
                      <td style="padding: 10px 20px;">{{$invoice_detail->price}}</td>
                      <td style="padding: 10px 20px;">{{$invoice_detail->taxtotal}}</td>
                      <td style="padding: 10px 20px;">{{$invoice_detail->discounttotal}}</td>
                      <td style="padding: 10px 20px;">{{$invoice_detail->gtotal}}</td>
                    </tr>
                    @endforeach

                    

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row" style="padding: 30px;">
                <!-- accepted payments column -->
                 <pre class="col-6" style='width:100%;display:inline-block;margin-top: 50px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size: 15px;'>
                  <p class="lead">Notes:</p><p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{ $data['sales'][0]->notes }}
                  </p>
                </pre>
                <!-- /.col -->
                <div class="col-6" style="margin-top: 20px;background: #f3f3f3;padding: 20px;width: 200px;display:inline-block;float: right;">
                  <p class="lead font-weight-bold" style="font-weight:bold;">Invoice Summary</p>


                    <table class="table table-striped" style="width:100%;">
                      <tr>
                        <th style="text-align: left;width:50%">Subtotal:</th>
                        <td style="text-align: right;">{{ $data['business'][0]->currency }}{{ $data['sales'][0]->amount }}</td>
                      </tr>
                      <tr>
                        <th style="text-align: left;">Tax</th>
                        <td style="text-align: right;">{{ $data['business'][0]->currency }}{{ $data['sales'][0]->tax }}</td>
                      </tr>
                      <tr>
                        <th style="text-align: left;">Discount:</th>
                        <td style="text-align: right;">{{ $data['business'][0]->currency }}{{ $data['sales'][0]->discount }}</td>
                      </tr>
                      <tr>
                        <th style="text-align: left;">Total:</th>
                        <td style="text-align: right;">{{ $data['business'][0]->currency }}{{ $data['sales'][0]->total }}</td>
                      </tr>
                      <tr>
                        <th style="text-align: left;">Amount Due:</th>
                        <td style="text-align: right;">{{ $data['business'][0]->currency }}{{ $data['sales'][0]->due }}</td>
                      </tr>
                    </table>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

               <p style="left:30px;position:absolute;bottom:0px;text-align: center;font-weight:bold;">{{ $data['sales'][0]->footer }}</p>
       

                            </div>
                        </div> 

</body>
</html>
