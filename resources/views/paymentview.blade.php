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
                    <small class="float-right">P A Y M E N T &nbsp; R E C E I P T</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Payment From
                  <address>
                    <strong>{{ $data['sales'][0]->customername }}</strong><br>
                    {{ $data['sales'][0]->address }}<br>
                    {{ $data['sales'][0]->city }} {{ $data['sales'][0]->state }} {{ $data['sales'][0]->country }} {{ $data['sales'][0]->zip }}<br>
                    Phone: {{ $data['sales'][0]->phone }} <br>
                    Email: {{ $data['sales'][0]->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                   <address>
                    <strong>{{ $data['business'][0]->name }}</strong><br>
                   {{ $data['business'][0]->address }}<br>
                   {{ $data['business'][0]->city }} {{ $data['business'][0]->state }} {{ $data['business'][0]->country }} {{ $data['business'][0]->zip }}<br>
                    Phone: {{ $data['business'][0]->phone }}<br>
                    Email: {{ $data['business'][0]->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
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


              <div class="row">
                <pre class="col-6" style='width:100%;display:inline-block;margin-top: 50px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size: 15px;'>
                  <p class="lead">Notes:</p><p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{ $data['sales'][0]->notes }}
                  </p>
                </pre>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                   @if ($data['sales'][0]->file != '')
                  <a target="_blank"  href="{{ asset('storage/' . $data['sales'][0]->file) }}" class="btn btn-warning float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Download Attachment
                  </a>
                  @endif
                  
                  <a  href="../paymentDownload/{{$data['sales'][0]->uid}}" class="btn btn-primary float-right" style="margin-right: 5px;">
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
