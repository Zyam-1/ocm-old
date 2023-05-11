@include('layouts.header')

<link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">
                <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
    <form id="form">
    {{ csrf_field() }}
    
    <div class="row">
        <div class="col-md-4">
        <label for="lang">Organisms group</label>
        <select class="form-control" class="form-control">
          @foreach($organismlist as $or)
            <option>{{$or->Text}}</option>
          @endforeach
        </select>
            <button type="button" class="my-2 btn btn-primary w-50">Add</button>
            <br>
        <label for="code">Code</label>
        <input id = "code" type="text" class = "form-control" name = "code" >
        <label for="code">New Organism</label>
        <input id = "code" type="text" class = "form-control" name = "newOrg" >
        <label for="code">Short Name</label>
        <input id = "code" type="text" class = "form-control" class = "ShortName" >
        <label for="code">Report Name</label>
        <input id = "code" type="text" class = "form-control" name = "ReqName" >
        </div>
        <div class="col-md-8">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Organism name</th>
      <th scope="col">Short Name</th>
      <th scope="col">Report Name</th>
    </tr>
  </thead>
  
</table>

        </div>
     
    </div>
    


    </form>
                                          


                            </div>
                        </div> 


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@extends('layouts.footer')
