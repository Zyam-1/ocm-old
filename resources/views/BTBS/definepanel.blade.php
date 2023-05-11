@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Define Panel
               <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


            <form id="form">
            {{ csrf_field() }}
                                                 
                <div class="card card-primary card-outline">
                    <div class="card-body ">  
                        <div class="row my-3">
                            <div class="col-3">
                                <select name="select_dropdown" id="select_dropdown" class="select-control form-control m-2">
                                    <option value="serum">Serum</option>
                                    <option value="serum">Hello</option>
                                </select>
                            </div>
                            <div class="col-9">
                               <button class="btn btn-primary m-2">Add New Panel</button>
                          
                               <button class="btn btn-primary m-2">Remove Panel</button>
                           
                               <button class="btn btn-primary m-2">Remove Item</button>

                               <button class="btn btn-secondary m-2">Amend Panel Sequence</button>

                               <button class="btn btn-danger m-2">Cancel</button>

                            </div>
                        </div>
                        <div class="container-fluid d-flex ">
                            <div class="row w-100">
                                <div class="col-md-2">
                                    <div class="first_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AADL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AADV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ABKL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ABKV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHAV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHEV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHTL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AJCV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ARIA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ARM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">EV68</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">FLUA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">FLUB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HAGR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HAMR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBCH</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBGT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBLV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBRM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBVA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCDR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCGT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCLV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCRM</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="second_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCRT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCVA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HDDB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HEFM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HSAR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ISAG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">L229</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LADV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LAH1</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LAH3</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LBOC</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHP</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEWG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEWM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEZG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEZM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFDG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFDM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFJG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFJM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFLA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFLB</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="third_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFTG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFTM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFWG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFWM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFYG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFYM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHKU</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHVG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHVM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LMPV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LMYP</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LNL6</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LOC4</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI1</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI2</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI3</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI4</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPVG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPVM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRHE</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRSA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRSB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LTBG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LTBM</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="first_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AADL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AADV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ABKL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ABKV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHAV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHEV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AHTL</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">AJCV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ARIA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ARM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">EV68</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">FLUA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">FLUB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HAGR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HAMR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBCH</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBGT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBLV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBRM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HBVA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCDR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCGT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCLV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCRM</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="second_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCRT</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HCVA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HDDB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HEFM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">HSAR</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">ISAG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">L229</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LADV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LAH1</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LAH3</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LBOC</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LCHP</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEWG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEWM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEZG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LEZM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFDG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFDM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFJG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFJM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFLA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFLB</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="third_col">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFTG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFTM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFWG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFWM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFYG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LFYM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHKU</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHVG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LHVM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LMPV</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LMYP</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LNL6</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LOC4</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI1</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI2</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI3</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPI4</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPVG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LPVM</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRHE</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRSA</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LRSB</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LTBG</li>
                                            <li class="list-group-item bg-light p-2 border-0 list-unstyled">LTBM</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>  
                            <div class="row w-25">
                            <div class="col-md-12">
                                    <div class="fourth_col">
                                        <ul class="list-group">
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">+ New Iron Profile</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">+ U/E</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3">+ Liver</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample3">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4">+ U&E LFT FLIP</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample4">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample5" role="button" aria-expanded="false" aria-controls="multiCollapseExample5">+ Fasting Lipids</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample5">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="multiCollapseExample6">+ Bone</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample6">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample7" role="button" aria-expanded="false" aria-controls="multiCollapseExample7">+ Drug</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample7">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample8" role="button" aria-expanded="false" aria-controls="multiCollapseExample8">+ Iron Studies</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample8">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample9" role="button" aria-expanded="false" aria-controls="multiCollapseExample9">+ TFT</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample9">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample10" role="button" aria-expanded="false" aria-controls="multiCollapseExample10">+ B12/Fol</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample10">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample11" role="button" aria-expanded="false" aria-controls="multiCollapseExample11">+ Hormone</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample11">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample12" role="button" aria-expanded="false" aria-controls="multiCollapseExample12">+ Coeliac Screen</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample12">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample13" role="button" aria-expanded="false" aria-controls="multiCollapseExample13">+ Igs</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample13">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <a class="list-group-item bg-light p-2" data-toggle="collapse" href="#multiCollapseExample14" role="button" aria-expanded="false" aria-controls="multiCollapseExample14">+ Covid</a>
                                            <div class="collapse multi-collapse" id="multiCollapseExample14">
                                                <div class="card card-body overflow-auto">
                                                    <ul>
                                                        <li>Point 1</li>
                                                        <li>Point 2</li>
                                                        <li>Point 3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--  -->
                                        </ul>
                                    </div>
                                </div>  
                        </div> 
                        <!-- <div class="mt-3"> -->
                          
                                <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div id="result" class="text-danger"></div>

            </form>        

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



@extends('layouts.footer')

@push('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush