<?php

namespace App\Http\Controllers;

use App;  
use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;
use Auth;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use PDF;
use DateTime;
use DateInterval;
use Image;

class views extends Controller
{

    public function viewrunning()
    {
        
        return view('viewrunningmeans');
    }
    public function viewrunningdata(Request $req)
    {
        
         $req->Dept;
        $result=[];
        $result2=[];
  
      
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

      
        if($req->Dept=='Heamatology'){
            $tsql1 = "select distinct AnalyteName from HaemTestDefinitions";
            $getlist1 = sqlsrv_query($conn_hq, $tsql1);
            while($row = sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC))
            {
               $result[]=$row;
            }
            return $result;
        }
        elseif($req->Dept=='Biochemistry'){
            $tsql4 = "select distinct LongName,PrintPriority from BioTestDefinitions order by PrintPriority";
            $getlist4 = sqlsrv_query($conn_hq, $tsql4);
            
            while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
            {
               $result2[]=$row4['LongName'];
            }
            $utfEncodedArray = array_map("utf8_encode", $result2);
            return $utfEncodedArray;
        } 

       

    }
     public function viewrunning2(Request $req)
    {
        
        return view('viewrunningmeans2');
    }

     public function viewrunning3()
    {
        
        return view('viewrunningmeans3');
    }
    public function viewrunning2data(Request $req)
    {
        $source=$req->Source;
        $result=[];
        $to=$req->to;
        $from=$req->from;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
        
        
        $tsql1 = "select EntryDateTime,SampleID, LotNumber,Expiry from ReagentLotNumbers where EntryDateTime>='$from' and EntryDateTime<='$to' and Analyte='$source'";
        $getlist1 = sqlsrv_query($conn_hq, $tsql1);
        $count1=sqlsrv_has_rows($getlist1);
        if($count1>0){
            
            while($row = sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC))
            {
               $result[]=$row;
            }
        }

       
        return DataTables::of($result) 
        
        ->setRowId('EntryDateTime')
        ->rawColumns([ 'SampleID'])
        ->make(true);
    }

    public function microbiology()
    {
        
        return view('microbiology');
    }

    public function Statistics()
    {
        
        return view('statistics');
    }

    public function getdata(Request $request){

        $Discipline = $request->Discipline;
        $Criteria = $request->Criteria;
        $from = $request->from;
        $to = $request->to;
        $sdata=[];
        $count2=0;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
        $Discipline=$Discipline.'Results';
        $sql2="SELECT DISTINCT($Criteria) FROM Demographics WHERE $Criteria <> '' AND SampleID IN (SELECT DISTINCT(SampleID) FROM $Discipline WHERE RunDate BETWEEN '$from' and '$to') ORDER BY $Criteria";

       return $sql ="select distinct bt.shortname, bt.Code, count(bt.shortname) as countshortname from biotestdefinitions as bt, demographics as d, bioresults as br where d.SampleID = br.SampleID AND bt.Code = br.code AND bt.InUse = 1 AND d.RunDate>='$from' and d.Rundate<='$to' AND d.$Criteria is not null order by bt.shortname";
        $getlist1 = sqlsrv_query($conn_hq, $sql);
        $count1=sqlsrv_has_rows($getlist1);
        if($count1>0){
            
            while($row = sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC))
            {
            $count2++;
            }
        }
        return $count2;
        
    }
}
