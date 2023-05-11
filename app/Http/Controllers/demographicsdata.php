<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use Mail;
use PDF;

class demographicsdata extends Controller
{
public function index()
{
    return view('demographicsdata');
}
public function demographics(Request $req)
{
    $fromdate=$req->from_date;
     $todate=$req->to_date;
     $result=[];
     if ($req->ajax()) {
   
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
      

                            
                                
  

                                return  $tsql = "SELECT demographics.PatName,demographics.DoB,demographics.Sex,demographics.Chart,demographics.RunDate,demographics.RecDate,
                                demographics.Addr0,Demographics.SampleID,demographics.Ward,demographics.GP,demographics.SampleDate,demographics.Clinician,
                                SiteDetails50.Site,SiteDetails50.SiteDetails FROM demographics inner join SiteDetails50  on 
                                SiteDetails50.SampleID=demographics.SampleID where Demographics.datetimedemographics >= '$fromdate' and
                                Demographics.datetimedemographics<='$todate'";
                                  $getlist = sqlsrv_query($conn_hq, $tsql);
                                   while($row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
                                   {
                                    $result[]=$row;
                                   }
                               
                                  return Datatables::of($result) 
                                  ->addIndexColumn()
            ->addColumn('action', function($row){
               

              
            }) 

            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);;

                
              
    }
    return view('demographicsdata');
}

   

}