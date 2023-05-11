<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</title>
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}"/>

  <!-- Google Font: Source Sans Pro -->

 

  
  <!-- Font Awesome Icons -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css?1112') }}" rel="stylesheet" >

  
  <!-- IonIcons -->
  <link href="{{ asset('plugins/ionicons.min.css') }}" rel="stylesheet" >
  
  <!-- Theme style -->
  <link href="{{ asset('dist/css/adminlte.css?1114') }}" rel="stylesheet" >
  <link href="{{ asset('css/icons.css?1112') }}" rel="stylesheet">
  <link href="{{ asset('plugins/notifications/css/lobibox.min.css?1112') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css?1112') }}">
  
  <!-- DataTables -->
  <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <!-- fancyfileuploader -->
  <link rel="stylesheet" href="{{ asset('plugins/fancy-file-uploader/fancy_fileupload.css?1112') }}" />

  <!-- daterange picker -->
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css?1112') }}" rel="stylesheet" >

  <!-- Tempusdominus Bootstrap 4 -->
  <link href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?1112') }}" rel="stylesheet" >

  <!-- Bootstrap4 Duallistbox -->
  <link href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?1112') }}" rel="stylesheet" >
  
  <!-- BS Stepper -->
  <link href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css?1112') }}" rel="stylesheet" >

  <link href="{{ asset('css/custom.css?1128') }}" rel="stylesheet"/>

<?php 
    // $font = Auth::user()->font;
    // $font_weight = Auth::user()->font_weight;

    $font = Auth::user()->font;
    $font_weight = Auth::user()->font_weight;
    $font_link= Auth::user()->font_link;
?>
<style type="text/css">
      
      :root {
       --main-color:#{{Auth::user()->colorscheme}}; 
       --main-font:{{$font}};
       --main-font_weight:{{$font_weight}}; 
       --main-font_link:{{$font_link}}; 
      }

      body {

        src:url(/ocm_old/public/Nunito/static/Nunito-Medium.ttf);
        font-family: var(--main-font);
        font-weight: var(--main-font_weight) !important;
  
      }


/* cyrillic-ext */
@font-face {
  font-family: <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family:  <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family:<?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family:  <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}



.dropdown-menu {
    overflow-y: scroll;
    max-height: 350px;
    background-color: #fff;
    margin: 0 0 10px 0;
}
.dropdown-menu::-webkit-scrollbar {
    width:5px;
}
.dropdown-menu::-webkit-scrollbar-track {
    -webkit-box-shadow:inset 0 0 6px rgba(0,0,0,1); 
    border-radius:5px;
}
.dropdown-menu::-webkit-scrollbar-thumb {
    border-radius:5px;
    -webkit-box-shadow: inset 0 0 6px black; 
}
</style>
<script type="text/javascript">
  var main_color = '#'+'{{Auth::user()->colorscheme}}';
</script>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="sidebar-mini layout-fixed text-sm"  >

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link sideMenu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link"><b id="pageTitle">Home</b></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item" title="Full Screen">
        <a class="nav-link rightsideBtn" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item" title="Logout">
        <a class="nav-link rightsideBtn" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          <a href="{{ route('MyProfile') }}"><img src="{{ asset('images/' . Auth::user()->file) }}"  class="img-circle" alt="User Image" onerror="this.onerror=null;this.src='{{ asset('images/'.'dp.webp') }}';"></a>
        </div>
        <div class="info">
          <a href="{{ route('MyProfile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar p-1 px-2">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <h4 style ="padding-bottom:0;" class="ml-2">LIMS</h4>
         <li class="nav-item">
            <a href="{{ route('Dashboardnet') }}" class="nav-link {{ ( request()->is('Dashboardnet') ) ? 'active' : '' }}" >
           <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
         Dashboard
          </p>
        </a>
      </li>

         <li class="nav-item">
            <a href="{{ route('Scan') }}" class="nav-link {{ (request()->is('Scan')) ? 'active' : '' }}">
               <i class="nav-icon fas fa-barcode"></i>
              <p>
                Scan Samples
              </p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="{{ route('Results') }}/Demographics" class="nav-link {{ (request()->is('Results')) ? 'active' : '' }}">
               <i class="nav-icon fas fa-notes-medical"></i>
              <p>
               Demographics
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ( request()->is('Transfusionlab') ) ? 'active' : '' }}" href="{{ route('Transfusionlab') }}">
              <i class="nav-icon fa fa-info-circle nav-icon">

              </i>
              <p>BT Sample Info</p>
            </a> 
          </li>
          

 <li class="nav-item"><a class="nav-link {{ ( request()->is('Microbiology') ) ? 'active' : '' }}" href="{{ route('Microbiology') }}"> 
   <i class="nav-icon fa fa-info-circle nav-icon"></i>
   <p>Micro.Sample Info</p>
  </a>
</li>
 





<li class="nav-item {{ ( 

request()->is('definepanel') ||
request()->is('Clinicians') ||
request()->is('LocGPEntry*') ||
request()->is('LocWardList*') ||
request()->is('CoagulationTmp') ||
request()->is('BiochemTmp') ||
request()->is('AutoGenerate*') ||
request()->is('AutoCoagulation*') ||
request()->is('PhoneAlert*')  ||
request()->is('Lists*') ||
request()->is('MIdentifyWet*') ||
request()->is('MIdentifyQantity*') ||
request()->is('CmtMicrobiology*') ||
request()->is('CmtBiochemistry*') ||
request()->is('CmtHaematology*') ||
request()->is('CmtCoagulation*') ||
request()->is('CmtDemographics*') ||
request()->is('CmtSemen*') ||
request()->is('CmtClinical*') ||
request()->is('LocHostpital') ||
request()->is('MUrineCrystal*') ||
request()->is('MUrineCasts*') ||
request()->is('MUrineMiscell*') ||
request()->is('BloodGas') ||
request()->is('PHistory') ||
request()->is('ListofError') ||
request()->is('Printers') ||
request()->is('Patientsearch')


) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('definepanel') ||
request()->is('Clinicians') ||
request()->is('LocGPEntry*') ||
request()->is('LocWardList*') ||
request()->is('CoagulationTmp') ||
request()->is('BiochemTmp') ||
request()->is('AutoGenerate*') ||
request()->is('AutoCoagulation*') ||
request()->is('PhoneAlert*') ||
request()->is('Lists*') ||
request()->is('MIdentifyWet*') ||
request()->is('MIdentifyQantity*') ||
request()->is('CmtMicrobiology*') ||
request()->is('CmtBiochemistry*') ||
request()->is('CmtHaematology*') ||
request()->is('CmtCoagulation*') ||
request()->is('CmtDemographics*') ||
request()->is('CmtSemen*') ||
request()->is('CmtClinical*') ||
request()->is('LocHostpital') ||
request()->is('MUrineCrystal*') ||
request()->is('MUrineCasts*') ||
request()->is('MUrineMiscell*') ||
request()->is('BloodGas') ||
request()->is('PHistory') ||
request()->is('ListofError') ||
request()->is('Printers') ||
request()->is('Patientsearch') 


) ? 'active' : '' }}">
 <i class="nav-icon fas fa-vial text-danger"></i>
 <p class="text-danger">
        Lists 
   <i class="fas fa-angle-left  right"></i>
 </p>
</a>
<ul class="nav nav-treeview">


   <li class="nav-item"><a class="nav-link {{ ( request()->is('Clinicians') ) ? 'active' : '' }}" href="{{ route('Clinicians') }}">  <i class="far fa-circle nav-icon"></i><p>Clinicians</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('LocGPEntry*') ) ? 'active' : '' }}" href="{{ route('LocGPEntry/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>GPs</p></a></li>

   <li class="nav-item"><a class="nav-link {{ ( request()->is('LocWardList*') ) ? 'active' : '' }}" href="{{ route('LocWardList') }}">  <i class="far fa-circle nav-icon"></i><p>Wards</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('CoagulationTmp') ) ? 'active' : '' }}" href="{{ route('CoagulationTmp') }}">  <i class="far fa-circle nav-icon"></i><p>Coagulation Comments</p></a></li>

 <li class="nav-item"><a class="nav-link {{ ( request()->is('BiochemTmp') ) ? 'active' : '' }}" href="{{ route('BiochemTmp') }}">  <i class="far fa-circle nav-icon"></i><p>Biochemistry Comments</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('AutoGenerate*') ) ? 'active' : '' }}" href="{{ route('AutoGenerate/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Auto Biochemistry</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('AutoCoagulation*') ) ? 'active' : '' }}" href="{{ route('AutoCoagulation/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Auto Coagulation</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('PhoneAlert*') ) ? 'active' : '' }}" href="{{ route('PhoneAlert/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Phone Alert</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('definepanel') ) ? 'active' : '' }}" href="{{ route('definepanel') }}">  <i class="far fa-circle nav-icon"></i><p>Panels</p></a></li>

   <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/GS*') ) ? 'active' : '' }}" href="/ocm_old/Lists/GS">  <i class="far fa-circle nav-icon"></i><p>Identification Stains</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/WP*') ) ? 'active' : '' }}" href="/ocm_old/Lists/WP">  <i class="far fa-circle nav-icon"></i><p>Identification Wet</p></a></li>

 <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/GQ*') ) ? 'active' : '' }}" href="/ocm_old/Lists/GQ">  <i class="far fa-circle nav-icon"></i><p>Identification Qantity</p></a></li>
    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/BA*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/BA">  <i class="far fa-circle nav-icon"></i><p>Comment Microbiology</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/BI*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/BI">  <i class="far fa-circle nav-icon"></i><p>Comment Biochemistry</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/HA*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/HA">  <i class="far fa-circle nav-icon"></i><p>Comment Haematology</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/CO*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/CO">  <i class="far fa-circle nav-icon"></i><p>Comment Coagulation</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/DE*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/DE">  <i class="far fa-circle nav-icon"></i><p>Comment Demographics </p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/SE*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/SE">  <i class="far fa-circle nav-icon"></i><p>Comment Semen</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('CmtMicrobiology/CD*') ) ? 'active' : '' }}" href="/ocm_old/CmtMicrobiology/CD">  <i class="far fa-circle nav-icon"></i><p>Comment Clinical</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('LocHostpital*') ) ? 'active' : '' }}" href="/ocm_old/LocHostpital">  <i class="far fa-circle nav-icon"></i><p>Location Hostpital</p></a></li>

      <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/CR*') ) ? 'active' : '' }}" href="/ocm_old/Lists/CR">  <i class="far fa-circle nav-icon"></i><p>Urine Crystals</p></a></li>

   <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/CA*') ) ? 'active' : '' }}" href="/ocm_old/Lists/CA">  <i class="far fa-circle nav-icon"></i><p>Urine Casts</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('Lists/MI*') ) ? 'active' : '' }}" href="/ocm_old/Lists/MI">  <i class="far fa-circle nav-icon"></i><p>Urine Miscellaneous</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('BloodGas') ) ? 'active' : '' }}" href="{{ route('BloodGas') }}">  <i class="far fa-circle nav-icon"></i><p>Blood Gas</p></a></li>

     <li class="nav-item"><a class="nav-link {{ ( request()->is('PHistory') ) ? 'active' : '' }}" href="{{ route('PHistory') }}"><i class="far fa-circle nav-icon"></i><p>Patient History</p></a> </li>


  {{-- <li class="nav-item"><a class="nav-link {{ ( request()->is('ListofError') ) ? 'active' : '' }}" href="{{ route('ListofError') }}">  <i class="far fa-circle nav-icon"></i><p>List of Error</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('ListOfErrorsMiscllsamp') ) ? 'active' : '' }}" href="{{ route('ListOfErrorsMiscllsamp') }}">  <i class="far fa-circle nav-icon"></i><p>Miscllaneous Sample Type</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('LoerrMiscllSpecimenSources') ) ? 'active' : '' }}" href="{{ route('LoerrMiscllSpecimenSources') }}">  <i class="far fa-circle nav-icon"></i><p>Miscllaneous Spicemen Sources</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('MiscllResisMark') ) ? 'active' : '' }}" href="{{ route('MiscllResisMark') }}">  <i class="far fa-circle nav-icon"></i><p>Miscllaneous Resistance Markers</p></a></li> --}}
  

   <li class="nav-item"><a class="nav-link {{ ( request()->is('Printers') ) ? 'active' : '' }}" href="{{ route('Printers') }}">  <i class="far fa-circle nav-icon"></i><p>Printers</p></a></li>

    <li class="nav-item"><a class="nav-link {{ ( request()->is('Patientsearch') ) ? 'active' : '' }}" href="{{ route('Patientsearch') }}">  <i class="far fa-circle nav-icon"></i><p>Patient Search </p></a></li>

 

</ul>
</li>











          <li class="nav-item {{ ( 

request()->is('Caution') ||
request()->is('SuggestUnits') ||
request()->is('AHG')||
request()->is('Forward')||
request()->is('Stock')|| 
request()->is('Unlock')||
request()->is('Sorder')||
request()->is('IssueBatch')||
request()->is('Antibody')||
request()->is('Crossmatches')||
request()->is('Antidprophylaxis')||
request()->is('Crossmatchreport')||
request()->is('Patientdetails') 


        ) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

 request()->is('Caution') ||
request()->is('SuggestUnits') ||
request()->is('AHG')||
request()->is('Forward')||
request()->is('Stock')|| 
request()->is('Unlock')||
request()->is('Sorder')||
request()->is('IssueBatch')||
request()->is('Antibody')||
request()->is('Crossmatches')||
request()->is('Antidprophylaxis')||
request()->is('Crossmatchreport')||
request()->is('Patientdetails') 


) ? 'active' : '' }}">
  <i class="nav-icon fas fa-vial text-danger"></i>
  <p class="text-danger">
     Blood Transfusion 
    <i class="fas fa-angle-left  right"></i>
  </p>
</a>
<ul class="nav nav-treeview">

    <li class="nav-item"><a class="nav-link {{ ( request()->is('Caution') ) ? 'active' : '' }}" href="{{ route('Caution') }}">
    <i class="far fa-circle nav-icon"></i><p>Caution Test System</p>
    </a></li>



  <!-- Net Acquire -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('SuggestUnits') ) ? 'active' : '' }}" href="{{ route('SuggestUnits') }}"><i class="far fa-circle nav-icon"></i><p>Suggest Units</p></a></li>
  <!-- Tranfusion Laboratory  -->
  <!-- Units Pending -->
 



  <li class="nav-item"><a class="nav-link {{ ( request()->is('AHG') ) ? 'active' : '' }}" href="{{ route('AHG') }}"><i class="far fa-circle nav-icon"></i><p>AHG Quality Assurance</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Forward') ) ? 'active' : '' }}" href="{{ route('Forward') }}"><i class="far fa-circle nav-icon"></i><p>Forward Grouping Cards</p></a> </li>
 
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Stock') ) ? 'active' : '' }}" href="{{ route('Stock') }}"><i class="far fa-circle nav-icon"></i><p>Stock Movement</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Unlock') ) ? 'active' : '' }}" href="{{ route('Unlock') }}"><i class="far fa-circle nav-icon"></i><p>Unlock Reasons</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Sorder') ) ? 'active' : '' }}" href="{{ route('Sorder') }}"><i class="far fa-circle nav-icon"></i><p>Stock Ordering</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('IssueBatch') ) ? 'active' : '' }}" href="{{ route('IssueBatch') }}"><i class="far fa-circle nav-icon"></i><p>Issue A Batch Product</p></a> </li>

  <!-- Ahmed -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Antibody') ) ? 'active' : '' }}" href="{{ route('Antibody') }}"><i class="far fa-circle nav-icon"></i><p>Positive Antibody List</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Crossmatches') ) ? 'active' : '' }}" href="{{ route('Crossmatches') }}"><i class="far fa-circle nav-icon"></i><p>Search for Cross Matchese</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Antidprophylaxis') ) ? 'active' : '' }}" href="{{ route('Antidprophylaxis') }}"><i class="far fa-circle nav-icon"></i><p>Anti-D Prophylaxis</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Crossmatchreport') ) ? 'active' : '' }}" href="{{ route('Crossmatchreport') }}"><i class="far fa-circle nav-icon"></i><p>Daily Cross-Match Report</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Patientdetails') ) ? 'active' : '' }}" href="{{ route('Patientdetails') }}"><i class="far fa-circle nav-icon"></i><p>Patient Details</p></a> </li>


</ul>
</li>





<li class="nav-item {{ ( 

request()->is('Netacquire2') ||
request()->is('SemenAnalysis') ||
request()->is('TestOrder') ||



request()->is('BioDefPanels') ||
request()->is('BioDefCodes') ||



request()->is('PanelBarCodes') ||


request()->is('MicroMicrobiology') ||
request()->is('ExtTableList') ||
request()->is('ExtPanels') ||

request()->is('NetaquireSounds') ||

request()->is('OrgName') 



) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('Netacquire2') ||
request()->is('SemenAnalysis') ||
request()->is('TestOrder') ||



request()->is('BioDefPanels') ||
request()->is('BioDefCodes') ||


request()->is('PanelBarCodes') ||



request()->is('MicroMicrobiology') ||
request()->is('ExtTableList') ||
request()->is('ExtPanels') ||

request()->is('NetaquireSounds') ||

request()->is('OrgName') 


) ? 'active' : '' }}">
 <i class="nav-icon fas fa-vial text-danger"></i>
 <p class="text-danger">
        Blood Sciences 
   <i class="fas fa-angle-left  right"></i>
 </p>
</a>
<ul class="nav nav-treeview">




 <li class="nav-item"><a class="nav-link {{ ( request()->is('Netacquire2') ) ? 'active' : '' }}" href="{{ route('Netacquire2') }}"> <i class="far fa-circle nav-icon"></i><p>Net Acquire</p></a></li>



 <li class="nav-item"><a class="nav-link {{ ( request()->is('SemenAnalysis') ) ? 'active' : '' }}" href="{{ route('SemenAnalysis') }}">  <i class="far fa-circle nav-icon"></i><p>Semen Analysis</p> </a></li>




  <li class="nav-item"><a class="nav-link {{ ( request()->is('TestOrder') ) ? 'active' : '' }}" href="{{ route('TestOrder') }}">  <i class="far fa-circle nav-icon"></i><p>Test Order </p></a></li>


 <!--   <li class="nav-item"><a class="nav-link {{ ( request()->is('comments') ) ? 'active' : '' }}" href="{{ route('comments') }}">  <i class="far fa-circle nav-icon"></i><p>Comments </p></a></li>
 -->

    <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('definepanel') ) ? 'active' : '' }}" href="{{ route('definepanel') }}">  <i class="far fa-circle nav-icon"></i><p>Define Panel </p></a></li> -->



   <li class="nav-item"><a class="nav-link {{ ( request()->is('BioDefPanels') ) ? 'active' : '' }}" href="{{ route('BioDefPanels') }}">  <i class="far fa-circle nav-icon"></i><p>Bio Define Panels</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('BioDefCodes') ) ? 'active' : '' }}" href="{{ route('BioDefCodes') }}">  <i class="far fa-circle nav-icon"></i><p>Bio Define Codes</p></a></li>

   <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('Clinicians') ) ? 'active' : '' }}" href="{{ route('Clinicians') }}">  <i class="far fa-circle nav-icon"></i><p>Clinician List</p></a></li> -->

    <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('LocGPEntry/{id?}*') ) ? 'active' : '' }}" href="{{ route('LocGPEntry/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>GP Entry</p></a></li> -->


<!-- 
   <li class="nav-item"><a class="nav-link {{ ( request()->is('LocWardList*') ) ? 'active' : '' }}" href="{{ route('LocWardList') }}">  <i class="far fa-circle nav-icon"></i><p>Location Ward List</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('CoagulationTmp') ) ? 'active' : '' }}" href="{{ route('CoagulationTmp') }}">  <i class="far fa-circle nav-icon"></i><p>Coagulation Template</p></a></li>

 <li class="nav-item"><a class="nav-link {{ ( request()->is('BiochemTmp') ) ? 'active' : '' }}" href="{{ route('BiochemTmp') }}">  <i class="far fa-circle nav-icon"></i><p>Biochemistry Template</p></a></li> -->

  <li class="nav-item"><a class="nav-link {{ ( request()->is('PanelBarCodes') ) ? 'active' : '' }}" href="{{ route('PanelBarCodes') }}">  <i class="far fa-circle nav-icon"></i><p>Panel BarCodes</p></a></li>




<!--   <li class="nav-item"><a class="nav-link {{ ( request()->is('XLD') ) ? 'active' : '' }}" href="{{ route('XLD') }}">  <i class="far fa-circle nav-icon"></i><p>XLD/DCA</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('Smac') ) ? 'active' : '' }}" href="{{ route('Smac') }}">  <i class="far fa-circle nav-icon"></i><p>Smac</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('Preston') ) ? 'active' : '' }}" href="{{ route('Preston') }}">  <i class="far fa-circle nav-icon"></i><p>Preston/CCDA</p></a></li> -->

  <li class="nav-item"><a class="nav-link {{ ( request()->is('MicroMicrobiology') ) ? 'active' : '' }}" href="{{ route('MicroMicrobiology') }}">  <i class="far fa-circle nav-icon"></i><p>Microbiology</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('ExtTableList') ) ? 'active' : '' }}" href="{{ route('ExtTableList') }}">  <i class="far fa-circle nav-icon"></i><p>Table List</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('ExtPanels') ) ? 'active' : '' }}" href="{{ route('ExtPanels') }}">  <i class="far fa-circle nav-icon"></i><p>External Panels</p></a></li>

  <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('AutoGenerate*') ) ? 'active' : '' }}" href="{{ route('AutoGenerate/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Auto Generate</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('AutoCoagulation*') ) ? 'active' : '' }}" href="{{ route('AutoCoagulation/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Auto Coagulation</p></a></li> -->

  <li class="nav-item"><a class="nav-link {{ ( request()->is('NetaquireSounds') ) ? 'active' : '' }}" href="{{ route('NetaquireSounds') }}">  <i class="far fa-circle nav-icon"></i><p>Netaquire Sounds</p></a></li>

  <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('PhoneAlert') ) ? 'active' : '' }}" href="{{ route('PhoneAlert/{id?}') }}">  <i class="far fa-circle nav-icon"></i><p>Phone Alert</p></a></li> -->

  <li class="nav-item"><a class="nav-link {{ ( request()->is('OrgName') ) ? 'active' : '' }}" href="{{ route('OrgName') }}">  <i class="far fa-circle nav-icon"></i><p>Organism Name</p></a></li>





</ul>
</li>


<!--New List-->
          <li class="nav-item {{ ( 

request()->is('activereq') ||
request()->is('addnewanalyte') ||
request()->is('normalranges')||
request()->is('plausibleranges')||
request()->is('assignpanel')||
request()->is('autovalid')||
request()->is('deltachecking')|| 
request()->is('biocode')||
request()->is('fasting')||
request()->is('inuse')||
request()->is('NewResults')||
request()->is('PrintSequence')||
request()->is('ReRundays')||
request()->is('SetHIL')||
request()->is('Splits') ||
request()->is('BioCodeMapping') ||
request()->is('UnitsPresicion') 


        ) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('activereq') ||
request()->is('addnewanalyte') ||
request()->is('normalranges')||
request()->is('plausibleranges')||
request()->is('assignpanel')||
request()->is('autovalid')||
request()->is('deltachecking')|| 
request()->is('biocode')||
request()->is('fasting')||
request()->is('inuse')||
request()->is('NewResults')||
request()->is('PrintSequence')||
request()->is('ReRundays')||
request()->is('SetHIL')||
request()->is('Splits') ||
request()->is('BioCodeMapping') ||
request()->is('UnitsPresicion') 


) ? 'active' : '' }}">
  <i class="nav-icon fas fa-vial text-danger"></i>
  <p class="text-danger">
    BioChemistry Lists
    <i class="fas fa-angle-left  right"></i>
  </p>
</a>
<ul class="nav nav-treeview">

    <li class="nav-item"><a class="nav-link {{ ( request()->is('activereq') ) ? 'active' : '' }}" href="{{ route('activereq') }}">
    <i class="far fa-circle nav-icon"></i><p>Known To Analyser</p>
    </a></li>



  <!-- Net Acquire -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('addnewanalyte') ) ? 'active' : '' }}" href="{{ route('addnewanalyte') }}"><i class="far fa-circle nav-icon"></i><p>New Analyte</p></a></li>
  <!-- Tranfusion Laboratory  -->
  <!-- Units Pending -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('normalranges') ) ? 'active' : '' }}" href="{{ route('normalranges') }}"><i class="far fa-circle nav-icon"></i><p>Normal and Flag Ranges</p></a> </li>



  <li class="nav-item"><a class="nav-link {{ ( request()->is('plausibleranges') ) ? 'active' : '' }}" href="{{ route('plausibleranges') }}"><i class="far fa-circle nav-icon"></i><p>Plausible Range</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('assignpanel') ) ? 'active' : '' }}" href="{{ route('assignpanel') }}"><i class="far fa-circle nav-icon"></i><p>Assign Panels</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('autovalid') ) ? 'active' : '' }}" href="{{ route('autovalid') }}"><i class="far fa-circle nav-icon"></i><p>Auto Validation</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('deltachecking') ) ? 'active' : '' }}" href="{{ route('deltachecking') }}"><i class="far fa-circle nav-icon"></i><p>Data Check</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('biocode') ) ? 'active' : '' }}" href="{{ route('biocode') }}"><i class="far fa-circle nav-icon"></i><p>Edit Existing Analyte</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('fasting') ) ? 'active' : '' }}" href="{{ route('fasting') }}"><i class="far fa-circle nav-icon"></i><p>Fasting Ranges</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('inuse') ) ? 'active' : '' }}" href="{{ route('inuse') }}"><i class="far fa-circle nav-icon"></i><p>In Use</p></a> </li>

  <!-- Ahmed -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('NewResults') ) ? 'active' : '' }}" href="{{ route('NewResults') }}"><i class="far fa-circle nav-icon"></i><p>New Result</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('PrintSequence') ) ? 'active' : '' }}" href="{{ route('PrintSequence') }}"><i class="far fa-circle nav-icon"></i><p>Print Sequence</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('ReRundays') ) ? 'active' : '' }}" href="{{ route('ReRundays') }}"><i class="far fa-circle nav-icon"></i><p>Re Run Times</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('SetHIL') ) ? 'active' : '' }}" href="{{ route('SetHIL') }}"><i class="far fa-circle nav-icon"></i><p>Set H/I/L</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Splits') ) ? 'active' : '' }}" href="{{ route('Splits') }}"><i class="far fa-circle nav-icon"></i><p>Splits</p></a> </li>
   <li class="nav-item"><a class="nav-link {{ ( request()->is('BioCodeMapping') ) ? 'active' : '' }}" href="{{ route('BioCodeMapping') }}"><i class="far fa-circle nav-icon"></i><p>Test Code Mapping</p></a> </li>
    <li class="nav-item"><a class="nav-link {{ ( request()->is('UnitsPresicion') ) ? 'active' : '' }}" href="{{ route('UnitsPresicion') }}"><i class="far fa-circle nav-icon"></i><p>Units and Precision</p></a> </li>


</ul>
</li>
<!---End-->

<!--New List-->
          <li class="nav-item {{ ( 

request()->is('Autovalidation') ||
request()->is('barcodes') ||
request()->is('normalranges')||
request()->is('HaemcodeMapping')


        ) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('Autovalidation') ||
request()->is('barcodes') ||
request()->is('normalranges')||
request()->is('HaemcodeMapping')


) ? 'active' : '' }}">
  <i class="nav-icon fas fa-vial text-danger"></i>
  <p class="text-danger">
    Haematology Lists
    <i class="fas fa-angle-left  right"></i>
  </p>
</a>
<ul class="nav nav-treeview">

    <li class="nav-item"><a class="nav-link {{ ( request()->is('Autovalidation') ) ? 'active' : '' }}" href="{{ route('Autovalidation') }}">
    <i class="far fa-circle nav-icon"></i><p>Auto Validation</p>
    </a></li>



  <!-- Net Acquire -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('barcodes') ) ? 'active' : '' }}" href="{{ route('barcodes') }}"><i class="far fa-circle nav-icon"></i><p>BarCodes</p></a></li>
  <!-- Tranfusion Laboratory  -->
  <!-- Units Pending -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('normalranges') ) ? 'active' : '' }}" href="{{ route('normalranges') }}"><i class="far fa-circle nav-icon"></i><p>Normal Ranges</p></a> </li>



  <li class="nav-item"><a class="nav-link {{ ( request()->is('HaemcodeMapping') ) ? 'active' : '' }}" href="{{ route('HaemcodeMapping') }}"><i class="far fa-circle nav-icon"></i><p>Test Code Mapping</p></a> </li>



</ul>
</li>
<!---End-->



<!--New List-->
          <li class="nav-item {{ ( 

request()->is('cougulationtest') ||
request()->is('cougulationpanels') ||
request()->is('cougulationdefination')||
request()->is('coagtestcode')


        ) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('cougulationtest') ||
request()->is('cougulationpanels') ||
request()->is('cougulationdefination')||
request()->is('coagtestcode')

) ? 'active' : '' }}">
  <i class="nav-icon fas fa-vial text-danger"></i>
  <p class="text-danger">
    Coagulation Lists
    <i class="fas fa-angle-left  right"></i>
  </p>
</a>
<ul class="nav nav-treeview">

    <li class="nav-item"><a class="nav-link {{ ( request()->is('cougulationtest') ) ? 'active' : '' }}" href="{{ route('cougulationtest') }}">
    <i class="far fa-circle nav-icon"></i><p>Add Text</p>
    </a></li>



  <!-- Net Acquire -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('cougulationpanels') ) ? 'active' : '' }}" href="{{ route('cougulationpanels') }}"><i class="far fa-circle nav-icon"></i><p>Coagulation Panels</p></a></li>
  <!-- Tranfusion Laboratory  -->
  <!-- Units Pending -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('cougulationdefination') ) ? 'active' : '' }}" href="{{ route('cougulationdefination') }}"><i class="far fa-circle nav-icon"></i><p>Normal Ranges'</p></a> </li>



  <li class="nav-item"><a class="nav-link {{ ( request()->is('coagtestcode') ) ? 'active' : '' }}" href="{{ route('coagtestcode') }}"><i class="far fa-circle nav-icon"></i><p>Test Code Mapping</p></a> </li>



</ul>
</li>
<!--New List-->
          <li class="nav-item {{ ( 

request()->is('Extworklist') ||
request()->is('viewrunning') ||
request()->is('Statistics')||
request()->is('microbiology')||
request()->is('glucosetolerance')||
request()->is('printresults')||
request()->is('validqc')||
request()->is('haemcontrols')||
request()->is('highmeanlow')||
request()->is('FaxLogs')||
request()->is('index6')||
request()->is('index7')||
request()->is('index8')||
request()->is('abnormals')||
request()->is('GtTest')||
request()->is('GlucoseTol')||
request()->is('SemenAnalysis')||
request()->is('TestOrder')||
request()->is('ExtPanels')||
request()->is('NetaquireSounds')||
request()->is('dailyreport')||
request()->is('creatinineclearance')||
request()->is('outstanding')||
request()->is('collectedreports')||
request()->is('urineprotien')||
request()->is('24hoururine')||
request()->is('testcount')||
request()->is('HaemTotals')||
request()->is('BioTotals')||
request()->is('CoagTotals')||
request()->is('ExtTotals')||
request()->is('phonelog')||
request()->is('selectparameter')


        ) ? 'menu-open' : '' }} admin">

<a href="#" class="nav-link {{ ( 

request()->is('Extworklist') ||
request()->is('viewrunning') ||
request()->is('Statistics')||
request()->is('microbiology')||
request()->is('printresults')||
request()->is('validqc')||
request()->is('haemcontrols')||
request()->is('highmeanlow')||
request()->is('FaxLogs')||
request()->is('index6')||
request()->is('index7')||
request()->is('index8')||
request()->is('GtTest')||
request()->is('GlucoseTol')||
request()->is('SemenAnalysis')||
request()->is('TestOrder')||
request()->is('ExtPanels')||
request()->is('NetaquireSounds')||
request()->is('dailyreport')||
request()->is('creatinineclearance')||
request()->is('outstanding')||
request()->is('collectedreports')||
request()->is('urineprotien')||
request()->is('24hoururine')||
request()->is('testcount')||
request()->is('HaemTotals')||
request()->is('BioTotals')||
request()->is('CoagTotals')||
request()->is('ExtTotals')||
request()->is('phonelog')||
request()->is('selectparameter')

) ? 'active' : '' }}">
  <i class="nav-icon fas fa-vial text-danger"></i>
  <p class="text-danger">
    New List
    <i class="fas fa-angle-left  right"></i>
  </p>
</a>
<ul class="nav nav-treeview">

    <li class="nav-item"><a class="nav-link {{ ( request()->is('Extworklist') ) ? 'active' : '' }}" href="{{ route('Extworklist') }}">
    <i class="far fa-circle nav-icon"></i><p>External Worklist</p>
    </a></li>



  <!-- Net Acquire -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('viewrunning') ) ? 'active' : '' }}" href="{{ route('viewrunning') }}"><i class="far fa-circle nav-icon"></i><p>View Runnning Means</p></a></li>
  <!-- Tranfusion Laboratory  -->
  <!-- Units Pending -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('Statistics') ) ? 'active' : '' }}" href="{{ route('Statistics') }}"><i class="far fa-circle nav-icon"></i><p>Statistics</p></a> </li>


  <li class="nav-item"><a class="nav-link {{ ( request()->is('microbiology') ) ? 'active' : '' }}" href="{{ route('microbiology') }}"><i class="far fa-circle nav-icon"></i><p>Microbiology</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('glucosetolerance') ) ? 'active' : '' }}" href="{{ route('glucosetolerance') }}"><i class="far fa-circle nav-icon"></i><p>Glucose Tolerance</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('printresults') ) ? 'active' : '' }}" href="{{ route('printresults') }}"><i class="far fa-circle nav-icon"></i><p>Print Results</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('validqc') ) ? 'active' : '' }}" href="{{ route('validqc') }}"><i class="far fa-circle nav-icon"></i><p>Valid QC</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('haemcontrols') ) ? 'active' : '' }}" href="{{ route('haemcontrols') }}"><i class="far fa-circle nav-icon"></i><p>Haem Controls</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('highmeanlow') ) ? 'active' : '' }}" href="{{ route('highmeanlow') }}"><i class="far fa-circle nav-icon"></i><p>High Mean Low</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('FaxLogs') ) ? 'active' : '' }}" href="{{ route('FaxLogs') }}"><i class="far fa-circle nav-icon"></i><p>Fax Logs</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('index6') ) ? 'active' : '' }}" href="{{ route('index6') }}"><i class="far fa-circle nav-icon"></i><p>Bio/Endo Totals</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('index7') ) ? 'active' : '' }}" href="{{ route('index7') }}"><i class="far fa-circle nav-icon"></i><p>Totals Dept</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('index8') ) ? 'active' : '' }}" href="{{ route('index8') }}"><i class="far fa-circle nav-icon"></i><p>External/Internal</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('abnormals') ) ? 'active' : '' }}" href="{{ route('abnormals') }}"><i class="far fa-circle nav-icon"></i><p>Biochemistry Abnormals</p></a> </li>
  <!-- <li class="nav-item"><a class="nav-link {{ ( request()->is('GtTest') ) ? 'active' : '' }}" href="{{ route('GtTest') }}"><i class="far fa-circle nav-icon"></i><p>Glucose Tolerance Tests</p></a> </li> -->
  <li class="nav-item"><a class="nav-link {{ ( request()->is('GlucoseTol') ) ? 'active' : '' }}" href="{{ route('GlucoseTol') }}"><i class="far fa-circle nav-icon"></i><p>Glucose Tolerance Test</p></a> </li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('SemenAnalysis') ) ? 'active' : '' }}" href="{{ route('SemenAnalysis') }}">  <i class="far fa-circle nav-icon"></i><p>Semen Analysis</p> </a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('ExtPanels') ) ? 'active' : '' }}" href="{{ route('ExtPanels') }}">  <i class="far fa-circle nav-icon"></i><p>External Panels</p></a></li>

<li class="nav-item"><a class="nav-link {{ ( request()->is('NetaquireSounds') ) ? 'active' : '' }}" href="{{ route('NetaquireSounds') }}">  <i class="far fa-circle nav-icon"></i><p>Netaquire Sounds</p></a></li>


  <li class="nav-item"><a class="nav-link {{ ( request()->is('TestOrder') ) ? 'active' : '' }}" href="{{ route('TestOrder') }}">  <i class="far fa-circle nav-icon"></i><p>Test Order </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('dailyreport') ) ? 'active' : '' }}" href="{{ route('dailyreport') }}">  <i class="far fa-circle nav-icon"></i><p>Daily Report </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('creatinineclearance') ) ? 'active' : '' }}" href="{{ route('creatinineclearance') }}">  <i class="far fa-circle nav-icon"></i><p>Creatinine Clearance </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('outstanding') ) ? 'active' : '' }}" href="{{ route('outstanding') }}">  <i class="far fa-circle nav-icon"></i><p>Outstanding </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('collectedreports') ) ? 'active' : '' }}" href="{{ route('collectedreports') }}">  <i class="far fa-circle nav-icon"></i><p>Collated Reports </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('urineprotien') ) ? 'active' : '' }}" href="{{ route('urineprotien') }}">  <i class="far fa-circle nav-icon"></i><p>Urine Protein </p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('24hoururine') ) ? 'active' : '' }}" href="{{ route('24hoururine') }}">  <i class="far fa-circle nav-icon"></i><p>24 Hour Urine</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('testcount') ) ? 'active' : '' }}" href="{{ route('testcount') }}">  <i class="far fa-circle nav-icon"></i><p>Test Count</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('HaemTotals') ) ? 'active' : '' }}" href="{{ route('HaemTotals') }}">  <i class="far fa-circle nav-icon"></i><p>Haem Totals</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('BioTotals') ) ? 'active' : '' }}" href="{{ route('BioTotals') }}">  <i class="far fa-circle nav-icon"></i><p>Bio Totals</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('CoagTotals') ) ? 'active' : '' }}" href="{{ route('CoagTotals') }}">  <i class="far fa-circle nav-icon"></i><p>Coag Totals</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('ExtTotals') ) ? 'active' : '' }}" href="{{ route('ExtTotals') }}">  <i class="far fa-circle nav-icon"></i><p>Ext Totals</p></a></li>
  <li class="nav-item"><a class="nav-link {{ ( request()->is('phonelog') ) ? 'active' : '' }}" href="{{ route('phonelog') }}">  <i class="far fa-circle nav-icon"></i><p>Phone Logs</p></a></li>

  <li class="nav-item"><a class="nav-link {{ ( request()->is('selectparameter') ) ? 'active' : '' }}" href="{{ route('selectparameter') }}"><i class="far fa-circle nav-icon"></i><p>Select Parameter</p></a> </li>



</ul>
</li>
<!---End-->





<!--          
               <h4 class="mt-3 mb-2 ml-2">ocm_old</h4>
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>




 
          <li class="nav-item admin">
            <a href="{{ route('Business') }}" class="nav-link {{ (request()->is('Business')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Business Profile 
              </p>
            </a>
          </li>


      



          <li class="nav-item">
            <a href="{{ route('MyProfile') }}" class="nav-link {{ (request()->is('MyProfile')) ? 'active' : '' }}">
               <i class="nav-icon fas fa-user"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
         
         

             



           <li class="nav-item {{ ( request()->is('Patients/*') || request()->is('PatientHistory*') ) ? 'menu-open' : '' }} admin">

            <a href="#" class="nav-link {{ ( request()->is('Patients/*') || request()->is('PatientHistory*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Patients
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">



              <li class="nav-item">
                <a href="{{ url('Patients/All') }}" class="nav-link {{ ( request()->is('Patients/All') || request()->is('PatientHistory*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">All Patients</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{ url('Patients/My') }}" class="nav-link {{ ( request()->is('Patients/My') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">My Patients</p>
                </a>
              </li>


           </ul>   
         </li>

        

 
          <li class="nav-item {{ ( request()->is('viewBTRequest*')  || request()->is('viewRequest*')  || request()->is('requestPatient*') || request()->is('BTRequest') || request()->is('Request*') || request()->is('BatchRequesting*') || request()->is('AddSample*') ) ? 'menu-open' : '' }} admin">

            <a href="#" class="nav-link {{ ( request()->is('viewBTRequest*') || request()->is('viewRequest*')  || request()->is('requestPatient*') || request()->is('BTRequest') || request()->is('Request*') || request()->is('BatchRequesting*') || request()->is('AddSample*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Requests
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">




              <li class="nav-item">
                <a href="{{ url('Requests/All') }}" class="nav-link {{ ( request()->is('Request') || request()->is('BTRequest') ||  request()->is('BatchRequesting*') || request()->is('Requests/All*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">All Requests</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Requests/Upcoming') }}" class="nav-link {{ ( request()->is('Requests/Upcoming') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Upcoming</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Requests/Requested') }}" class="nav-link {{ ( request()->is('Requests/Requested*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Requested</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Requests/SentToTheLab') }}" class="nav-link {{ ( request()->is('Requests/SentToTheLab*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Sent to the Lab</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('Requests/ReceivedInLab') }}" class="nav-link {{ ( request()->is('Requests/ReceivedInLab*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Received in Lab</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('Requests/Progress') }}" class="nav-link {{ ( request()->is('Requests/Progress*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">In Progress</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('Requests/Resulted') }}" class="nav-link {{ ( request()->is('Requests/Resulted*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Resulted</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="{{ url('Requests/Cancelled') }}" class="nav-link {{ ( request()->is('Requests/Cancelled*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Cancelled</p>
                </a>
              </li>




            </ul>
          </li>


         
           
           <li class="nav-item {{ ( request()->is('MTests*') || request()->is('Profile*') || request()->is('ReflexTesting') || request()->is('Panels*')   || request()->is('Mapping*') || request()->is('Questions*') ) ? 'menu-open' : '' }} admin">

            <a href="#" class="nav-link {{ ( request()->is('MTests*') || request()->is('Profile*') || request()->is('ReflexTesting') || request()->is('Panels*') || request()->is('Mapping*') || request()->is('Questions*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-vials"></i>
              <p>
               Test & Profiles
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              
              <li class="nav-item">
                <a href="{{ url('Panels') }}" class="nav-link {{ ( request()->is('Panels') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Panels</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Profiles') }}" class="nav-link {{ ( request()->is('Profiles') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Profiles</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('MappingPanels') }}" class="nav-link {{ ( request()->is('MappingPanels') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Profiles Mapping</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="{{ url('MTests') }}" class="nav-link {{ ( request()->is('MTests') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Tests</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Mapping') }}" class="nav-link {{ ( request()->is('Mapping') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Tests Mapping</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('ReflexTesting') }}" class="nav-link {{ ( request()->is('ReflexTesting') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Reflex Testing</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('Questions') }}" class="nav-link {{ ( request()->is('Questions') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Questions</p>
                </a>
              </li>


              <li class="nav-item">
                 <a href="{{ url('Profiles/Profile Question Answers') }}" class="nav-link {{ ( request()->is('Profiles/Profile Question Answers*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Question Answers</p>
                </a>
              </li>
                  
               <li class="nav-item">
                <a href="{{ url('MappingQuestions') }}" class="nav-link {{ ( request()->is('MappingQuestions') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Ques.Mapping Profiles</p>
                </a>
              </li>
      
               <li class="nav-item">
                <a href="{{ url('MappingQuestionsBT') }}" class="nav-link {{ ( request()->is('MappingQuestionsBT') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Ques.Mapping BT Prod.</p>
                </a>
              </li>


            </ul>
          </li>


        
        


          

          <li class="nav-item {{ 
    
          ( request()->is('Lists*') || 
          request()->is('SampleContainers') || 
          request()->is('List/Sample*') ||
          request()->is('List/Diagnostics') || 
          request()->is('List/Departments') || 
          request()->is('Facilit*') || 
          request()->is('GPs*') || 
          request()->is('BTAddons*') ) ? 'menu-open' : '' }} admin">

            <a href="#" class="nav-link {{ ( request()->is('Lists*') || request()->is('SampleContainers') ||  request()->is('List/Sample*') || request()->is('List/Diagnostics') || request()->is('List/Departments') || request()->is('Facilit*') || request()->is('GPs*') || request()->is('BTAddons*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Lists
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('SampleContainers') }}" class="nav-link {{ ( request()->is('SampleContainers') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Sample Containers</p>
                </a>
              </li>

            @foreach (\App\Http\Controllers\lists::ListTypes() as $list) 
              
              <li class="nav-item">
                <a href="{{ url('List/'.$list->Text) }}" class="nav-link {{ ( request()->is('List/'.$list->Text) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">
                      
                      <?php if($list->Text == 'Samples Special Handlings') {

                          echo 'Special Handlings';

                      } else {

                          echo $list->Text;
                      }?>

                  </p>
                </a>
              </li>

              @endforeach


               <li class="nav-item">
                <a href="{{ url('Facilities') }}" class="nav-link {{ ( request()->is('Facilities') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Facilities</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('GPs') }}" class="nav-link {{ ( request()->is('GPs') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">GPs</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="{{ url('BTAddons') }}" class="nav-link {{ ( request()->is('BTAddons') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">BT Products</p>
                </a>
               </li>

                 <li class="nav-item">
                <a href="{{ url('bl1200') }}" class="nav-link {{ ( request()->is('bl1200') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">BL1200 Codes</p>
                </a>
               </li>

                 <li class="nav-item">
                <a href="{{ url('bl1200Mapping') }}" class="nav-link {{ ( request()->is('bl1200Mapping') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">BL1200 Mapping</p>
                </a>
               </li>

            </ul>
          </li>
        

       
      <li class="nav-item {{ ( request()->is('Files*') || request()->is('Users/File*') || request()->is('Documents/Doc Type')  ) ? 'menu-open' : '' }} admin">

         <a href="#" class="nav-link {{ ( request()->is('Files*') || request()->is('Users/File*') || request()->is('Documents/Doc Type') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Documents
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                <a href="{{ route('Files') }}" class="nav-link {{ ( request()->is('Files') || request()->is('File*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Documents</p>
                </a>
              </li>

              <li class="nav-item">
                 <a href="{{ url('Documents/Doc Type') }}" class="nav-link {{ ( request()->is('Documents/Doc Type') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Document Types</p>
                </a>
              </li>


            </ul>
          </li>
     




          <li class="nav-item admin">
            <a href="{{ route('activitylogs') }}" class="nav-link {{ ( request()->is('activitylogs') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Activity Logs
              </p>
            </a>
          </li>


       


         

          <li class="nav-item admin">
            <a href="{{ route('PatientAudit') }}" class="nav-link {{ ( request()->is('PatientAudit') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Patients Audit
              </p>
            </a>
          </li>




        <li class="nav-item {{ ( request()->is('User*') || request()->is('Users/User*') || request()->is('Module*')  ) ? 'menu-open' : '' }} admin">

             <a href="#" class="nav-link {{ ( request()->is('User*') || request()->is('Users/User*')  || request()->is('Module*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('Users') }}" class="nav-link {{ ( request()->is('Users') || request()->is('User/*') || request()->is('User') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Users</p>
                </a>
              </li>


              <li class="nav-item">
                 <a href="{{ url('Users/Roles') }}" class="nav-link {{ ( request()->is('Users/Roles') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">User Roles</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ route('UserRolesMapping') }}" class="nav-link {{ ( request()->is('UserRolesMapping') || request()->is('UserRolesMapping*') ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">Roles Mapping</p>
                </a>
              </li>


            </ul>
          </li>


           <li class="nav-item">
            <a href="{{ route('Messages') }}" class="nav-link {{ (request()->is('Messages')) ? 'active' : '' }}">
               <i class="nav-icon fas fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>
          </li>



          <li class="nav-item {{ ( request()->is('ReportsList') || request()->is('GenerateReport*') ) ? 'menu-open' : '' }} admin">
            <a href="{{ url('ReportsList/') }}" class="nav-link {{ ( request()->is('ReportsList') || request()->is('GenerateReport*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Report Maker
              </p>
            </a>
           </li> 

           <li class="nav-item {{ ( request()->is('Reports/*') ) ? 'menu-open' : '' }} admin">

             <a href="#" class="nav-link {{ ( request()->is('Reports/*') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
                <i class="fas fa-angle-left  right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">


              @foreach (\App\Http\Controllers\reports::Reports() as $Report) 
              
              <li class="nav-item">
                <a href="{{ url('Reports/'.$Report->name) }}" class="nav-link {{ ( request()->is('Reports/'.$Report->name) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i><p class="ml-0">{{$Report->name}}</p>
                </a>
              </li>
              @endforeach
        


            </ul>
          </li>


          
            <li class="nav-item">
            <a href="{{ route('Tickets') }}" class="nav-link {{ (request()->is('Tickets')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Tickets
              </p>
            </a>
          </li> -->

           <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>






  // }  </script>


