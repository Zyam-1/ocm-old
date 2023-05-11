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
                    <b style="float:right" class="float-right">C U S T O M E R &nbsp; S T A T E M E N T</b>
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
                    <b>{{ $data['customer'][0]->name }}</b><br>
                    {{ $data['customer_account'][0]->address }}<br>
                    {{ $data['customer_account'][0]->city }} {{ $data['customer_account'][0]->state }} {{ $data['customer_account'][0]->country }} {{ $data['customer_account'][0]->zip }}<br>
                    Phone: {{ $data['customer'][0]->phone }} <br>
                    Email: {{ $data['customer'][0]->email }}
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="width:25%;display: inline-block;text-align: right;">
                  <b>{{ $data['datefrom'] }} - {{ $data['dateto'] }}</b><br>
                  <b>Opening Balance : {{ $data['business'][0]->currency }}{{ $data['customerbalance'][0]->total }}</b><br>
                  <b>Invoices : {{ $data['business'][0]->currency }}{{ $data['customerbalance'][0]->invoices }}</b><br>
                  <b>Payments : {{ $data['business'][0]->currency }}{{ $data['customerbalance'][0]->received }}</b><br>
                  <b>Closing Balance : {{ $data['business'][0]->currency }}{{ $data['closingbalance'] }}</b><br>
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
                
                          <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Date</th>
                          <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Activity</th>
                          <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Account</th>
                          <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Amount</th>
                          <th style="text-align: left;background: #203F9A;padding: 10px 20px;">Balance</th>
                       
                        </tr>
                      </thead>

                      <tbody>
                     

                     <tr>
                      <td style="padding: 10px 20px;">{{$data['datefrom']}}</td>
                      <td style="padding: 10px 20px;"><h3 style="margin: 0;">Opening Balance</h3></td>
                      <td style="padding: 10px 20px;">{{$data['customer_account'][0]->name}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$data['customerbalance'][0]->total}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$data['customerbalance'][0]->total}}</td>
                    </tr>

                    @php
                    $balance = $data['customerbalance'][0]->total;
                    @endphp

                    @foreach ($data['activities'] as $activity)

                    @if($activity->type == 'Invoice')

                    @php
                    $balance = $activity->total+$balance;
                    @endphp

                     <tr>
                      <td style="padding: 10px 20px;">{{date('d M Y', strtotime($activity->date));}}</td>
                      <td style="padding: 10px 20px;">{{$activity->type}} <br/> <b style="color: #203F9A;">Invoice # {{$activity->invoice_id}}</b> </td>
                      <td style="padding: 10px 20px;">{{$activity->name}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$activity->total}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$balance}}</td>
                    </tr>
                    
                    @else

                    @php
                    $balance = $balance-$activity->total;
                    @endphp

                    <tr>
                      <td style="padding: 10px 20px;">{{date('d M Y', strtotime($activity->date));}}</td>
                      <td style="padding: 10px 20px;">{{$activity->type}} <br/> <b style="color: #203F9A;">Payment ID : {{$activity->uid}}</b></td>
                      <td style="padding: 10px 20px;">{{$activity->name}}</td>
                      <td style="padding: 10px 20px;color: red;">{{ $data['business'][0]->currency }}{{$activity->total}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$balance}}</td>
                    </tr>


                    @endif

                    @endforeach



                    <tr>
                      <td style="padding: 10px 20px;">{{$data['dateto']}}</td>
                      <td style="padding: 10px 20px;"><h3 style="margin: 0;">Closing Balance</h3></td>
                      <td style="padding: 10px 20px;">{{$data['customer_account'][0]->name}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$data['closingbalance']}}</td>
                      <td style="padding: 10px 20px;">{{ $data['business'][0]->currency }}{{$data['closingbalance']}}</td>
                    </tr>


                      </tbody>

                    </table> 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            

          

                            </div>
                        </div> 

</body>
</html>
