<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\ticketattachment;
use App\Models\contact;
use App\Models\client;
use App\Models\department;
use DB;
use App;
use Validator;
use Carbon\Carbon;
use DataTables;
use Auth;

class BTBS extends Controller
{

public function cautiontestIndex(){
    return view('BTBS.cautiontestsystem');
}
public function transfusionlabIndex(){
    return view('BTBS.transfusionlaboratory');
}
public function unitspending(){
    return view('BTBS.unitspending');
}
public function netacquireIndex(){
    return view('BTBS.netacquire');
}
public function netacquire2Index(){
    return view('BTBS.netacquire2');
}

// public function miscllSamp(){
//     return view('listoferrorMiscllsamp');
// }
public function miscllSamp(Request $request,$id=Null){



    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
       
       if(!$conn_hq) {
       die( print_r( sqlsrv_errors(), true));
   } 

   $data=[];
   $er=0;
if ($request->ajax()) {


$page = $request->page;

$sql="
DECLARE @PageNumber AS INT
       DECLARE @RowsOfPage AS INT
   DECLARE @MaxTablePage  AS FLOAT 
   SET @PageNumber=".$page."
   SET @RowsOfPage=10       
    SELECT * FROM Lists where ListType='ST'
   ORDER BY Code 
   OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
   FETCH NEXT @RowsOfPage ROWS ONLY 
 ";
 
$result =  sqlsrv_query($conn_hq, $sql);


while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
    $data[$er] = $rows;
    $er++;
}


       return Datatables::of($data)

               ->addIndexColumn()
               ->addColumn('action', function($row){

                      $btn = '
                           <div class="btn-group" role="group">
                           <a href="/ocm_old/MisSamsave/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                            <i class="bx bx-edit"></i>
                           </a>
                           <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                           </button>
                            </div>
                             ';

                       return $btn;
               }) 


               ->setRowId('id')
               ->rawColumns(['action'])
               ->make(true);

               
             
   }
  $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='ST'";
  $mysql3=sqlsrv_query($conn_hq,$sql3);
  $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
  $rows7=$rows6['CodeCount'];


  if($id != NULL){

   $sqlget="SELECT * FROM Lists where Code='$id'";
  $mysql=sqlsrv_query($conn_hq,$sqlget);
   
   $rowssend = sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC);
   
   

  }

  else {
   $rowssend = [];
  }




return view('listoferrorMiscllsamp')->with('rows7',$rows7)->with('rowssend',$rowssend);
}
public function msampsave(Request $req){
$code = $req->code;
$text = $req->text;
$orignalcode=$req->orignalcode;


$validator = Validator::make($req->all(), [      
       'code' => 'required',
       'text' => 'required'
   ]);

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
       
       if(!$conn_hq) {
       die( print_r( sqlsrv_errors(), true));
   }
   if($orignalcode !=''){
$sql="Select * from Lists where Code='$orignalcode'";
$query=sqlsrv_query($conn_hq,$sql);
$count=sqlsrv_has_rows($query); 
   }else{
$sql="Select * from Lists where Code='$code'";
$query=sqlsrv_query($conn_hq,$sql);
$count=sqlsrv_has_rows($query);  
   }





  if ($validator->passes()) {
if($count >0){
$sql3="update Lists set Code='$code' , Text='$text' where Code='$orignalcode'";
sqlsrv_query($conn_hq,$sql3);
return response()->json(['success'=>'Data Updated Successfully']);
}else{

$sql2="SELECT Max(ListOrder) as ListOrder FROM Lists";
$query2=sqlsrv_query($conn_hq,$sql2);
$rows= sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
$listorder=$rows['ListOrder']+1;

$sql3="Insert into Lists (Code,Text,ListOrder,ListType,InUse) values('$code','$text','$listorder','ST','1')"; 
sqlsrv_query($conn_hq,$sql3);

return response()->json(['success'=>'Data Saved Successfully']);
}
  }else{
    return response()->json(['error'=>$validator->errors()->first()]);
  }




}
public function msampdel($id){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
       
       if(!$conn_hq) {
       die( print_r( sqlsrv_errors(), true));
   }

$sql="delete from Lists where Code='$id'";
sqlsrv_query($conn_hq,$sql);
return response()->json();
}

public function microbiologyIndex($id=Null){
 
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   


    $optione1s=[];
    $c=0;
    $optione23=[];
    $d=0;  
    $selectoptione3=[];
    $getoption3=0;

    $sql="select *from demographics where SampleID='$id'";
    $result= sqlsrv_query( $conn_hq, $sql);
    $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    $sql2="select *from ocmRequestDetails where SampleID='$id'";
    $result2= sqlsrv_query( $conn_hq, $sql2);
    $ocm_oldRequest= sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);

    $sql3="select * from lists where ListType='OR'";
    $result3= sqlsrv_query( $conn_hq, $sql3);
    
    while($option= sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC)){
        $optione1s[$c] = $option;
        $c++;
    }
    $sql4="select * from Organisms";
    $result4= sqlsrv_query( $conn_hq, $sql4);
  
    while($option2= sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)){
        $optione23[$d] = $option2;
        $d++;
    }
    // return $optione23;
    $optioon3elsement="select * from Lists where ListType='MQ'";
    $resultoption3= sqlsrv_query( $conn_hq, $optioon3elsement);
   
    while( $dataoption3 = sqlsrv_fetch_array($resultoption3, SQLSRV_FETCH_ASSOC)){
        $selectoptione3[$getoption3] = $dataoption3;
        $getoption3++;
    }




    return view('BTBS.microbiology')->with('data',$data)->with('ocmRequest',$ocmRequest)->with('optione1s',$optione1s)->with('selectoptione3',$selectoptione3);
}

public function dashboard (){



     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }  


            $sql="Select * from ocmRequestDetails where Programmed =0";

            $r=sqlsrv_query( $conn_hq, $sql);
            $arr=[];
            $i=0;
            while( $row3 = sqlsrv_fetch_array($r, SQLSRV_FETCH_ASSOC)){
             $arr[$i]=$row3;
             $i++;
            }



        
            $sql2="Select distinct(SampleID),SampleDate from ocmRequestDetails where Programmed =0 and DepartmentID='Bio' and Addon=0 order by SampleDate desc
            ";

            $bio=sqlsrv_query( $conn_hq, $sql2);
           
            $a=0;
            $allbio=[];
            $sampid=[];
            $analyserbio=[];
            $cou=0;
            while( $row4 = sqlsrv_fetch_array($bio, SQLSRV_FETCH_ASSOC)){
                $allbio[$a]=$row4;
                $sampid[$a]=$row4['SampleID'];
                
              $quer="select Analyser from BioResults where SampleID='".$sampid[$a]."'";
                $anbio=sqlsrv_query( $conn_hq, $quer);
                $row666 = sqlsrv_fetch_array($anbio, SQLSRV_FETCH_ASSOC);
               
                if($row666){
                    $analyserbio[$cou]=$row666['Analyser'];
                       $cou++; 
                }
         else{
            $analyserbio[$cou]="-";
        $cou++; 
        }
                $a++;
            } 
            // return $analyserbio;
            // $sampid=array_unique($sampid);
            // return $sampid;

            // return $allbio;
            $hall=[];
            $a=0;
            $sampha=[];
            $cou2=0;
            $analyserheam=[];
            $hsql="Select distinct(SampleID),SampleDate from ocmRequestDetails where Programmed =0 and DepartmentID='Haem' and Addon=0   order by SampleDate desc";
            $haem=sqlsrv_query( $conn_hq, $hsql);
            while( $row5 = sqlsrv_fetch_array($haem, SQLSRV_FETCH_ASSOC)){
                $allhaem[$a]=$row5;
                 

                $a++;
            }
// return $analyserheam;
            $allcoag=[];
            $b=0;
            $csql="Select distinct(SampleID),SampleDate  from ocmRequestDetails where Programmed =0 and DepartmentID='Coag' and Addon=0  order by SampleDate desc";
            $coag=sqlsrv_query( $conn_hq, $csql);
            while( $row6 = sqlsrv_fetch_array($coag, SQLSRV_FETCH_ASSOC)){
                $allcoag[$b]=$row6;
                $b++;
            }
            // return $allcoag[0]['SampleDate'];
$coagaddons=[];
$c=0;
$s="Select * from ocmRequestDetails where Programmed=0 and DepartmentID='Coag' and Addon =1  order by SampleDate desc";
$ca=sqlsrv_query($conn_hq,$s);
while( $row7 = sqlsrv_fetch_array($ca, SQLSRV_FETCH_ASSOC)){
$coagaddons[$c]=$row7;
$c++;
}

$bioaddons=[];
$c=0;
$s="Select distinct (SampleID),SampleDate from ocmRequestDetails where Programmed=0 and DepartmentID='Bio' and Addon =1  order by SampleDate desc";
$bio=sqlsrv_query($conn_hq,$s);
while( $row8 = sqlsrv_fetch_array($bio, SQLSRV_FETCH_ASSOC)){
$bioaddons[$c]=$row8;
$c++;
}

$haemaddons=[];
$c=0;
$s="Select distinct (SampleID),SampleDate from ocmRequestDetails where Programmed=0 and DepartmentID='Haem' and Addon =1 ";
$haem=sqlsrv_query($conn_hq,$s);
while( $row9 = sqlsrv_fetch_array($haem, SQLSRV_FETCH_ASSOC)){
$haemaddons[$c]=$row9;
$c++;
}
  $optioonurgent="SELECT * FROM ocmRequest Inner JOIN ocmRequestDetails ON ocmRequest.RequestID = ocmRequestDetails.RequestID where Urgent=1 and RequestState='Sent to the lab'";
  $resultoptionurg= sqlsrv_query( $conn_hq, $optioonurgent);
    $urg=[];
    $option=0;

    while( $uoption = sqlsrv_fetch_array($resultoptionurg, SQLSRV_FETCH_ASSOC)){
        $urg[$option] = $uoption['RequestID'];
        $option++;
    }
    $arra=implode(',', $urg);
    // array_unique($urg);
  $reqsampl="Select distinct(SampleID),DepartmentID,external_ from ocmRequestDetails WHERE RequestID IN ($arra)";
  $u=[];
  $option=0;
 $urgent=sqlsrv_query( $conn_hq, $reqsampl);
 while( $uo = sqlsrv_fetch_array($urgent, SQLSRV_FETCH_ASSOC)){
    $u[$option] = $uo;
    
    $option++;
}
    // return array_unique($urgent);
    $optionext="Select distinct(SampleID),SampleDate from ocmRequestDetails where Programmed=0 and DepartmentID='Micro' and Addon =0 order by SampleDate desc";
    $external2= sqlsrv_query( $conn_hq, $optionext);
    $external3=[];
    $options2=0;

    while( $extoption = sqlsrv_fetch_array($external2, SQLSRV_FETCH_ASSOC)){
        $external3[$options2] = $extoption;
        $options2++;
    }

    $addons="SELECT distinct(SampleID),SampleDate FROM ocmRequestDetails Where Addon=1 order by SampleDate desc";
    $addons2= sqlsrv_query( $conn_hq, $addons);
    $addons4=[];
    $addons5=0;

    while( $addons3 = sqlsrv_fetch_array($addons2, SQLSRV_FETCH_ASSOC)){
        $addons4[$addons5] = $addons3;
        $addons5++;
    }
  
// return $u;


$sql66 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,BioResults.Analyser from ocmRequestDetails join BioResults on ocmRequestDetails.SampleID=BioResults.SampleID where BioResults.Valid=0
";
$aff=[];

$addons5=0;
 $x=sqlsrv_query($conn_hq,$sql66);
 while($a3 = sqlsrv_fetch_array($x, SQLSRV_FETCH_ASSOC)){
    $aff[$addons5] = $a3;
    $addons5++;
}
// return $aff;
// $u=array_unique($u);



$sql67 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,CoagResults.Analyser from ocmRequestDetails join CoagResults on ocmRequestDetails.SampleID=CoagResults.SampleID where CoagResults.Valid=0";
$cff=[];

$addons5=0;
 $z=sqlsrv_query($conn_hq,$sql67);
 while($a4 = sqlsrv_fetch_array($z, SQLSRV_FETCH_ASSOC)){
    $cff[$addons5] = $a4;
    $addons5++;
}
$sql68 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,HaemResults50.Analyser from ocmRequestDetails join HaemResults50 on ocmRequestDetails.SampleID=HaemResults50.SampleID where HaemResults50.Valid=0";
$hff=[];

$addons5=0;
 $h=sqlsrv_query($conn_hq,$sql68);
 while($a5 = sqlsrv_fetch_array($h, SQLSRV_FETCH_ASSOC)){
    $hff[$addons5] = $a5;
    $addons5++;
}

// return $hff;



$sql70 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,BioResults.Analyser from ocmRequestDetails join BioResults on ocmRequestDetails.SampleID=BioResults.SampleID where BioResults.Printed=0
";
$ap=[];

$addons5=0;
 $i=sqlsrv_query($conn_hq,$sql70);
 while($yy = sqlsrv_fetch_array($i, SQLSRV_FETCH_ASSOC)){
    $ap[$addons5] = $yy;
    $addons5++;
}
// return $aff;
// $u=array_unique($u);



$sql71 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,CoagResults.Analyser from ocmRequestDetails join CoagResults on ocmRequestDetails.SampleID=CoagResults.SampleID where CoagResults.Printed=0";
$cpp=[];

$addons5=0;
 $z1=sqlsrv_query($conn_hq,$sql71);
 while($a41 = sqlsrv_fetch_array($z1, SQLSRV_FETCH_ASSOC)){
    $cpp[$addons5] = $a41;
    $addons5++;
}
$sql72 ="Select distinct(ocmRequestDetails.SampleID),DepartmentID,HaemResults50.Analyser from ocmRequestDetails join HaemResults50 on ocmRequestDetails.SampleID=HaemResults50.SampleID where HaemResults50.Printed=0";
$hpp=[];

$addons5=0;
 $h1=sqlsrv_query($conn_hq,$sql72);
 while($a51 = sqlsrv_fetch_array($h1, SQLSRV_FETCH_ASSOC)){
    $hpp[$addons5] = $a51;
    $addons5++;
}


$data=[

    'haemvalid'=>$hff,
    'coagvalid'=>$cff,
    'biovalid'=>$aff,
    'analyser'=>$analyserbio,
    'biop'=>$ap,
    'coagp'=>$cpp,
    'haemp'=>$hpp,

    'outstand'=>$arr,
    'coag'=>$allcoag,
    'haem'=>$allhaem,
    'coagaddons'=>$coagaddons,
    'bioaddons'=>$bioaddons,
    'haemaddons'=>$haemaddons,
    'urgent'=>$u,
    'external3'=>$external3,
    'addons4'=>$addons4,
    'bio'=>$allbio
];


    return view ('BTBS.customsoftware')->with('data',$data);
}


public function ahg(){

    return view('BTBS.ahg');
}
public function IssueBatch(){
    return view('BTBS.issuebatch');
}
public function forward(){
    return view('BTBS.forward');
}
public function phistory(Request $request){

$conn_hq = \App\Http\Controllers\Controller::SQLConnect2();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }  
        $data=[];
        $i=0;



    if ($request->ajax()) {


     // $page= $request->page;
     // $listcode= $request->listcode;
      $pageno= $request->pageno;
      $search= $request->search;
      $radio= $request->radio;
if($radio =='name'){

      $sql="
 DECLARE @PageNumber AS INT
        DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM PatientDetails where $radio Like '%$search%' 
        ORDER BY patnum
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";
            $mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
   $data[$i]=$row;
      $i++;

}



      

    $sql2="SELECT COUNT(labnumber) as count FROM PatientDetails where $radio Like '%$search%'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;


}else if($radio =='DoB' OR $radio =='patnum'){

 // $sql=" SELECT * FROM PatientDetails where $radio = '$search'";
     $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
         SELECT * FROM PatientDetails  where $radio = '$search'
        ORDER BY patnum
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

      $mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
   $data[$i]=$row;
      $i++;
}

         $sql2="SELECT COUNT(labnumber) as count FROM PatientDetails where $radio = '$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;



}else{

   $sql=" ";
   $row7=0;

}








    return Datatables::of($data)

                    ->addIndexColumn()
                    ->editColumn('address', function ($row) {
                return    $row['addr1'].' ,'.$row['addr2'];
   
            })->with('row7',$row7) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);


                  
                  
        }

    $row7=[];
    $j=0;

    // $sql2="SELECT COUNT(labnumber) as count FROM PatientDetails";
    // $query2=sqlsrv_query($conn_hq,$sql2);
    // $row7=sqlsrv_fetch_array($query2);
    // $count2=$row7['count'];

 

  


return view('BTBS.patienthistory');
}
public function stock(){
    return view('BTBS.stock');
}
public function unlock(){
    return view('BTBS.unlock');
}
public function sorder(){
    return view('BTBS.sorder');
}
public function semenanalysis(){
    return view('BTBS.semenanalysis');
}

public function patientsearch (Request $request){


$sql = '';

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        } 

        $data=[];
        $i=0;

    
        

    if ($request->ajax()) {
    

  
        $table= $request->table;
         // $page= $request->page;
     // $listcode= $request->listcode;
      $pageno= $request->pageno;
      $search= $request->search;
      $radio= $request->radio;
      $howsearch= $request->howsearch;

 // Condition for exact match     
if($radio =='PatName' && $howsearch=='Exact Match'){

  $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM $table where $radio ='$search'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



   $sql2="SELECT COUNT(SampleID) as count FROM `$table` where $radio ='$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if($radio =='DoB'  && $howsearch=='Exact Match'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
      SELECT * FROM $table where $radio ='$search' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";


    $sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio ='$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if( $radio =='Chart' && $howsearch=='Exact Match'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
   SELECT * FROM $table where $radio ='$search'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



$sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio ='$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if($radio =='namedob' && $howsearch=='Exact Match'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM $table where PatName ='$search' OR DoB='$search'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";


$sql2="SELECT COUNT(SampleID) as count FROM $table  where PatName ='$search' OR DoB='$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}
// Condition for Leading match     
else if($radio =='PatName'  && $howsearch=='Leading Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
      SELECT * FROM $table where $radio LIKE '$search%' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



    $params = [];



     $sql2="SELECT COUNT(Chart) as count FROM  $table where $radio  LIKE '$search%'";
   
    
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

 



  

}   else if( $radio =='DoB' && $howsearch=='Leading Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
    SELECT * FROM $table where $radio  LIKE '$search%'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";


 
 $sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '$search%'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;


}else if($radio =='Chart' && $howsearch=='Leading Characters'){

$sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM $table where $radio  LIKE '$search%' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";


 $sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '$search%'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if($radio =='namedob' && $howsearch=='Leading Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
     SELECT * FROM $table where PatName LIKE '$search%' OR DoB LIKE'$search%'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

 $sql2="SELECT COUNT(SampleID) as count FROM $table  where PatName LIKE '$search%' OR DoB LIKE'$search%'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;


}
// Condition for trailing match     
else if($radio =='PatName'  && $howsearch=='Trailing Characters'){



    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
      SELECT * FROM $table where $radio LIKE '%$search'  
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";




  $sql2="SELECT COUNT(SampleID) as count FROM $table where $radio LIKE '%$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if( $radio =='DoB' && $howsearch=='Trailing Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
       SELECT * FROM $table where $radio  LIKE '%$search' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



   $sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '%$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if($radio =='Chart' && $howsearch=='Trailing Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM $table where $radio  LIKE '%$search' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

   $sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '%$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if($radio =='namedob' && $howsearch=='Trailing Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
    SELECT * FROM $table where PatName LIKE '%$search' OR DoB LIKE'%$search'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



   $sql2="SELECT COUNT(SampleID) as count FROM $table  where PatName LIKE '%$search' OR DoB LIKE'%$search'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}
// Condition for All Characters match     
else if($radio =='PatName'  && $howsearch=='All Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
    SELECT * FROM $table where $radio LIKE '%$search%'  
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



    $sql2="SELECT COUNT(SampleID) as count FROM $table where $radio LIKE '%$search%'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $row7=sqlsrv_fetch_array($query2);
    $count2=$row7;

}else if( $radio =='DoB' && $howsearch=='All Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
     SELECT * FROM $table where $radio  LIKE '%$search%'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

$sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '%$search%'";
$query2=sqlsrv_query($conn_hq,$sql2);
$row7=sqlsrv_fetch_array($query2);
$count2=$row7;

}else if($radio =='Chart' && $howsearch=='All Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
    SELECT * FROM $table where $radio  LIKE '%$search%'
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

$sql2="SELECT COUNT(SampleID) as count FROM $table  where $radio  LIKE '%$search%'";
$query2=sqlsrv_query($conn_hq,$sql2);
$row7=sqlsrv_fetch_array($query2);
$count2=$row7;

}else if($radio =='namedob' && $howsearch=='All Characters'){


    $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10       
        SELECT * FROM $table where PatName LIKE '%$search%' OR DoB LIKE'%$search%' 
        ORDER BY PatName
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";



$sql2="SELECT COUNT(SampleID) as count FROM $table  where PatName LIKE '%$search%' OR DoB LIKE'%$search%'";
$query2=sqlsrv_query($conn_hq,$sql2);
$row7=sqlsrv_fetch_array($query2);
$count2=$row7;

}else if($pageno !='' && $radio==''){


 //    $sql="
 // DECLARE @PageNumber AS INT
 //            DECLARE @RowsOfPage AS INT
 //        DECLARE @MaxTablePage  AS FLOAT 
 //        SET @PageNumber=".$pageno."
 //        SET @RowsOfPage=10       
 //         SELECT * FROM PatientDetails  
 //        ORDER BY patnum
 //        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
 //        FETCH NEXT @RowsOfPage ROWS ONLY 
 //      ";

}else{

   $sql="";
   $row7=0;

}

// return $sql;
$mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
      
   
                  $data[$i]=$row;
       
      $i++;
   }

   //return $table;
    return Datatables::of($data)

                    ->addIndexColumn()
                    ->editColumn('address', function ($row,$table) {

                     if($table != 'demographics'){
                            return  "Usman";

                                 // return  $row['Address0'].' , '.$row['Address1']; 
                        } else {

                                  return    $row['Addr0'].' , '.$row['Addr1'];
                        }        
                      
          


   
            })->editColumn('forext',  function ($row,$table=NULL) {

                  if($table == 'demographics') {

                                   if($row['ForExt'] !=''){
                                  return   '<i class="fa fa-check text-success"></i>';
                                    }
                        } else {

                                  return   '';
                        }


             
   
            })->editColumn('forbio', function ($row,$table=NULL) {

                      if($table == 'demographics') {

                                      if($row['ForBio'] !=''){
                return ' <i class="fas fa-check text-success"></i>';
                
                }
                        } else {

                                  return   '';
                        }

               
   
            })->editColumn('formicro', function ($row ,$table=NULL) {

                       if($table == 'demographics') {

                      if($row['ForMicro'] !=''){
                return ' <i class="fas fa-check text-success"></i>';
                
                }
                        } else {

                                  return   '';
                        }
               
   
            })->editColumn('forcoag', function ($row ,$table=NULL) {

                    if($table == 'demographics') {

                     if($row['ForCoag'] !=''){
                return ' <i class="fas fa-check text-success"></i>';
                
                }
                        } else {

                                  return   '';
                        }
              
   
            })->editColumn('forhaem', function ($row ,$table=NULL) {
             
                if($table == 'demographics') {

                       if($row['ForHaem'] !=''){
                return ' <i class="fas fa-check text-success"></i>';
                
                }
                        } else {

                                  return   '';
                        }

   
            })->editColumn('forsemen', function ($row ,$table=NULL) {
               
                    if($table == 'demographics') {

                    if($row['ForSemen'] !=''){
                return ' <i class="fas fa-check text-success"></i>';
                
                }
                        } else {

                                  return   '';
                        }


   
            })->with('row7',$row7)       
  

                    ->setRowId('id')
                    ->rawColumns(['action','forext','forbio','formicro','forcoag','forhaem','forsemen'])
                    ->make(true);

                    
                  
        }


    return view('BTBS.patientsearch');
}


public function crossmatches (){
    return view('BTBS.crossmatches');
}



public function crossmatchreport (){
    return view('BTBS.crossmatchreport');
}




public function prophylaxis (){
    return view('BTBS.antidprophylaxis');
}





public function patientdetails (){
    return view('BTBS.patientdetails');
}





public function antibody (){
    return view('BTBS.antibody');
}
public function electronicissue (){
    return view('BTBS.electronicissue');
}
public function netacquirepacket(Request $request){
    return $request->bpackets;
    // return view('BTBS.Netacquire');
}
public function Option1($id){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    

    $optione1s=[];
    $c=0;
    $sql4="select * from Organisms where GroupName='$id'";
    $result4= sqlsrv_query( $conn_hq, $sql4);
  
    while($option2= sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)){
        $optione1s[$c] = $option2;
        $c++;
    }


    return view('BTBS.options1')->with('optione1s',$optione1s);
}
public function Option2($id){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

    $optione1s=[];
    $c=0;
    $sql4="select * from Organisms where GroupName='$id'";
    $result4= sqlsrv_query( $conn_hq, $sql4);
  
    while($option2= sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)){
        $optione1s[$c] = $option2;
        $c++;
    }


    return view('BTBS.options2')->with('optione1s',$optione1s);
}
public function Option3($id){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }  
    $optione1s=[];
    $c=0;
    $sql4="select * from Organisms where GroupName='$id'";
    $result4= sqlsrv_query( $conn_hq, $sql4);
  
    while($option2= sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)){
        $optione1s[$c] = $option2;
        $c++;
    }


    return view('BTBS.options3')->with('optione1s',$optione1s);
}

public function Option4($id){
 
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    


    $optione1s=[];
    $c=0;
    $sql4="select * from Organisms where GroupName='$id'";
    $result4= sqlsrv_query( $conn_hq, $sql4);
  
    while($option2= sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)){
        $optione1s[$c] = $option2;
        $c++;
    }


    return view('BTBS.options4')->with('optione1s',$optione1s);
}
public function barcodesnetaquire(){
    return view('codenetquire');
}
public function panelBarcodes(){
    return view('panelBarcode');
}
public function orgaism2(Request $request,$listtype=Null,$id=Null){
 


$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }  
        $data=[];
        $i=0;



 

    if ($request->ajax()) {


     $page= $request->page;
     $listcode= $request->listcode;
     $search= $request->search;
if($search !=''){
  $sql=" SELECT * FROM Lists where ListType='$listcode' AND  (Code Like '%$search%' OR Text Like '%$search%')";

}else{

   $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Lists where ListType='$listcode'
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

}



      
  


   $mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
      $data[$i]=$row;
      $i++;
   }
//    $routename;

// return request()->is('MIdentifyWet*');
//    if(request()->is('MIdentifyStains*') == 1){
//      $routename='MIdentifyStains';
//    }else if(request()->is('MIdentifyWet*') == 1){
//  return $routename='MIdentifyWet';
//    }else if(request()->is('MIdentifyQantity*') == 1){
//      $routename='MIdentifyQantity';
//  }





            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/Lists/'.utf8_encode($row['ListType']).'/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

        if($id !=''){

        $sql2="Select * from Lists where Code='$id'";
       $mysql2=sqlsrv_query($conn_hq,$sql2);
        $count3 = sqlsrv_has_rows($mysql2);

        $mydata2=[];
        $j=0;

            if($count3 > 0){

            while($rows5 = sqlsrv_fetch_array($mysql2, SQLSRV_FETCH_ASSOC) ){
               $mydata2[$j] = $rows5;
               $j++;
            }
        } else{
            $mydata2=[''];
        }

        }else{
            $mydata2=[''];
        }

       $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='$listtype'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];


       // $list=[
       // 'listtype'=>$listtype
       // ];


    return view('organism')->with('mydata2',$mydata2)->with('rows7',$rows7)->with('listtype',$listtype);
}
public function orgaism3(Request $request,$listtype=Null,$id=Null){
 


    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
     
    
                
    if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
            }  
            $data=[];
            $i=0;
    
    
    
     
    
        if ($request->ajax()) {
    
    
         $page= $request->page;
         $listcode= $request->listcode;
         $search= $request->search;
    if($search !=''){
      $sql=" SELECT * FROM Lists where ListType='$listcode' AND  (Code Like '%$search%' OR Text Like '%$search%')";
    
    }else{
    
       $sql="
     DECLARE @PageNumber AS INT
                DECLARE @RowsOfPage AS INT
            DECLARE @MaxTablePage  AS FLOAT 
            SET @PageNumber=".$page."
            SET @RowsOfPage=10       
             SELECT * FROM Lists where ListType='$listcode'
            ORDER BY Code 
            OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
            FETCH NEXT @RowsOfPage ROWS ONLY 
          ";
    
    }
    
    
    
          
      
    
    
       $mysql=sqlsrv_query($conn_hq,$sql);
     while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
          $data[$i]=$row;
          $i++;
       }
    //    $routename;
    
    // return request()->is('MIdentifyWet*');
    //    if(request()->is('MIdentifyStains*') == 1){
    //      $routename='MIdentifyStains';
    //    }else if(request()->is('MIdentifyWet*') == 1){
    //  return $routename='MIdentifyWet';
    //    }else if(request()->is('MIdentifyQantity*') == 1){
    //      $routename='MIdentifyQantity';
    //  }
    
    
    
    
    
                return Datatables::of($data)
    
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
         
                               $btn = '
                                    <div class="btn-group" role="group">
                                    <a href="/ocm_old/Lists/'.utf8_encode($row['ListType']).'/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                     <i class="bx bx-edit"></i>
                                    </a>
                                    <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                    </button>
                                     </div>
                                      ';
        
                                return $btn;
                        }) 
      
    
                        ->setRowId('id')
                        ->rawColumns(['action'])
                        ->make(true);
    
                        
                      
            }
    
            if($id !=''){
    
            $sql2="Select * from Lists where Code='$id'";
           $mysql2=sqlsrv_query($conn_hq,$sql2);
            $count3 = sqlsrv_has_rows($mysql2);
    
            $mydata2=[];
            $j=0;
    
                if($count3 > 0){
    
                while($rows5 = sqlsrv_fetch_array($mysql2, SQLSRV_FETCH_ASSOC) ){
                   $mydata2[$j] = $rows5;
                   $j++;
                }
            } else{
                $mydata2=[''];
            }
    
            }else{
                $mydata2=[''];
            }
    
           $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='$listtype'";
           $mysql3=sqlsrv_query($conn_hq,$sql3);
           $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
           $rows7=$rows6['CodeCount'];
    
    
           // $list=[
           // 'listtype'=>$listtype
           // ];
    
    
        return view('organ')->with('mydata2',$mydata2)->with('rows7',$rows7)->with('listtype',$listtype);
    }
    



public function xlddca(){
    return view('xld');
}
public function microbiology(){
    return view('organism2');
}
public function exttablelist(){
    return view('exttestlist');
}
public function extpenels(){
    return view('extpanels');
}
public function autogenerate(){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

            
    
    return view('autogenerate');
}
public function cougulation($id =Null){
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }  

             $sql="Select * from  CoagTestDefinitions";
            $query=sqlsrv_query($conn_hq,$sql);
            $count2 = sqlsrv_has_rows($query);

                 $mydata=[];
            $i=0;

            if($count2 > 0){

            while($rows4 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC) ){
               $mydata[$i] = $rows4;
               $i++;
            }
        }         
        $mydata2=[];
        $j=0;
        if($id !=''){
            
             $sql2="Select * from  AutoComments where Parameter='$id' ";
            $query2=sqlsrv_query($conn_hq,$sql2);
            $count3 = sqlsrv_has_rows($query2);
    if($count3 > 0){

            while($rows5 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC) ){
               $mydata2[$j] = $rows5;
               $j++;
            }
        }else{
            $mydata2=[''];
        }

            $sql3="Select * from  CoagTestDefinitions where Testname='$id'";
            $query2=sqlsrv_query($conn_hq,$sql3);
            $count3 = sqlsrv_has_rows($query2);
            
            $mydata3=[];
            $k=0;

            if($count3 > 0){

            while($rows5 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC) ){
               $mydata3[$k] = $rows5;
               $k++;
            }

            }

}else{
    $mydata2=[''];
    $mydata3=[''];
}  

    return view('cougulation')->with('mydata',$mydata)->with('mydata2',$mydata2)->with('mydata3',$mydata3);
        }

public function cougulationsave(Request $req){
    
    $code = $req->code;
    $comment = $req->comment;
    $criteria1 = $req->criteria1;
    $criteria2 = $req->criteria2;
    $enddate = $req->enddate;
    $startdate = $req->startdate;
    $value0 = $req->value0;
    $value1 = $req->value1;
    $value2 = $req->value2;
    $currenttime=Carbon::now();
    // return $code;

            if($criteria2 !='' AND $value2 !=''){
            $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'comment' => 'required',
            'enddate' => 'required',
            'startdate' => 'required',
            'criteria2' => 'required',
            'value2' => 'required',

        ]);
          
            }else{
        $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'comment' => 'required',
            'enddate' => 'required',
            'startdate' => 'required',
             'criteria1' => 'required',
          
         

        ]);

          
            }



             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

     // $sql="Select * from AutoComments where Parameter='$code'";
     // $query=sqlsrv_query($conn_hq,$sql);
     // $count2 = sqlsrv_has_rows($query);
            
     // $mydata=[];
     // $i=0;
     $sql2="SELECT MAX(ListOrder) FROM AutoComments";
     $query2=sqlsrv_query($conn_hq,$sql2);
     $data2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
     $data3 = $data2['']+1;
       if ($validator->passes()) {
             // if($count2 > 0){



    
     // }else{
        if($criteria2 !='' AND $value2 !=''){
   
  $sql3="INSERT INTO AutoComments (Discipline,Parameter,Criteria,Value0,Value1,Comment,DateTimeOfRecord,DateStart,DateEnd,ListOrder) values('Coagulation','$code','$criteria2','$value2','0','$comment','$currenttime','$startdate','$enddate','$data3') ";
        }else{
        $sql3="INSERT INTO AutoComments (Discipline,Parameter,Criteria,Value0,Value1,Comment,DateTimeOfRecord,DateStart,DateEnd,ListOrder) values('Coagulation','$code','$criteria1','$value0','$value1','$comment','$currenttime','$startdate','$enddate','$data3') ";
        }
          
      
     // }
      $query3=sqlsrv_query($conn_hq,$sql3);
      return response()->json(['success'=>'Data Updated.']); 
}else{
 return response()->json(['error'=>$validator->errors()->first()]);
}




}


public function netsounds(){
    return view('netsounds');
}
public function decipline($id = Null){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    



            
   if($id !=''){

        $sql="select * from PhoneAlertLevel where Discipline='$id'";
            $query=sqlsrv_query($conn_hq,$sql);
            $count2 = sqlsrv_has_rows($query);
            
            $mydata=[];
            $i=0;

            if($count2 > 0){

            while($rows4 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC) ){
               $mydata[$i] = $rows4;
               $i++;
            }

            }




    }else{
                $mydata=[''];
            }
     
    return view('decipline')->with('mydata',$mydata);
}
public function Phoneparam($id){


     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 


            $sql="select * from PhoneAlertLevel where Parameter='$id' ";
            $query=sqlsrv_query($conn_hq,$sql);
            $count2 = sqlsrv_has_rows($query);
            
            $mydata2=[];
            $j=0;

            if($count2 > 0){

            while($rows4 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC) ){
               $mydata2[$j] = $rows4;
               $j++;
            }


            }
      

    return view('alertparam')->with('mydata2',$mydata2);
}
public function alertsave(Request $req){
    $discipline= $req->descipline;
    $greater= $req->greater;
    $less= $req->less;
    $parameter= $req->parameter;

        $validator = Validator::make($req->all(), [      
            'descipline' => 'required',

        ]);


         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    

            $sql="select * from PhoneAlertLevel where Parameter='$parameter' and Discipline='$discipline'";
            $query=sqlsrv_query($conn_hq,$sql);
            $count2 = sqlsrv_has_rows($query);

             if ($validator->passes()) {

           if($count2 > 0){

            $sql2="update PhoneAlertLevel set Discipline='$discipline',Parameter='$parameter',LessThan='$less',GreaterThan='$greater' where Parameter='$parameter'";
           $query=sqlsrv_query($conn_hq,$sql2);
           }else{

            $sql3="INSERT INTO  PhoneAlertLevel(Discipline,Parameter,LessThan,GreaterThan),values('$discipline','$parameter','$less' ,'$greater') ";
           }
            return response()->json(['success'=>'Data Updated.']); 
       }else{
        return response()->json(['error'=>$validator->errors()->first()]);
       }



}
public function orgname(){

         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 
        $data=[];
        $i=0;
        $site=[];
        $j=0;
        $location=[];
        $k=0;

        $sql="Select * from Organisms";
        $data2=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($data2);
        if($count > 0){
        while($rows=sqlsrv_fetch_array($data2)){
         $data[$i]=$rows;
         $i++;
        }  
        }

        $sql2="Select * from SiteDetails50";
        $data3=sqlsrv_query($conn_hq,$sql2);
        $count2=sqlsrv_has_rows($data3);
        if($count2 > 0){
        while($rows2=sqlsrv_fetch_array($data3)){
         $site[$j]=$rows2;
         $j++;
        }  
        }

        $sql3="select * from Wards";
        $data4=sqlsrv_query($conn_hq,$sql3);
        $count3=sqlsrv_has_rows($data4);
        if($count3 > 0){
        while($rows3=sqlsrv_fetch_array($data4)){
         $location[$k]=$rows3;
         $k++;
        }  
        }

       


    return view('orgname')->with('data',$data)->with('site',$site)->with('location',$location);
}
public function orgnamesave(Request $req){
    return $req;
}
public function errorlist(Request $request,$id=Null){

         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 

        $data=[];
        $er=0;
  if ($request->ajax()) {


   $page = $request->page;


   $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Lists where ListType='ST'
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";
      
     $result =  sqlsrv_query($conn_hq, $sql);


    while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $data[$er] = $rows;
         $er++;
     }


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/ListofError/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }
       $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='ST'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];


       if($id != NULL){

        $sqlget="SELECT * FROM Lists where Code='$id'";
       $mysql=sqlsrv_query($conn_hq,$sqlget);
        
        $rowssend = sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC);
        
        

       }

       else {
        $rowssend = [];
       }
 



    return view('listoferror')->with('rows7',$rows7)->with('rowssend',$rowssend);
}
public function errorsave(Request $req){

    $code = $req->code;
    $text = $req->text;
    $orignalcode=$req->orignalcode;


    $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required'
        ]);

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
        if($orignalcode !=''){
     $sql="Select * from Lists where Code='$orignalcode'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query); 
        }else{
     $sql="Select * from Lists where Code='$code'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);  
        }


 


       if ($validator->passes()) {
        if($count >0){
            
        $sql3="update Lists set Code='$code' , Text='$text' where Code='$orignalcode'";
            sqlsrv_query($conn_hq,$sql3);
        return response()->json(['success'=>'Data Updated Successfully']);
        }else{
            $sql2="SELECT Max(ListOrder) as ListOrder FROM Lists";
            $query2=sqlsrv_query($conn_hq,$sql2);
            $rows= sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
            $listorder=$rows['ListOrder']+1;

            $sql3="Insert into Lists (Code,Text,ListOrder,ListType,InUse) values('$code','$text','$listorder','ST','1')"; 
            sqlsrv_query($conn_hq,$sql3);

        return response()->json(['success'=>'Data Saved Successfully']);
        }
       }else{
         return response()->json(['error'=>$validator->errors()->first()]);
       }




}
public function delerror($id){

         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

   $sql="delete from Lists where Code='$id'";
   sqlsrv_query($conn_hq,$sql);
   return response()->json();
}
public function printers(Request $request,$id=Null){


         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 

        $data=[];
        $er=0;
  if ($request->ajax()) {


   $page = $request->page;


   $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Printers 
        ORDER BY MappedTo 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";
      
     $result =  sqlsrv_query($conn_hq, $sql);


    while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $data[$er] = $rows;
         $er++;
     }


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/Printers/'.utf8_encode($row['MappedTo']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['MappedTo']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }


       $sql3="SELECT COUNT(MappedTo) as CodeCount  FROM Printers";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];


       if($id != NULL){

        $sqlget="SELECT * FROM Printers where MappedTo='$id'";
       $mysql=sqlsrv_query($conn_hq,$sqlget);
        
        $rowssend = sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC);
        
        

       }

       else {
        $rowssend = [];
       }
     

    return view('newprinter')->with('rows7', $rows7)->with('rowssend',$rowssend);
}
public function printersave(Request $req){
    $mapedto=$req->mapedto;
    $printername=$req->printername;
    $orignalmapedto=$req->orignalmapedto;


        $validator = Validator::make($req->all(), [      
            'mapedto' => 'required',
            'printername' => 'required'
        ]);

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
        if($orignalmapedto !=''){
     $sql="Select * from Printers where MappedTo='$orignalmapedto'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query); 
        }else{
     $sql="Select * from Printers where MappedTo='$mapedto'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);  
        }


 


       if ($validator->passes()) {
if($count >0){
$sql3="update Printers set MappedTo='$mapedto' ,PrinterName='$printername' where MappedTo='$orignalmapedto'";
    sqlsrv_query($conn_hq,$sql3);
 return response()->json(['success'=>'Data Updated Successfully']);
}else{

     $sql3="Insert into Printers (MappedTo,PrinterName) values('$mapedto','$printername')"; 
    sqlsrv_query($conn_hq,$sql3);

   return response()->json(['success'=>'Data Saved Successfully']);
}
       }else{
         return response()->json(['error'=>$validator->errors()->first()]);
       }



 
}
public function delprinters($id){

       $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

    $sql="delete from Printers where MappedTo='$id'";
    sqlsrv_query($conn_hq,$sql);
    return response()->json();
}
public function biodefpanels(){
    return view('biodefpanels');
}
public function biodefcodes(){
    return view('biodefcodes');
}
public function clinicianlist(){
    return view('clinicianlist');
}
public function gpsentry(){
    return view('gpsentry');
}
public function  cmtmicrobiology(Request $request, $listtype=Null,$id=Null){

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }  
        $data=[];
        $i=0;
         if ($request->ajax()) {


     $page= $request->page;
     $listtype= $request->listtype;
     $search= $request->search;
if($search !=''){

 $sql=" SELECT * FROM Lists where ListType='$listtype' AND  (Code Like '%$search%' OR Text Like '%$search%' OR InUse Like '%$search%')";
      

}else{

     $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Lists where ListType='$listtype'
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";
      

}



  


   $mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
      $data[$i]=$row;
      $i++;
   }





            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/CmtMicrobiology/'.utf8_encode($row['ListType']).'/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

 $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='$listtype'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];

      $data2=[];
      $j=0;
       if($id!=''){
         $sql4="Select * from Lists where Code='$id'";
      
  


   $mysql4=sqlsrv_query($conn_hq,$sql4);
 while($row4= sqlsrv_fetch_array($mysql4, SQLSRV_FETCH_ASSOC)){
      $data2[$j]=$row4;
      $j++;

   }
       }else{
        $data2=[""];
       }
      



return view('cmtmicrobiology')->with('listtype',$listtype)->with('rows7',$rows7)->with('data2',$data2);
}
public function CmtMicrobiologyUpdate(Request $req){

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        } 

$code=$req->code;
$text=$req->text;
$listtype=$req->listType; 
$hidecode=$req->hidecode; 

   $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required',
            'listType' => 'required'

        ]);

        if ($validator->passes()) {
     $sql3="update Lists set Code='$code',Text='$text',ListType='$listtype' where Code='$hidecode'";
  sqlsrv_query($conn_hq,$sql3);
    return response()->json(['success'=>'Data Updated Successfully']);
        }
            else{
 return response()->json(['error'=>$validator->errors()->first()]);
            }


}
public function CmtMicrobiologydel($id){

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        } 
$sql="delete from Lists where Code='$id'";
sqlsrv_query($conn_hq,$sql);
return response()->json();
}
public function cmtmicrobiologysave(Request $req){
$code=$req->code;
$text=$req->text;
$listtype=$req->listType;

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
 

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        } 

    $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required',
            'listType' => 'required'

        ]);

    $sql="select * from Lists where Code='$code'";
    $query=sqlsrv_query($conn_hq,$sql);
    $count2 = sqlsrv_has_rows($query);

    $sql2="SELECT Max(ListOrder) as ListOrder FROM Lists";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $rows= sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
    $listorder=$rows['ListOrder']+1;



if ($validator->passes()) {

if($count2 ==''){

  $sql3="INSERT INTO Lists (Code,Text,InUse,ListType,ListOrder) values('$code','$text','1','$listtype','$listorder') ";
  sqlsrv_query($conn_hq,$sql3);

   return response()->json(['success'=>'Data Saved Successfully']);

     }else{
 return response()->json(['error'=>'This Code Already Exist']);
     }
}else{
 return response()->json(['error'=>$validator->errors()->first()]);
}




}
public function cmtbiochemistry(){
    return view('cmtbiochemistry');
}
public function cmthaematology(){
    return view('cmthaematology');
}
public function cmtcoagulation(){
    return view('cmtcoagulation');
}
public function cmtdemographics(){
    return view('cmtdemographics');
}
public function cmtsemen(){
    return view('cmtsemen');
}
public function cmtclinical(){
    return view('cmtclinical');
}
public function lochostpital(Request $request, $id = NULL){

 $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 

     $data = [];
     $hosp = 0;

     
 
  
   

  if ($request->ajax()) {


   $page = $request->page;
   $search = $request->search;
   if($search !=''){

  $sql=" SELECT * FROM Lists where ListType='HO' AND  (Code Like '%$search%' OR Text Like '%$search%')";

   }else{

       $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Lists where ListType='HO'
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";

   }



      
     $result =  sqlsrv_query($conn_hq, $sql);


    while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $data[$hosp] = $rows;
         $hosp++;
     }


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/LocHostpital/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }





      $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='HO'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];


       if($id != NULL){

        $sqlget="SELECT * FROM Lists where Code='$id'";
       $mysql=sqlsrv_query($conn_hq,$sqlget);
        
        $rowssend = sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC);
        
        

       }

       else {
        $rowssend = [];
       }


    return view('hospital')->with('rows7', $rows7)->with('rowssend', $rowssend);
}


public function lochostpitalsave(Request $request){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 

        $code = $request->code;
        $hospital = $request->hospitalname;

   $validator = Validator::make($request->all(), [      
            'code' => 'required',
            'hospitalname' => 'required'

        ]);


      $sql3="SELECT *  FROM Lists where Code='$code'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $count = sqlsrv_has_rows($mysql3);


  $sql2="SELECT MAX(ListOrder) FROM Lists";
     $query2=sqlsrv_query($conn_hq,$sql2);
     $data2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
     $data3 = $data2['']+1;


        if ($validator->passes()) {
      
       if ($count == '' ){

      $sqlinsert="INSERT into Lists(Code, Text, InUse,ListType, ListOrder) values ('$code', '$hospital','1', 'HO', '$data3')";
       sqlsrv_query($conn_hq,$sqlinsert);
        return response()->json(['success'=>'Data Saved Successfully']);
       }
       else {

        return response()->json(['error'=>'This Code Already Exist']);
       }
}

else {
    return response()->json(['error'=>$validator->errors()->first()]);
}
    

}



public function lochostpitalupd(Request $req) {
    

$code=$req->code;
$text=$req->hospitalname;
$originalcode=$req->originalcode;

 $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'hospitalname' => 'required'

        ]);


$conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }
if ($validator->passes()) {
$sql ="update Lists set Code='$code', Text='$text',ListType='HO' where Code='$originalcode'";

sqlsrv_query($conn_hq,$sql);
      return response()->json(['success'=>'Data Updated.']); 
  }else{
    return response()->json(['error'=>$validator->errors()->first()]);
  }

}


public function LocHostpitaldel($id) {
    
$conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }


$sql ="DELETE from Lists where Code='$id'";
sqlsrv_query($conn_hq,$sql);

return response()->json();

}



public function locwardlist(){
    return view('newward');
}




public function coagulationtmp(){


     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 


     $coagtemp = [];
     $coag = 0;

     
     $sql = "SELECT * from CommentsTemplate where Department = 'C'";
     $result= sqlsrv_query( $conn_hq, $sql);
  
     while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $coagtemp[$coag] = $rows;
         $coag++;
     }

 
   

    return view('congulation')->with('coagtemp', $coagtemp);
}








public function CoagulationTmpid(Request $request) {

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    



    $comment = $request->comment;

    $sql = "SELECT * from CommentsTemplate where Department = 'C' and CommentName = '$comment'";
    $result= sqlsrv_query( $conn_hq, $sql);
  

     if($result){
        $rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $commenttemplate = $rows['CommentTemplate'];
        $checkactive = $rows['Inactive'];
     

        return response()->json(['success'=>true, 'commenttemp'=>$commenttemplate, 'checkactive' => $checkactive ]);
     }

}



public function CoagulationTmpsave(Request $request) {

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    

   
    $comment = $request->Comment_Template;
     $inactive = $request->inactive;


    if($inactive == ''){
        $inactive = 0;
    }
   


    $username = Auth::user()->name;
    $datetime = date("d/M/Y h:i:s");
    $commentid = $request->commentid;

    $sql = "UPDATE CommentsTemplate set CommentTemplate = '$comment',Inactive='$inactive',Username = '$username',DateTimeOfRecord='$datetime' where Department = 'C' and CommentID = '$commentid'";
    $result= sqlsrv_query($conn_hq, $sql);

    if($result){
        return response()->json(['success'=>true]);
    }
  
}



public function biochemtmp(){


     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    



     $biotemp = [];
     $bio = 0;

     
     $sql = "SELECT * from CommentsTemplate where Department = 'B'";
     $result= sqlsrv_query( $conn_hq, $sql);
  
     while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $biotemp[$bio] = $rows;
         $bio++;
     }

   

    return view('biochemtmp')->with('biotemp', $biotemp);
   
}




public function BiochemTmpid(Request $request) {

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     


    $comment = $request->comment;

    $sql = "SELECT * from CommentsTemplate where Department = 'B' and CommentName = '$comment'";
    $result= sqlsrv_query( $conn_hq, $sql);
  

     if($result){
        $rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $commenttemplate = $rows['CommentTemplate'];
        $checkactive = $rows['Inactive'];
        return response()->json(['success'=>true, 'commenttemp'=>$commenttemplate, 'checkactive'=>$checkactive]);
     }

}



public function BiochemTmpsave(Request $request) {

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    

   
    $comment = $request->Comment_Template;
     $inactive = $request->inactive;


    if($inactive == ''){
        $inactive = 0;
    }
   


    $username = Auth::user()->name;
    $datetime = date("d/M/Y h:i:s");
    $commentid = $request->commentid;

    $sql = "UPDATE CommentsTemplate set CommentTemplate = '$comment',Inactive='$inactive',Username = '$username',DateTimeOfRecord='$datetime' where Department = 'B' and CommentID = '$commentid'";
    $result= sqlsrv_query($conn_hq, $sql);

    if($result){
        return response()->json(['success'=>true]);
    }
  
}



public function specimensources(Request $request,$id=null) {

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        } 

        $data=[];
        $er=0;
  if ($request->ajax()) {


   $page = $request->page;


   $sql="
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10       
         SELECT * FROM Lists where ListType='MB'
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
        FETCH NEXT @RowsOfPage ROWS ONLY 
      ";
      
     $result =  sqlsrv_query($conn_hq, $sql);


    while($rows= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
         $data[$er] = $rows;
         $er++;
     }


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm_old/specimensources/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }
       $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='MB'";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['CodeCount'];


       if($id != NULL){

        $sqlget="SELECT * FROM Lists where Code='$id'";
       $mysql=sqlsrv_query($conn_hq,$sqlget);
        
        $rowssend = sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC);
        
        

       }

       else {
        $rowssend = [];
       }
     
 


    return view('specimensources')->with('rows7', $rows7)->with('rowssend',$rowssend);
}


public function savespecimen(Request $req)
{
    $code =  $req->code;
    $text =  $req->text;
    $orignalcode =  $req->orignalcode;


        $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required'
        ]);

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
    if($orignalcode !=''){
     $sql="Select * from Lists where Code='$orignalcode'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query); 
        }else{
     $sql="Select * from Lists where Code='$code'";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);  
        }


 


if ($validator->passes()) {
if($count >0){
$sql3="update Lists set Code='$code' , Text='$text' where Code='$orignalcode'";
    sqlsrv_query($conn_hq,$sql3);
 return response()->json(['success'=>'Data Updated Successfully']);
}else{

    $sql2="SELECT Max(ListOrder) as ListOrder FROM Lists";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $rows= sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
    $listorder=$rows['ListOrder']+1;

     $sql3="Insert into Lists (Code,Text,ListOrder,ListType,InUse) values('$code','$text','$listorder','MB','1')"; 
    sqlsrv_query($conn_hq,$sql3);

   return response()->json(['success'=>'Data Saved Successfully']);
}
       }else{
         return response()->json(['error'=>$validator->errors()->first()]);
       }



}
public function Delspecimen($id){
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
                 die( print_r( sqlsrv_errors(), true));
            }
           
           $sql="delete from Lists where Code='$id'";
           sqlsrv_query($conn_hq ,$sql);
           return response()->json();
}

public function murinecrystal(){
    return view('murinecrystal');
}
public function midentifywet(){
    return view('midentifywet');
}
public function midentifyqantity(){
    return view('midentifyqantity');
}
public function murinecasts(){
    return view('murinecasts');
}
public function murinemiscell(){
    return view('murinemiscell');
}
public function smac(){
    return view('smac');
}
public function preston(){
    return view('preston');
}
public function saveauto(Request $req){
    $code = $req->code;
    $comment = $req->comment;
    $criteria1 = $req->criteria1;
    $criteria2 = $req->criteria2;
    $enddate = $req->enddate;
    $startdate = $req->startdate;
    $value0 = $req->value0;
    $value1 = $req->value1;
    $value2 = $req->value2;
    $currenttime=Carbon::now();
    // return $code;

            if($criteria2 !='' AND $value2 !=''){
            $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'comment' => 'required',
            'enddate' => 'required',
            'startdate' => 'required',
            'criteria2' => 'required',
            'value2' => 'required',

        ]);
          
            }else{
        $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'comment' => 'required',
            'enddate' => 'required',
            'startdate' => 'required',
             'criteria1' => 'required',
          
         

        ]);

          
            }



             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     
            
           

     // $sql="Select * from AutoComments where Parameter='$code'";
     // $query=sqlsrv_query($conn_hq,$sql);
     // $count2 = sqlsrv_has_rows($query);
            
     // $mydata=[];
     // $i=0;
     $sql2="SELECT MAX(ListOrder) FROM AutoComments";
     $query2=sqlsrv_query($conn_hq,$sql2);
     $data2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
     $data3 = $data2['']+1;
       if ($validator->passes()) {
             // if($count2 > 0){
        if($code !='' AND $comment !='' AND $enddate !='' AND $startdate !=''){
                    if($criteria2 !='' AND $value2 !='' ){
                  $sql3="update  AutoComments set Discipline='Biochemistry',Criteria='$criteria2',Value0='$value2',Value1='0',Comment='$comment', DateTimeOfRecord='$currenttime',DateStart='$startdate',DateEnd='$enddate' where Parameter='$code' ";
         }
            else{
                      $sql3="update  AutoComments set Discipline='Biochemistry',Criteria='$criteria1',Value0='$value0',Value1='$value1',Comment='$comment', DateTimeOfRecord='$currenttime',DateStart='$startdate',DateEnd='$enddate' where Parameter='$code' ";
            } 
        }


    
     // }else{
        if($criteria2 !='' AND $value2 !=''){
   
  $sql3="INSERT INTO AutoComments (Discipline,Parameter,Criteria,Value0,Value1,Comment,DateTimeOfRecord,DateStart,DateEnd,ListOrder) values('Biochemistry','$code','$criteria2','$value2','0','$comment','$currenttime','$startdate','$enddate','$data3') ";
        }else{
        $sql3="INSERT INTO AutoComments (Discipline,Parameter,Criteria,Value0,Value1,Comment,DateTimeOfRecord,DateStart,DateEnd,ListOrder) values('Biochemistry','$code','$criteria1','$value0','$value1','$comment','$currenttime','$startdate','$enddate','$data3') ";
        }
          
      
     // }
      $query3=sqlsrv_query($conn_hq,$sql3);
      return response()->json(['success'=>'Data Updated.']); 
}else{
 return response()->json(['error'=>$validator->errors()->first()]);
}




}
public function bloodgas(){
    return view('bloodgas');
}
public function bloodgassave(Request $req){

$o2shigh =$req->o2shigh;
$o2slow  =$req->o2slow;
$behigh =$req->behigh;
$below =$req->below;
$hco3high =$req->hco3high;
$hco3low =$req->hco3low;
$pco2high =$req->pco2high;
$pco2low =$req->pco2low;
$phhigh =$req->phhigh;
$phlow =$req->phlow;
$po2high =$req->po2high;
$po2low =$req->po2low;
$totco2high =$req->totco2high;
$totco2low =$req->totco2low;

$amendedby=Auth::user()->name;
$currentdattime=Carbon::now()->format('Y-m-d h:i:s');

$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     


            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }  

//         if($o2shigh !='' AND $o2slow!=''){

//         $validator = Validator::make($req->all(), [      
//             'o2shigh' => 'required',
//             'o2slow' => 'required',

//         ]);

// }else if($behigh !='' AND $below!=''){

//         $validator = Validator::make($req->all(), [      
//             'behigh' => 'required',
//             'below' => 'required',
         

//         ]);


// }else if($hco3high !='' AND $hco3low !=''){


//         $validator = Validator::make($req->all(), [      
//             'hco3high' => 'required',
//             'hco3low' => 'required',
          
         

//         ]);

// }else if($pco2high !='' AND $pco2low !=''){


//         $validator = Validator::make($req->all(), [      
//             'pco2high' => 'required',
//             'pco2low' => 'required',
         

//         ]);

// }else if($phhigh !='' AND $phlow !=''){


//         $validator = Validator::make($req->all(), [      
//             'phhigh' => 'required',
//             'phlow' => 'required' ,

//         ]);
// }else if($po2high !='' AND $po2low){

//         $validator = Validator::make($req->all(), [      
//             'po2high' => 'required',
//             'po2low' => 'required',

//         ]);

// }else if($totco2high !='' AND $totco2low !='') {
    
//         $validator = Validator::make($req->all(), [      
//             'totco2high' => 'required',
//             'totco2low' => 'required',
          
//         ]);

// }


   // if ($validator->passes()) {


if($o2shigh !='' AND $o2slow!=''){
    $sql="insert into BGADefinitions (O2SAT,O2SATLow,O2SATHigh,DateTimeAmended,AmendedBy) values('O2SAT','$o2slow','$o2shigh','$currentdattime','$amendedby')";

}else if($behigh !='' AND $below!=''){

$sql="insert into BGADefinitions (BE,BELow,BEHigh,DateTimeAmended,AmendedBy) values('BE','$below','$behigh','$currentdattime','$amendedby')";

}else if($hco3high !='' AND $hco3low !=''){

$sql="insert into BGADefinitions (HCO3,HCO3Low,HCO3High,DateTimeAmended,AmendedBy) values('HCO3','$hco3low','$hco3high','$currentdattime','$amendedby')";

}else if($pco2high !='' AND $pco2low !=''){

$sql="insert into BGADefinitions (PCO2,PCO2Low,PCO2High,DateTimeAmended,AmendedBy) values('PCO2','$pco2low','$pco2high','$currentdattime','$amendedby')";


}else if($phhigh !='' AND $phlow !=''){

$sql="insert into BGADefinitions (pH,pHLow,pHHigh,DateTimeAmended,AmendedBy) values('pH','$phlow','$phhigh','$currentdattime','$amendedby')";

}else if($po2high !='' AND $po2low){

$sql="insert into BGADefinitions (PO2,PO2Low,PO2High,DateTimeAmended,AmendedBy) values('PO2','$po2low','$po2high','$currentdattime','$amendedby')";

}else if ($totco2high !='' AND $totco2low !='') {
    
$sql="insert into BGADefinitions (TotCO2,TotCO2Low,TotCO2High,DateTimeAmended,AmendedBy) values('TotCO2','$totco2low','$totco2high','$currentdattime','$amendedby')";

}
sqlsrv_query($conn_hq,$sql);
return response()->json(['success'=>'Data Added Successfully.']); 
 //}else{
//  return response()->json(['error'=>$validator->errors()->first()]);
// }

}
public function bloodgastabel(Request $request){


$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     


            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }  
        $data=[];
        $i=0;
             if ($request->ajax()) {
   $sql="Select * from BGADefinitions";
   $mysql=sqlsrv_query($conn_hq,$sql);
 while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
      $data[$i]=$row;
      $i++;
   }


            return Datatables::of($data)

                    ->setRowId('id')
                    ->rawColumns([])
                    ->make(true);

                    
                  
        }

    return view('bloodgastabel');
}
public function orgaism2save(Request $req){

$code=$req->code;
$text=$req->text;
$listType=$req->listType;
 $inuse=1;
$conn_hq = \App\Http\Controllers\Controller::SQLConnect();     


        $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required',
            'listType' => 'required'
          

        ]);

            
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }
        $sql="SELECT max(ListOrder) FROM Lists";
        $sql1=sqlsrv_query($conn_hq,$sql);
        $rows4 = sqlsrv_fetch_array($sql1, SQLSRV_FETCH_ASSOC);
        $listorder=$rows4[''] + 1;


     $sql2="SELECT * FROM Lists where Code='$code'";
        $sql3=sqlsrv_query($conn_hq,$sql2);
      
        $count2 = sqlsrv_has_rows($sql3);

            $mydata=[];
            $i=0;

            if($count2 > 0){

            while($rows6 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC) ){
               $mydata[$i] = $rows6;
               $i++;
            }
        }

       // $mydata[0]['Text'];


   if ($validator->passes()) {

            if($count2 ==''){
       
        $sql="insert into Lists(Code,Text,ListType,ListOrder,InUse) values('$code','$text','$listType','$listorder','$inuse')";
        sqlsrv_query($conn_hq,$sql);
      return response()->json(['success'=>'Data Save.']); 
  }else{
     return response()->json(['error'=>'Data Already Exist']);
  }
}else{
 return response()->json(['error'=>$validator->errors()->first()]);
}


}
public function orgaism2update(Request $req){

$code=$req->code;
$text=$req->text;
$listType=$req->listType;
$inuse=1;
$orignalcode=$req->orignalcode;

 $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'text' => 'required',
            'listType' => 'required'
          

        ]);


$conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }

if ($validator->passes()) {

 $sql ="update Lists set Code='$code', Text='$text',ListType='$listType' where Code='$orignalcode'";

sqlsrv_query($conn_hq,$sql);
      return response()->json(['success'=>'Data Updated.']); 
  }else{
    return response()->json(['error'=>$validator->errors()->first()]);
  }

}
public function orgaismdel($id){
   
 $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
        }
    
        
  $sql="delete from Lists where Code='$id'";
  sqlsrv_query($conn_hq,$sql);  
  return response()->json();      
}


// public function checkroute(Request $request){

//      $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
// if(!$conn_hq) {
//     die( print_r( sqlsrv_errors(), true));
//         }

//         $mydata=[];
//         $i = 0;



//     $sql = "DECLARE @PageNumber AS INT
//             DECLARE @RowsOfPage AS INT
//         DECLARE @MaxTablePage  AS FLOAT 
//         SET @PageNumber=2
//         SET @RowsOfPage=10
//         SELECT @MaxTablePage = COUNT(*) FROM Lists
//         SET @MaxTablePage = CEILING(@MaxTablePage/@RowsOfPage)
//         WHILE @MaxTablePage >= @PageNumber
//         BEGIN
//          SELECT Code FROM Lists
//         ORDER BY Code 
//         OFFSET (@PageNumber-1)*@RowsOfPage ROWS
//         FETCH NEXT @RowsOfPage ROWS ONLY
//         SET @PageNumber = @PageNumber + 1
//         END";


//        $results =  sqlsrv_query($conn_hq,$sql);

//         while($rows = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC) ){
//                $mydata[$i] = $rows;
//                $i++;
//             }

   

//             return $mydata;
// }
}


