@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Invoice 
                <a class="btn btn-primary btn-sm" href="{{route('Invoices')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                                
                                
                                        <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img class="invoice-img" src="{{ asset('images/' . $data['business'][0]->file) }}"> 
                    <small class="float-right">I N V O I C E</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{ $data['business'][0]->name }}</strong><br>
                   {{ $data['business'][0]->address }}<br>
                   {{ $data['business'][0]->city }}{{ $data['business'][0]->state }}{{ $data['business'][0]->country }}{{ $data['business'][0]->zip }}<br>
                    Phone: {{ $data['business'][0]->phone }}<br>
                    Email: {{ $data['business'][0]->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $data['sales'][0]->customername }}</strong><br>
                    {{ $data['sales'][0]->address }}<br>
                    {{ $data['sales'][0]->city }}{{ $data['sales'][0]->state }}{{ $data['sales'][0]->country }}  {{ $data['sales'][0]->zip }}<br>
                    Phone: {{ $data['sales'][0]->phone }} <br>
                    Email: {{ $data['sales'][0]->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col mb-3">
                  <br>
                  <b>Invoice #</b>{{ $data['sales'][0]->invoice_id }}<br>
                  <b>Invoice Date:</b> {{ $data['sales'][0]->date }}<br>
                  <b>Payment Due:</b> {{ $data['sales'][0]->due_date }}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Qty.</th>
                      <th>Price</th>
                      <th>Tax</th>
                      <th>Discount</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($data['invoice_details'] as $invoice_detail)
                     <tr>
                      <td>{{$invoice_detail->name}}
                        <br>
                        <small>{{$invoice_detail->description}}</small>
                      </td>
                      <td>{{$invoice_detail->quantity}}</td>
                      <td>{{$invoice_detail->price}}</td>
                      <td>{{$invoice_detail->taxtotal}}</td>
                      <td>{{$invoice_detail->discounttotal}}</td>
                      <td>{{$invoice_detail->gtotal}}</td>
                    </tr>
                    @endforeach

                    

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                 <pre class="col-12 col-md-6" style='width:100%;display:inline-block;margin-top: 50px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size: 15px;'>
                  <p class="lead">Notes:</p><p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{ $data['sales'][0]->notes }}
                  </p>
                </pre>
                <!-- /.col -->
                <div class="col-12 col-md-6">
                  <p class="lead font-weight-bold">Invoice Summary</p>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ $data['business'][0]->currency }}{{ $data['sales'][0]->amount }}</td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>{{ $data['business'][0]->currency }}{{ $data['sales'][0]->tax }}</td>
                      </tr>
                      <tr>
                        <th>Discount:</th>
                        <td>{{ $data['business'][0]->currency }}{{ $data['sales'][0]->discount }}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{ $data['business'][0]->currency }}{{ $data['sales'][0]->total }}</td>
                      </tr>
                      <tr>
                        <th>Amount Due:</th>
                        <td>{{ $data['business'][0]->currency }}{{ $data['sales'][0]->due }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                    
                  @if ($data['sales'][0]->due > 0)  
                  <a href="../Payment/{{$data['sales'][0]->invoice_id}}" class="btn btn-warning float-right">
                    <i class="far fa-credit-card"></i> Make Payment
                  </a>
                  @endif
                   

                  <a  href="../invoiceDownload/{{$data['sales'][0]->invoice_id}}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->          


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

     })   
</script>
        
@endpush
