<?php
  
namespace App\Http\Controllers;
  
use App;  
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use Mail;
use PDF;
use DateTime;

class collectedreports extends Controller
{
    public function index(){
        return view('collectedreports');
    }
    public function index2(){
        return view('urineprotien');
    }
    public function index3(){
        return view('testcount');
    }
    public function Extworklist(){
        return view('Externalworklist');
    }
    public function demographicsdata()
    {
        return view('demographicsdata');
    }

    public function ExtWokLst(Request $request){

        $from = $request->from;
        $to = $request->to;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $arr1 = [];     
        $sql = "select distinct SampleID, PatName, Chart, DoB from demographics where RunDate>='$from' and demographics.RunDate<='$to'";
        $query1 = sqlsrv_query($conn_hq, $sql);
        while($row = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC))
        {
            $arr1[] =  $row;

        }

        return DataTables::of($arr1) 
        ->addIndexColumn()
        ->addColumn('SampleID', function($row){
            return $row['SampleID'];
        }) 
        ->addIndexColumn()
        ->addColumn('PatName', function($row){
            return $row['PatName'];
        }) 
        ->addIndexColumn()
        ->addColumn('Chart', function($row){
            return $row['Chart'];
        }) 
        ->addIndexColumn()
        ->addColumn('DoB', function($row){
            return $row['DoB'];
        })
        ->setRowId('SampleID')
        ->rawColumns(['SampleID', 'PatName', 'Chart', 'DoB'])
        ->make(true);
    }


}