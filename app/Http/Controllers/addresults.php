<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Validator;
use DataTables;
use DB;

class addresults extends Controller
{
    


    public function autocom($sampleid= NULL, $Code=NULL, $res = NULL) {

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }

  


    $sql = "Select * from AutoComments where Parameter = '$Code'";
    $result = sqlsrv_query($conn_hq, $sql);

    $count = sqlsrv_has_rows($result);

    if($count > 0 ){
    
        $rows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        $value0 = $rows['Value0'];
        $value1 = $rows['Value1'];
        $criteria = $rows['Criteria'];
        $comment = $rows['Comment'];
        $discipline = $rows['Discipline'];

        if ($criteria == 'Equal To'){

            if($res == $value0){
               
                $obssave = "INSERT into Observations (SampleID, Comment, Discipline) values ('$sampleid', '$comment', '$discipline')";
                sqlsrv_query($conn_hq, $obssave);
            }
        }

        elseif ($criteria == 'Start With'){
            if( $res >= $value0){
                $obssave = "INSERT into Observations (SampleID, Comment) values ('$sampleid', '$comment')";
                sqlsrv_query($conn_hq, $obssave);
            }
        }

        elseif($criteria == 'Between'){
            if( $res < $value1 && $res > $value0){
                $obssave = "INSERT into Observations (SampleID, Comment) values ('$sampleid', '$comment')";
                sqlsrv_query($conn_hq, $obssave);
            }
        }

        

    }

    }






    public function CheckSample($sampleid = ''){ 


       $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     

        $sql1="select * from demographics where SampleID = '$sampleid'";
        $results0 = sqlsrv_query( $conn_hq, $sql1);
    
        return $count1 = sqlsrv_has_rows($results0);



    }







    public function sidsend2(Request $request,$tab = '', $id = ''){

        // return 1;
        $sid = $id;
        $rows = [];
        $rowsph = [];
        // $alldata=[];
        $rowsocm2=[];
        $biodata=[];
        $b=0;
        $extdata=[];
        $d=0;
        $coagdata=[];
        $e=0;
        $haemdata=[];
        $f=0;
        $fetch=[];

        $copyto=[];
        $to=0;
      
    
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }
    $wardsql = "SELECT Top(100) COUNT(Text), Text FROM Wards GROUP BY Text";
    $wardcom = sqlsrv_query( $conn_hq, $wardsql);
    $countward = sqlsrv_has_rows($wardcom);

    $getwards=0;
    if($countward > 0){

        while($rowsward = sqlsrv_fetch_array($wardcom, SQLSRV_FETCH_ASSOC)){

            $wardsarray[$getwards] = $rowsward['Text'];
            $getwards++;

        }
    }
    $clisql = "SELECT Top(100) COUNT(Text), Text FROM Clinicians GROUP BY Text";
    $clicom = sqlsrv_query( $conn_hq, $clisql);
    $countcli = sqlsrv_has_rows($clicom);
    $getcli=0;
    if($countcli > 0){
if($getcli<=100){
        while($rowscli = sqlsrv_fetch_array($clicom, SQLSRV_FETCH_ASSOC)){

            $cliarray[$getcli] = $rowscli['Text'];
            $getcli++;

        }
    }}
    
    $site="Select site from SiteDetails50";
    $sited = sqlsrv_query( $conn_hq, $site);
    $siterows = sqlsrv_has_rows($sited);
    $site50=[];
    $getcl=0;
    if($siterows>0){
        while($sitedetails = sqlsrv_fetch_array($sited, SQLSRV_FETCH_ASSOC)){

            $site50[$getcl] = $sitedetails['site'];
            $getcl++;

        }

    }
    // return $site50;

    $gpsql = "SELECT Top(100) COUNT(Text), Text FROM gps GROUP BY Text";
    $resultgp = sqlsrv_query( $conn_hq, $gpsql);
    $countgp = sqlsrv_has_rows($resultgp);
    $getgp=0;
    if($countgp > 0){

        while($rowsgp = sqlsrv_fetch_array($resultgp, SQLSRV_FETCH_ASSOC)){

            $getgparray[$getgp] = $rowsgp['Text'];
            $getgp++;

        }
    }
        // return $sid;
        $rows=[];
        $rows2="";
        $count2=0;
        $count1=0;
    
        $haem = 0;
        
        $biop="select Distinct(PanelName) from Panels"; 
$bi = sqlsrv_query( $conn_hq, $biop);
$bparr=[];
$a=0;
while ($bprow = sqlsrv_fetch_array($bi, SQLSRV_FETCH_ASSOC)){
    $bparr[$a] = $bprow['PanelName']; 
    $a++;
    }
    
$cp="Select PanelName from CoagPanels union select PanelName from HaePanels "; 
$bi2 = sqlsrv_query( $conn_hq, $cp);
$bparr2=[];
$a5=0;
while ($bprow2 = sqlsrv_fetch_array($bi2, SQLSRV_FETCH_ASSOC)){
    $bparr2[$a5] = $bprow2['PanelName']; 
    $a5++;
    }


    $extp="select Distinct(PanelName) from Extpanels"; 
    $ext = sqlsrv_query( $conn_hq, $extp);
    $ex=[];
    $e=0;
    while ($bprow6 = sqlsrv_fetch_array($ext, SQLSRV_FETCH_ASSOC)){
        $ex[$e] = $bprow6['PanelName']; 
        $e++;
        }
        if($sid != '')
        {

        
        $haemarray = [];
    
    // $connectionInfo_hq = array("Database"=>"CavanTest", "Uid"=>"LabUser", "PWD"=>"DfySiywtgtw$1>)*",'ReturnDatesAsStrings'=> true);
    //         $conn_hq = sqlsrv_connect('CHLAB02', $connectionInfo_hq);

       

            // $getgp = 0;
            // $getgparray = [];

            // $getque = 0;
            // $ocmque = [];


            // $getcom = 0;
            // $ocmcom = [];

            // $getwards = 0;
            // $wardsarray = [];


            // $getcli = 0;
            // $cliarray = [];


            $getpho = 0;
            $phoarray = [];

            // $wardsql = "SELECT COUNT(Text), Text FROM Wards GROUP BY Text";
            // $wardcom = sqlsrv_query( $conn_hq, $wardsql);
            // $countward = sqlsrv_has_rows($wardcom);
        
            // $getwards=0;
            // if($countward > 0){
        
            //     while($rowsward = sqlsrv_fetch_array($wardcom, SQLSRV_FETCH_ASSOC)){
        
            //         $wardsarray[$getwards] = $rowsward['Text'];
            //         $getwards++;
        
            //     }
            // }

            // $clisql = "SELECT COUNT(Text), Text FROM Clinicians GROUP BY Text";
            // $clicom = sqlsrv_query( $conn_hq, $clisql);
            // $countcli = sqlsrv_has_rows($clicom);

            // if($countcli > 0){

            //     while($rowscli = sqlsrv_fetch_array($clicom, SQLSRV_FETCH_ASSOC)){

            //         $cliarray[$getcli] = $rowscli['Text'];
            //         $getcli++;

            //     }
            // }



         


            // $comsql = "SELECT * from Lists where ListType = 'DE'";
            // $resultcom = sqlsrv_query( $conn_hq, $comsql);
            // $countcom = sqlsrv_has_rows($resultcom);

            // if($countcom > 0){

            //     while($rowscom = sqlsrv_fetch_array($resultcom, SQLSRV_FETCH_ASSOC)){

            //         $ocmcom[$getcom] = $rowscom['Text'];
            //         $getcom++;

            //     }
            // }


            $phosql = "SELECT * from Lists where ListType = 'PhoneComment'";
            $resultspho = sqlsrv_query( $conn_hq, $phosql);
            $countpho = sqlsrv_has_rows($resultspho);

            if($countpho > 0){

                while($rowspho = sqlsrv_fetch_array($resultspho, SQLSRV_FETCH_ASSOC)){

                    $phoarray[$getpho] = $rowspho['Text'];
                    $getpho++;

                }
            }




            // $gpsql = "SELECT * From gps";
            // $resultgp = sqlsrv_query( $conn_hq, $gpsql);
            // $countgp = sqlsrv_has_rows($resultgp);

            // if($countgp > 0){

            //     while($rowsgp = sqlsrv_fetch_array($resultgp, SQLSRV_FETCH_ASSOC)){

            //         $getgparray[$getgp] = $rowsgp['Text'];
            //         $getgp++;

            //     }
            // }


            // $ocmsql = "SELECT * From ocmRequestDetails Where SampleID = '$sid'";
            // $resultocm = sqlsrv_query( $conn_hq, $ocmsql);
            // $countocm = sqlsrv_has_rows($resultocm);

            // if($countocm > 0){
        //     $rowsocm = sqlsrv_fetch_array($resultocm, SQLSRV_FETCH_ASSOC);

        //     $ccc=0;

        //     $reqid = $rowsocm['RequestID'];
        //     $addr3="Select * from patientifs where Chart='$reqid'";
        //     $data = sqlsrv_query( $conn_hq, $addr3);
        //     $data = sqlsrv_has_rows($data);
        //     if($data>0){
        //     while($patient = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)){

        //         $alldata[$ccc] = $patient['Text'];
        //         $ccc++;

        //     }
        // }


            // $ocmsql2 = "SELECT * From ocmRequest Where RequestID = '$reqid'";
            // $resultocm2 = sqlsrv_query( $conn_hq, $ocmsql2);
            // $countocm2 = sqlsrv_has_rows($resultocm2);

            // if($countocm2 > 0){
            //     $rowsocm2 = sqlsrv_fetch_array($resultocm2, SQLSRV_FETCH_ASSOC);
                
            // }
           

            // $ocmquestion = "SELECT * From ocmQuestions Where rid = '$reqid'";
            // $resultque = sqlsrv_query( $conn_hq, $ocmquestion);
            // $countque = sqlsrv_has_rows($resultque);

            // if($countque > 0){

            //     while($rowsque = sqlsrv_fetch_array($resultque, SQLSRV_FETCH_ASSOC)){
                    
            //         $ocmque[$getque] = $rowsque;
            //         $getque++;
            //     }
            // }


        // }

       
             $sqlph = "SELECT * From PhoneLog Where SampleID = '$sid'";
            $resultsph = sqlsrv_query( $conn_hq, $sqlph);
            $countph = sqlsrv_has_rows($resultsph);

            if($countph > 0){
            $rowsph = sqlsrv_fetch_array($resultsph, SQLSRV_FETCH_ASSOC);
            }

         

    
        
        $sql1="select * from demographics where SampleID = '$sid'";
        $results0 = sqlsrv_query( $conn_hq, $sql1);
    
        $count1 = sqlsrv_has_rows($results0);
     $rows = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);
        
            
            if($count1 == '') {

                $rows = [];
            }
      

    
        $array = [];
        $m=0;
    
        
    
          $sql = "SELECT CONCAT('Bio','chemistry') as dept,
         BioRequests.Code,
		 ocmMapping.SourceValue
         from BioRequests inner join ocmMapping on ocmMapping.TargetValue = BioRequests.Code and  BioRequests.SampleID = '$sid'";
        $results = sqlsrv_query( $conn_hq, $sql);
        
        $count3 = sqlsrv_has_rows($results);
    
        if($count3>0){
            while ($rows1 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)){
                $array[$m] = $rows1;
                $m++;
            }
        } 

        


    
    
    // HAEMRESULTS
    
        // $sqlhaem = "Select * from HaemResults50 where SampleID = '$sid'";
        $sqlhaem = "SELECT CONCAT('Haem','atology') as dept,
        HaeRequests.Code,
        ocmMapping.SourceValue
        from HaeRequests inner join ocmMapping on ocmMapping.TargetValue = HaeRequests.Code and HaeRequests.SampleID = '$sid'";

        $haemres = sqlsrv_query( $conn_hq, $sqlhaem);
    
        $haemcount = sqlsrv_has_rows($haemres);
        
        if ($haemcount >0){
    
        while ($haemrows = sqlsrv_fetch_array($haemres, SQLSRV_FETCH_ASSOC)){
    
            $haemarray[$haem] = $haemrows; 
            $haem++;
        }
    }
    
    
    
    
    // EXTResults
    $extarray = [];
    $extcount = 0;
    $ext = 0;
    $sqlext = "Select * from ExtResults where SampleID = '$sid'";
    $extres = sqlsrv_query( $conn_hq, $sqlext);
    
    if($extres){
    
    $extcount = sqlsrv_has_rows($extres);
    
    if ($extcount >0){
    
    while ($extrows = sqlsrv_fetch_array($extres, SQLSRV_FETCH_ASSOC)){
        $extarray[$ext] = $extrows; 
        $ext++;
    }
    }
    
    }
    
    
    
    // CoagResults
    $coagarray = [];
    $coag = 0;
    $coagcount = 0;
    // $sqlcoag = "Select * from CoagResults where SampleID = '$sid'";
 $sqlcoag = "SELECT CONCAT('Coag','ulation') as dept,
 CoagRequests.Code,
 ocmMapping.SourceValue
 from CoagRequests inner join ocmMapping on ocmMapping.TargetValue = CoagRequests.Code and CoagRequests.SampleID = '$sid'";

    $coagres = sqlsrv_query( $conn_hq, $sqlcoag);
    
    if($coagres) {
    $coagcount = sqlsrv_has_rows($coagres);
    
    if ($coagcount >0){
    
    while ($coagrows = sqlsrv_fetch_array($coagres, SQLSRV_FETCH_ASSOC)){
    $coagarray[$coag] = $coagrows; 
    $coag++;
    }
    }
    }
    


   $sql11="SELECT  BioRequests.SampleID,BioRequests.Code,BioRequests.DateTime,BioRequests.SampleType,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.AMS,BioRequests.DateTimeOfRecord,BioTestDefinitions.shortname, BioTestDefinitions.PrintPriority FROM BioRequests  LEFT JOIN BioTestDefinitions  ON BioRequests.Code = BioTestDefinitions.Code WHERE BioRequests.SampleID = '$sid'   
 GROUP BY BioRequests.SampleID,BioRequests.Code,BioRequests.DateTime,BioRequests.SampleType,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.AMS,BioRequests.DateTimeOfRecord,BioTestDefinitions.shortname,BioTestDefinitions.PrintPriority ORDER BY BioTestDefinitions.PrintPriority";

    // $sql11="Select * from BioRequests  where SampleID='$sid' ";
    $query11=sqlsrv_query($conn_hq,$sql11);
    $count11=sqlsrv_has_rows($query11);

 $biodata2=[];
    $b=0;
    if($count11 > 0){
while($rows11=sqlsrv_fetch_array($query11)){

$biodata2[$b]=$rows11;
$b++;




}
}
$biodata=[];
$k=0;

foreach($biodata2 as $biodata2s){
$code=$biodata2s['Code'];


 $sql14="Select * from BioResults where SampleID ='$sid' AND Code='$code'";
$query11=sqlsrv_query($conn_hq,$sql14);
$count11=sqlsrv_has_rows($query11);
if($count11 > 0){
$rows12=sqlsrv_fetch_array($query11);
$result12=$rows12['result']; 
if($result12 == NULL){
$biodata[$k]=$biodata2s;
$k++;
}  
}else{
$biodata[$k]=$biodata2s;
$k++;
}
}


 





$extdata2=[];
$d2 = 0;

//  $sql12="SELECT * from Biomnisrequests LEFT JOIN ExternalDefinitions ON Biomnisrequests. where SampleID='$sid' ";
  $sql12 = "SELECT * from Biomnisrequests LEFT JOIN ExternalDefinitions on Biomnisrequests.TestCode=ExternalDefinitions.BiomnisCode where SampleID='$sid' ORDER BY PrintPriority";

    $query12=sqlsrv_query($conn_hq,$sql12);
    $count12=sqlsrv_has_rows($query12);

 // $biodata;
 //    $b=0;
    if($count12 > 0){
while($rows12=sqlsrv_fetch_array($query12)){

$extdata2[$d2]=$rows12;
$d2++;
}

    }
            $d = 0;

    foreach($extdata2 as $extdata2s){
  $analyte2 = $extdata2s['TestCode'];   
$sqlext="select * from Extresults where SampleID='$sid' AND Analyte='$analyte2'";
$query23=sqlsrv_query($conn_hq,$sqlext);
$count=sqlsrv_has_rows($query23);
                if ($count > 0) {
                    $rows34 = sqlsrv_fetch_array($query23);
                    if ($rows34['result'] =='') {
                    $extdata[$d]=$extdata2s;
                    $d++;
                    }
                } else {
                    $extdata[$d]=$extdata2s;
                    $d++;
                }
    }
            

  // $sql13="Select * from CoagRequests where SampleID='$sid'";

   $sql13="SELECT  CoagRequests.SampleID,CoagRequests.Code,CoagRequests.DateTime,CoagTestDefinitions.Testname,CoagTestDefinitions.PrintPriority FROM CoagRequests  LEFT JOIN CoagTestDefinitions  ON CoagRequests.Code = CoagTestDefinitions.Code WHERE CoagRequests.SampleID = '$sid'   
 GROUP BY CoagRequests.SampleID,CoagRequests.Code,CoagRequests.DateTime,CoagTestDefinitions.Testname,CoagTestDefinitions.PrintPriority  ORDER BY CoagTestDefinitions.PrintPriority";

    $query13=sqlsrv_query($conn_hq,$sql13);
    $count13=sqlsrv_has_rows($query13);

 // $biodata;
 //    $b=0;
if($count13 > 0){

while($rows13=sqlsrv_fetch_array($query13)){
 $mycode=$rows13['Code'];
$sql="select * from CoagResults where Code='$mycode' AND SampleID='$sid'";

$myquery=sqlsrv_query($conn_hq,$sql);
$mycount=sqlsrv_has_rows($myquery);
if($mycount > 0){
$row=sqlsrv_fetch_array($myquery);
if($row['Result'] == ''){
$fetch[$e]=$rows13; 
$e++;
}
}else{
 $fetch[$e]=$rows13; 
$e++;   
}

}

    }






            $haemdata2 = [];
            $f = 0;


 $sql14="SELECT  HaeRequests.SampleID,HaeRequests.Code,HaeRequests.DateTime,HaemTestDefinitions.PrintPriority,HaeRequests.Analyser FROM HaeRequests  LEFT JOIN HaemTestDefinitions  ON HaeRequests.Code = HaemTestDefinitions.Code WHERE HaeRequests.SampleID = '$sid'   
            GROUP BY HaeRequests.SampleID,HaeRequests.Code,HaeRequests.DateTime,HaemTestDefinitions.PrintPriority,HaeRequests.Analyser ORDER BY HaemTestDefinitions.PrintPriority";
// $sql14="Select * from HaeRequests where SampleID='$sid'";
$query14=sqlsrv_query($conn_hq,$sql14);
$count14=sqlsrv_has_rows($query14);

 // $biodata;
 //    $b=0;
if($count14 > 0){
while($rows14=sqlsrv_fetch_array($query14)){
    $haemdata2[$f]=$rows14;
    $f++; 
}
    }

$haemdata=[];
$f2=0;
            foreach ($haemdata2 as $haemdata2s) {
             
                  $code23 = $haemdata2s['Code'];
                $sql31 = "select * from HaemResults50 where Code='$code23' AND SampleID='$sid'";
                $query16 = sqlsrv_query($conn_hq, $sql31);
                $count11 = sqlsrv_has_rows($query16);

                if ($count11 > 0) {
                    $resulthem = sqlsrv_fetch_array($query16);
                    if ($resulthem['Result'] == NULL) {
                    
                        $haemdata[$f2] = $haemdata2s;
                        $f2++;
                    }

                } else {
                 
                    $haemdata[$f2] = $haemdata2s;
                    $f2++;
                }
            }


// return $haemdata;


     $copyto=[];
        $to=0;

$sql14="Select * from SendCopyTo where SampleID='$sid'";
$query14=sqlsrv_query($conn_hq,$sql14);
$count14=sqlsrv_has_rows($query14);

 // $biodata;
 //    $b=0;
if($count14 > 0){
while($rows14=sqlsrv_fetch_array($query14)){

$copyto[$to]=$rows14;
$to++;   


}

    }

     $observ=[];
        $cmt=0;

 $sql20="Select * from observations where SampleID='$sid'";
$query20=sqlsrv_query($conn_hq,$sql20);
$count20=sqlsrv_has_rows($query20);

 // $biodata;
 //    $b=0;
if($count20 > 0){
while($rows21=sqlsrv_fetch_array($query20)){

$observ[$cmt]=$rows21;
$cmt++;   


}

}

// $datajoin=[];
// $g=0;

//   $sqljoin1="SELECT BioRequests.SampleID,BioRequests.Code,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.DateTime,BioRequests.DateTimeOfRecord ,BioResults.Comment FROM BioRequests LEFT JOIN BioResults ON BioResults.SampleID = BioRequests.SampleID and BioResults.Code = BioRequests.Code  
//  where BioRequests.SampleID ='$sid'";
// $queryjoin1=sqlsrv_query($conn_hq,$sqljoin1);
// $countjoin=sqlsrv_has_rows($queryjoin1);



// if($countjoin > 0){
// while($row=sqlsrv_fetch_array($queryjoin1)){
// $datajoin[$g]=$row;
// $g++;
// }
// } 

$mynewarray=[];
$k=0;
// foreach($datajoin as $datajoins){
 // return $sqljoin2="SELECT BioRequests.SampleID,BioRequests.Code,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.DateTime,BioRequests.DateTimeOfRecord  FROM BioRequests LEFT JOIN BioTestDefinitions ON BioTestDefinitions.Code = BioRequests.Code where BioTestDefinitions.Code ='".$datajoins['Code']."'";
 $sqljoin2="SELECT BioRequests.Code,
BioRequests.SampleID,BioRequests.DateTime,BioRequests.SampleType,BioRequests.Programmed,BioRequests.AnalyserID
,BioRequests.AMS,BioRequests.DateTimeOfRecord,BioRequests.GBottle,BioTestDefinitions.shortname,BioTestDefinitions.units,BioTestDefinitions.PrintPriority  FROM BioRequests INNER JOIN BioTestDefinitions  ON BioRequests.Code = BioTestDefinitions.Code where BioRequests.SampleID='$sid' GROUP BY  BioRequests.Code,
BioRequests.SampleID,BioRequests.DateTime,BioRequests.SampleType,BioRequests.Programmed,BioRequests.AnalyserID
,BioRequests.AMS,BioRequests.DateTimeOfRecord,BioRequests.GBottle,BioTestDefinitions.shortname,BioTestDefinitions.units ,BioTestDefinitions.PrintPriority ORDER BY BioTestDefinitions.PrintPriority";
// if($rows['Sex']=='M'){
//   $newage=$rows['Age']*365;

// }
// else{
//     return 2;
// }
$query=sqlsrv_query($conn_hq,$sqljoin2);
while($row=sqlsrv_fetch_array($query)){
$mynewarray[$k]=$row;
$k++;
}

$bioresults2=[];

//$sqljoin22="SELECT * from  BioResults where SampleID='$sid' AND Result IS NOT NULL";
 $sqljoin22="SELECT BioResults.Code,
BioResults.SampleID,BioTestDefinitions.shortname,BioResults.result,BioResults.Analyser,BioResults.units ,BioTestDefinitions.units,BioTestDefinitions.PrintPriority  FROM BioResults INNER JOIN BioTestDefinitions  ON BioResults.Code = BioTestDefinitions.Code where BioResults.SampleID='$sid' AND BioResults.result IS NOT NULL  GROUP BY  BioResults.Code,
BioResults.SampleID,BioTestDefinitions.shortname,BioResults.Analyser,BioResults.result ,BioResults.units,BioTestDefinitions.units ,BioTestDefinitions.PrintPriority ORDER BY BioTestDefinitions.PrintPriority";

$query22=sqlsrv_query($conn_hq,$sqljoin22);
while($row=sqlsrv_fetch_array($query22)){
$bioresults2[]=$row;
}

// }



// Coag data fetch



$datajoin2=[];
$g2=0;

//  $sqljoin21="SELECT CoagRequests.SampleID,CoagRequests.Code,CoagRequests.DateTime FROM CoagRequests LEFT JOIN CoagResults ON CoagResults.SampleID = CoagRequests.SampleID and CoagResults.Code = CoagRequests.Code where CoagRequests.SampleID ='$sid'";
// $queryjoin21=sqlsrv_query($conn_hq,$sqljoin21);
// $countjoin21=sqlsrv_has_rows($queryjoin21);



// if($countjoin21 > 0){
// while($row=sqlsrv_fetch_array($queryjoin21)){
// $datajoin21[$g2]=$row;
// $g2++;
// }
// }else{
//     $datajoin21=[];
// } 


$mynewarray2=[];
$k2=0;

// if(count($datajoin21) > 0){
//  foreach($datajoin21 as $datajoin21s){
 // return $sqljoin2="SELECT BioRequests.SampleID,BioRequests.Code,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.DateTime,BioRequests.DateTimeOfRecord  FROM BioRequests LEFT JOIN BioTestDefinitions ON BioTestDefinitions.Code = BioRequests.Code where BioTestDefinitions.Code ='".$datajoins['Code']."'";
   $sqljoin2="SELECT CoagRequests.Code, CoagRequests.SampleID,CoagRequests.DateTime,CoagTestDefinitions.shortname,CoagTestDefinitions.units,CoagTestDefinitions.PrintPriority FROM CoagRequests INNER JOIN CoagTestDefinitions ON CoagRequests.Code = CoagTestDefinitions.Code where  CoagRequests.SampleID='$sid' GROUP BY CoagRequests.Code, CoagRequests.SampleID,CoagRequests.DateTime,CoagTestDefinitions.shortname,CoagTestDefinitions.units,CoagTestDefinitions.PrintPriority ORDER BY CoagTestDefinitions.PrintPriority ASC";


// if($rows['Sex']=='M'){
//   $newage=$rows['Age']*365;

// }
// else{
//     return 2;
// }
$query=sqlsrv_query($conn_hq,$sqljoin2);
while($row2=sqlsrv_fetch_array($query)){
$mynewarray2[$k2]=$row2;
$k2++;
}

$getcoagres=[];
  $coagres33="SELECT CoagResults.Code, CoagResults.SampleID,CoagResults.Result,CoagResults.Analyser,CoagTestDefinitions.shortname,CoagTestDefinitions.units,CoagTestDefinitions.PrintPriority FROM CoagResults INNER JOIN CoagTestDefinitions ON CoagResults.Code = CoagTestDefinitions.Code where  CoagResults.SampleID='$sid' AND Result IS NOT NULL GROUP BY CoagResults.Code, CoagResults.SampleID,CoagTestDefinitions.shortname,CoagTestDefinitions.units,CoagResults.Result,CoagResults.Analyser,CoagTestDefinitions.PrintPriority ORDER BY CoagTestDefinitions.PrintPriority ASC";

 $query33=sqlsrv_query($conn_hq,$coagres33);
while($row2=sqlsrv_fetch_array($query33)){
$getcoagres[]=$row2;

}



// }
   
// }

// return $mynewarray2;



//Fecth data for haematology tab haem table


// $datajoin3=[];
// $g3=0;

//    $sqljoin31="SELECT HaeRequests.SampleID,HaeRequests.Code,HaeRequests.DateTime,HaeRequests.Analyser,HaemResults50.Result  FROM HaeRequests LEFT JOIN HaemResults50 ON HaemResults50.SampleID = HaeRequests.SampleID and HaemResults50.Code = HaeRequests.Code where HaeRequests.SampleID ='$sid'";
//     $queryjoin31=sqlsrv_query($conn_hq,$sqljoin31);
//     $countjoin31=sqlsrv_has_rows($queryjoin31);



// if($countjoin31 > 0){
// while($row31=sqlsrv_fetch_array($queryjoin31)){
// $datajoin3[$g3]=$row31;
// $g3++;
// }
// }else{
//     $datajoin3=[];
// } 


$mynewarray32=[];
$k32=0;

// if(count($datajoin3) > 0){
//  foreach($datajoin3 as $datajoin3s){
//  return $sqljoin2="SELECT BioRequests.SampleID,BioRequests.Code,BioRequests.Programmed,BioRequests.AnalyserID,BioRequests.DateTime,BioRequests.DateTimeOfRecord  FROM BioRequests LEFT JOIN BioTestDefinitions ON BioTestDefinitions.Code = BioRequests.Code where BioTestDefinitions.Code ='".$datajoins['Code']."'";
    $sqljoin2="SELECT HaeRequests.Code, HaeRequests.SampleID,HaeRequests.DateTime ,HaeRequests.Analyser,HaemTestDefinitions.shortname,HaemTestDefinitions.units,HaemTestDefinitions.PrintPriority FROM HaeRequests INNER JOIN HaemTestDefinitions ON HaeRequests.Code = HaemTestDefinitions.Code  WHERE HaeRequests.SampleID='$sid' GROUP BY HaeRequests.Code,HaeRequests.Analyser, HaeRequests.SampleID,HaeRequests.DateTime,HaemTestDefinitions.shortname,HaemTestDefinitions.units,HaemTestDefinitions.PrintPriority ORDER BY HaemTestDefinitions.PrintPriority ASC";

// if($rows['Sex']=='M'){
//   $newage=$rows['Age']*365;

// }
// else{
  
// }
$query=sqlsrv_query($conn_hq,$sqljoin2);
while($row2=sqlsrv_fetch_array($query)){
$mynewarray32[$k32]=$row2;
$k32++;
}

$myhresults=[];
  $sqljoin33="SELECT HaemResults50.Code,HaemResults50.result, HaemResults50.SampleID,HaemResults50.Analyser,HaemTestDefinitions.shortname,HaemTestDefinitions.units,HaemTestDefinitions.PrintPriority FROM HaemResults50 INNER JOIN HaemTestDefinitions ON HaemResults50.Code = HaemTestDefinitions.Code  WHERE HaemResults50.SampleID='$sid' AND HaemResults50.result IS NOT NULL GROUP BY HaemResults50.Code,HaemResults50.Analyser,HaemResults50.result, HaemResults50.SampleID,HaemTestDefinitions.shortname,HaemTestDefinitions.units,HaemTestDefinitions.PrintPriority ";

 $query33=sqlsrv_query($conn_hq,$sqljoin33);
while($row2=sqlsrv_fetch_array($query33)){
$myhresults[]=$row2;
}



// }
   
// }

//ecd 



$site50=[];
$k2=0;
$sql23="Select * from SiteDetails50 where SampleID='$sid'";
$query23=sqlsrv_query($conn_hq,$sql23);
$count23=sqlsrv_has_rows($query23);
if($count23 > 0){
while($row=sqlsrv_fetch_array($query23)){
$site50[$k2]=$row;
$k2++;
}
}

            $exttab = [];
            $e6 = 0;
            // $sql = "select * from Biomnisrequests where SampleID='$sid'";
             $sql="select * from Biomnisrequests LEFT JOIN ExternalDefinitions on Biomnisrequests.TestCode=ExternalDefinitions.BiomnisCode  where SampleID='$sid' ORDER BY PrintPriority";
            $queryext = sqlsrv_query($conn_hq, $sql);
            $count = sqlsrv_has_rows($queryext);
            if($count > 0){
             while($rows45=sqlsrv_fetch_array($queryext)){
               $exttab[$e6]=$rows45;
                    $e6++;
             }
            }
            // return $exttab;

//return $datajoin;
   

  $coagreject="select * from CoagResults where SampleID='$sid' AND Code='REJ' AND Result='REJ'";
  $coagrejectq=sqlsrv_query($conn_hq,$coagreject);
  $countcoagre=sqlsrv_has_rows($coagrejectq);
  if($countcoagre > 0){
    $countcoagre='1';
  }else{
    $countcoagre='';
  }

   $haemreject="select * from HaemResults50 where SampleID='$sid' AND Code='REJ' AND Result='REJ'";
  $haemrejectq=sqlsrv_query($conn_hq,$haemreject);
  $counthaemre=sqlsrv_has_rows($haemrejectq);
  if($counthaemre > 0){
    $counthaemre='1';
  }else{
    $counthaemre='';
  }

$bioreject="select * from BioResults where SampleID='$sid' AND Code='REJB' AND Result='REJ'";
  $biorejectq=sqlsrv_query($conn_hq,$bioreject);
  $countbiore=sqlsrv_has_rows($biorejectq);
  if($countbiore > 0){
    $countbiore='1';
  }else{
    $countbiore='';
  }

  $extreject="select * from BioResults where SampleID='$sid' AND Code='ZZRJ' AND Result='REJ'";
  $extrejectq=sqlsrv_query($conn_hq,$extreject);
  $countextre=sqlsrv_has_rows($extrejectq);
  if($countextre > 0){
    $countextre='1';
  }else{
    $countextre='';
  }


        
    $rows3='';
    $rows5 = '';


    
    }    
        
        
        else {

            $rows =[];         //demographics
            $array = [];        
            $rows3 = [];        
            $haemarray =[];
            $extarray = [];
            $coagarray = [];
            $rows5 = [];
            $rowsph = [];
            $rowsocm2 = [];
            // $getgparray = [];
            $ocmque = [];
            $ocmcom = [];
            // $wardsarray = [];
            // $cliarray = [];
            $phoarray = [];     
            $alldata=[];
            $biodata=[];
            $extdata=[];
            $fetch=[];
            $copyto=[];
            // $bparr=[];
            // $bparr2=[];
            //PhoneComment
            // $ex=[];
            $observ=[];
            $mynewarray=[];
            $mynewarray2=[];
            $site50=[];
            $mynewarray32 = [];
            $exttab = [];
            $countcoagre='';
            $counthaemre='';
            $countbiore='';
            $countextre='';
            $bioresults2=[];
            $getcoagres=[];
            $myhresults=[];
            
        }

// return $array;
        $mygps=[];
        $o=0;
        $sql10="select Top(100) * from gps where Practice !=''";
        $query10=sqlsrv_query($conn_hq,$sql10);
        $count10=sqlsrv_has_rows($query10);
        if($count10 > 0){
         while($rows10=sqlsrv_fetch_array($query10)){
          $mygps[$o]=$rows10;
          $o++;
         }
        }

        $anti=[];
        $bio=0;
        $sql12="select * from antibiotics";
        $query12=sqlsrv_query($conn_hq,$sql12);
        $count12=sqlsrv_has_rows($query12);
        if($count12 > 0){
         while($rows12=sqlsrv_fetch_array($query12)){
          $anti[$bio]=$rows12;
          $bio++;
         }
        }
        $demo=[];
        $li=0;
        

            if ($request->ajax()) {


                $getdob=$request->getdob;
                $getmrn=$request->getmrn;
                $getname=$request->getname;
                 $searchby2=$request->searchby2; //Surname

                
         // if($getdob !='' AND $getmrn=='' AND $getname==''){

          // $sql="select * from demographics where DoB ='$getdob'";
         // }
         // else if($getmrn !='' AND $getdob=='' AND $getname==''){
         // $sql="select * from demographics where Chart ='$getmrn'";
         // }
         // else if($getdob !='' OR $getmrn !='' OR $getname!=''){
         // $sql="select Top(100)* from demographics where DoB ='$getdob' OR Chart ='$getmrn' OR PatName LIKE '%$getname%'";
         // }
         // else{
         //    $sql='';
         // }


         

         if($getmrn !='') {
            $sql="select distinct Chart, max(DateTimeAmended) as request_id from PatientIFs where Chart ='$getmrn'  group by Chart";
            $query=sqlsrv_query($conn_hq,$sql);
           
    
                while($rows23=sqlsrv_fetch_array($query)){
                    $request_id=$rows23['request_id'];
                    
               $chart=$rows23['Chart'];
               $sql33="select top(1) Chart,PatName,Sex,Ward,Clinician,DoB,GP,PatSurName as SurName,PatForeName as ForeName,Address0 as Addr0,Address1 as Addr1,Address2 as Addr3,Address3 as Addr4,DateTimeAmended as SampleDate from PatientIFs where Chart='$chart' AND DateTimeAmended='$request_id'";
               $query33=sqlsrv_query($conn_hq,$sql33);
               $row33=sqlsrv_fetch_array($query33);
             
               
               $demosamp = "Select max(SampleID) as SampleID from demographics where Chart = '$chart'";
               $demos = sqlsrv_query($conn_hq,$demosamp);
               $getsampleid = sqlsrv_fetch_array($demos);
               $sampleid = $getsampleid['SampleID'];
      
               array_push($row33,$sampleid);
                    // $rows33['SampleID'] = $sampleid;
                 $demo[$li]=$row33;
                 $demo[$li] = array_map("utf8_encode", $demo[$li]);
               
               $li++;

               
         }

        }
        //  return $demo;

        else if($getname !=NULL AND $searchby2 != NULL){

            $sql="select distinct ForeName, max(sampledate) as request_id from demographics where ForeName LIKE '%$getname%' and SurName='%$searchby2%' group by ForeName";
            $query=sqlsrv_query($conn_hq,$sql);
  
            // $sql="select DISTINCT * from demographics where $searchby2 LIKE '%$getname%' Order By SampleDate Desc";  
  
  
              while($rows23=sqlsrv_fetch_array($query)){
             $chart=$rows23['ForeName'];
             $sql33="select top(1) * from demographics where ForeName='$chart'";
             $query33=sqlsrv_query($conn_hq,$sql33);
             $row33=sqlsrv_fetch_array($query33);
  
             $demo[$li]=$row33;
             $demo[$li] = array_map("utf8_encode", $demo[$li]);
             $li++;
            }
  
  
          // $sql="select * from demographics where $searchby2 LIKE '%$getname%'";
            }


            else if($getname !=''){

                $sql="select distinct ForeName, max(sampledate) as request_id from demographics where ForeName='$getname'  group by ForeName";
                $query=sqlsrv_query($conn_hq,$sql);
      
                // $sql="select DISTINCT * from demographics where $searchby2 LIKE '%$getname%' Order By SampleDate Desc";  
      
      
                  while($rows23=sqlsrv_fetch_array($query)){
                 $chart=$rows23['ForeName'];
                 $sql33="select top(1) * from demographics where ForeName='$chart'";
                 $query33=sqlsrv_query($conn_hq,$sql33);
                 $row33=sqlsrv_fetch_array($query33);
      
                 $demo[$li]=$row33;
                 $demo[$li] = array_map("utf8_encode", $demo[$li]);
                 $li++;
                }
      
      
              // $sql="select * from demographics where $searchby2 LIKE '%$getname%'";
                }

        else if($searchby2 !=''){

            $sql="select distinct SurName, max(sampledate) as request_id from demographics where SurName LIKE '%$searchby2%'  group by SurName";
             $query=sqlsrv_query($conn_hq,$sql);
           // $sql="select DISTINCT * from demographics where $searchby2 LIKE '%$getname%' Order By SampleDate Desc"; 
   
               while($rows23=sqlsrv_fetch_array($query)){
              $chart=$rows23['SurName'];
              $sql33="select top(1) * from demographics where SurName='$chart'";
              $query33=sqlsrv_query($conn_hq,$sql33);
              $row33=sqlsrv_fetch_array($query33);
   
              $demo[$li]=$row33;
              $demo[$li] = array_map("utf8_encode", $demo[$li]);
              $li++;
             }

             }


        else if($getdob !=''){

        $sql="select distinct DoB, max(sampledate) as request_id from demographics  where DoB='$getdob' group by DoB";
        $query=sqlsrv_query($conn_hq,$sql);

         while($rows23=sqlsrv_fetch_array($query)){
           $chart=$rows23['DoB'];
           $sql33="select top(1) * from demographics where DoB='$chart'";
           $query33=sqlsrv_query($conn_hq,$sql33);
           $row33=sqlsrv_fetch_array($query33);

           $demo[$li]=$row33;
           $demo[$li] = array_map("utf8_encode", $demo[$li]);
           $li++;
          }

        $sql="select DISTINCT * from demographics where $searchby2='$getdob' Order By SampleDate Desc";

        $sql="select * from demographics where $searchby2 ='$getdob'";
          }
          
    else {
           $sql='';

          //  while($rows23=sqlsrv_fetch_array($query)){

          //  $demo[$li]=$rows23;
          //  $demo[$li] = array_map("utf8_encode", $demo[$li]);
          //  $li++;

          // }

          }      



if($getmrn != NULL){
            return Datatables::of($demo)

            ->addIndexColumn()
            ->addColumn('action', function ($row) {
        return    "<button class='btn btn-secondary getsample' id=".$row['Chart']." name='patientifs'><i class='fa fa-check'></i></button";

    })->editColumn('DoB',function($row){
           return   date('Y-m-d', strtotime($row['DoB']));
    })


            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);
          }
       
else{
        return Datatables::of($demo)

                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                return    "<button class='btn btn-secondary getsample' id=".$row['SampleID']." name='demographics'><i class='fa fa-check'></i></button";
   
            })->editColumn('DoB',function($row){
                   return   date('Y-m-d', strtotime($row['DoB']));
            })
  

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);


        }
        }



        // return $mygps[0]['Practice'];


        // return $bparr2;
        // return $alldata;




// return $mynewarray2;
   
        return view ('Results', ['rows'=>$rows,'array'=>$array, 'rows3'=> $rows3, 'haemarray'=>$haemarray, 'extarray'=>$extarray,'coagarray'=>$coagarray,  'rows5'=>$rows5, 'rowsph'=>$rowsph, 'rowsocm2'=>$rowsocm2,'bparr'=>$bparr, 'bparr2'=>$bparr2, 
        'ext'=>$ex,'site50'=>$site50,
        
         'phoarray'=>$phoarray,'mygps'=>$mygps,'biodata'=>$biodata,'extdata'=>$extdata,'fetch'=>$fetch,'haemdata'=>$haemdata,'anti'=>$anti,'copyto'=>$copyto,'observ'=>$observ,'mynewarray'=>$mynewarray,'mynewarray2'=>$mynewarray2,'site50'=>$site50, 'mynewarray32'=>$mynewarray32,'exttab'=>$exttab,'countcoagre'=>$countcoagre,'counthaemre'=>$counthaemre,'countbiore'=>$countbiore,'countextre'=>$countextre,'bioresults2'=>$bioresults2,'getcoagres'=>$getcoagres,'myhresults'=>$myhresults]);    
    }

    public function mrnresults(Request $request){

       $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
       $demo=[];
       $li=0;    

        if ($request->ajax()) {
              
        $getmrn=$request->getmrn;
        $getdob=$request->getdob;
        $rangeno=$request->rangeno;

            
         if( $getmrn !=''){

            if($rangeno !='*'){
            $sql="SELECT TOP($rangeno) * from demographics where Chart ='$getmrn' ORDER BY SampleDate DESC"; 
            }
            if($rangeno=='*'){
                $sql="select * from demographics where Chart ='$getmrn' ORDER BY SampleDate DESC"; 
            }

         
         }else if($getdob !=''){
           if($rangeno !='*'){
           $sql="select TOP($rangeno) * from demographics where DoB ='$getdob' ORDER BY SampleDate DESC";
           } 
           if($rangeno =='*'){
             $sql="select * from demographics where DoB ='$getdob' ORDER BY SampleDate DESC";
           }
        
         } else{
            $sql='';
         }
         // return $sql;
         $query=sqlsrv_query($conn_hq,$sql);

         while($rows23=sqlsrv_fetch_array($query)){
          $demo[$li]=$rows23;
          $demo[$li] = array_map("utf8_encode", $demo[$li]);
          $li++;
         }
         // return $demo;
        
        return Datatables::of($demo)

                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                return    "<button class='btn btn-secondary getsample2' id=".$row['SampleID']."><i class='fa fa-check'></i></button";
   
            })->editColumn('DoB',function($row){
                   return   date('Y-m-d', strtotime($row['DoB']));
            })
  

                    ->setRowId('SampleID')
                    ->rawColumns(['action'])
                    ->make(true);


            
        }


    }

    public function mrnrequest(Request $req){

     $chart=$req->myid;
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

     $sql="select * from demographics where SampleID='$chart'";
     $query=sqlsrv_query($conn_hq,$sql);
     $data=sqlsrv_fetch_array($query);


    //$chart=237094;

    // $data=DB::table('patientifs')->where('Chart',$chart)->get();
    if(count($data) > 0){
   
    $patid=$data['SampleID'];

    return response()->json($patid);
}else{
    return response()->json("Data Does Not Exist");
}
    }

    public static function getdata2($sampleid='',$code=''){
   
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }
   

    $sql="Select * from BioResults where SampleID='$sampleid' AND Code='$code'";
    $query=sqlsrv_query($conn_hq,$sql);
    $rows3=sqlsrv_fetch_array($query);
 
     $count=sqlsrv_has_rows($query);

 if($count > 0){

return $rows3['Comment'];
     }else{
return "-";
     }
    




    }
    public static function getresult2($sampleid='',$code=''){

     
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }
   
 

    $sql="Select * from BioResults where SampleID='$sampleid' AND Code='$code'";
    $query=sqlsrv_query($conn_hq,$sql);
    $rows3=sqlsrv_fetch_array($query);
 
     $count=sqlsrv_has_rows($query);

 if($count > 0){

return $rows3['result'];
     }else{
return "";
     }


    }


    public static function getresult4($sampleid='',$code=''){

     
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
                
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
       
    
        $sql="Select * from HaemResults50 where SampleID='$sampleid' AND Code='$code'";
        $query=sqlsrv_query($conn_hq,$sql);
        $rows3=sqlsrv_fetch_array($query);
     
         $count=sqlsrv_has_rows($query);
    
     if($count > 0){
    
    return $rows3['Result'];
         }else{
    return "";
         }
    
    
        }


        public static function getunit4($sampleid='',$code=''){

     
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
                    
                if(!$conn_hq) {
                die( print_r( sqlsrv_errors(), true));
            }
           
        
            $sql="Select * from HaemResults50 where SampleID='$sampleid' AND Code='$code'";
            $query=sqlsrv_query($conn_hq,$sql);
            $rows3=sqlsrv_fetch_array($query);
         
             $count=sqlsrv_has_rows($query);
        
         if($count > 0){
        
        return $rows3['Units'];
             }else{
        return "";
             }
    
        
            }



    public function getDemodata(Request $req){

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
        $sampleid = $req->id;
        $type = $req->type;
if($type =='demographics'){
    
    $sql="select * from demographics where SampleID='$sampleid'";
    $query=sqlsrv_query($conn_hq,$sql);
    $count=sqlsrv_has_rows($query);
    if($count > 0){
    $row=sqlsrv_fetch_array($query);
    }else{
       $row=[]; 
    }
    
    $date2=$row['SampleDate'];

    $sampletime=\Carbon\Carbon::parse($row['SampleDate'])->format('Y-m-d h:i');
    $rectime=\Carbon\Carbon::parse($row['RecDate'])->format('Y-m-d h:i');
    $dob12=\Carbon\Carbon::parse($row['DoB'])->format('Y-m-d');


    $sql2="select * from SendCopyTo where SampleID='$sampleid'";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $count2=sqlsrv_has_rows($query2);
    if($count2 > 0){
    $row2=sqlsrv_fetch_array($query2);
    }else{
       $row2=[]; 
    }

    $data = [
    'row'=>$row,
    'row2'=>$row2,
    'sampletime'=>$sampletime,
    'rectime'=>$rectime,
    'dob12'=>$dob12
    ];

}else{


    // $sql="select * from demographics where SampleID='$sampleid'";
    // $query=sqlsrv_query($conn_hq,$sql);
    // $count=sqlsrv_has_rows($query);
    // if($count > 0){
    // $row=sqlsrv_fetch_array($query);
    // }else{
    //    $row=[]; 
    // }
    // $chart = $row['Chart'];

     $sql2="select TOP(1) * from PatientIFs where Chart='$sampleid' order By DateTimeAmended desc";
    $query2=sqlsrv_query($conn_hq,$sql2);
    $count2=sqlsrv_has_rows($query2);

    if($count2 > 0){
        $row2=sqlsrv_fetch_array($query2);
        $dob =  date('Y-m-d', strtotime($row2['DoB']));
        $age =  date('Y', strtotime($row2['DoB']));
        $currentyear =  date('Y');

        $age=$currentyear - $age;
    
      
        }else{
           $row2=[]; 
        }


        $data = [
            'row2'=>$row2,
            'dob'=>$dob,
            'age'=>$age
        
            ]; 
    
}
        return $data;


  


    }





    
    // public function biochemistry($tab=NULL, $id=NULL) {
    //         $check = 0;
    //         // return $tab.$id;
    //         if($id!=""){
    //             return $this->sidsend2($id);
    //         }
            
    //         $rows3='';
    //         $rows='';
    //         $array='';
    //         $haemarray='';
    //         $extarray = '';
    //         $coagarray = '';
    //         $rows5 = '';
      
    
    //         return view ('Results',['array'=>$array, 'rows'=>$rows, 'rows3'=> $rows3, 'haemarray'=>$haemarray , 'extarray'=>$extarray,  'rows5'=>$rows5,'coagarray'=>$coagarray]);
    // }

    public function extp(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     

      $panel= $request->s;
      $sample= $request->sample;
       
       $coag="Select distinct Content from ExtPanels Where PanelName='$panel'";
       $coagpanel=sqlsrv_query($conn_hq,$coag);
       $arr=[];
       $a=0;
       while($co = sqlsrv_fetch_array($coagpanel, SQLSRV_FETCH_ASSOC)){
                           
           $arr[$a] = $co['Content'];
          
     
           $a++;
       
           
       
       }


    //    return $arr;
  $q1="SELECT distinct AnalyteName,PrintPriority FROM ExternalDefinitions WHERE AnalyteName IN('".implode("','",$arr)."') order by PrintPriority";



$ana= sqlsrv_query($conn_hq,$q1);
$arr1=[];
$arr2=[];
$a1=0;

// return $count=sqlsrv_num_rows($ana);
while($an1 = sqlsrv_fetch_array($ana, SQLSRV_FETCH_ASSOC)){
                    
   $arr1[$a1] = $an1['AnalyteName'];



   $a1++;


}
return view('layouts.external')->with('Order',$arr);
// return $arr1;

    }

public function biops(Request $request){
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     


$panel=$request->s;
$sample=$request->sample;
if($panel=='Coag Screen'||$panel=='Coag+DD'||$panel=='Covid'){
$coag="Select distinct Content from CoagPanels Where PanelName='$panel'";
$coagpanel=sqlsrv_query($conn_hq,$coag);
$arr=[];
$a=0;
while($co = sqlsrv_fetch_array($coagpanel, SQLSRV_FETCH_ASSOC)){
                    
    $arr[$a] = $co['Content'];
   

    $a++;

    

}
$q1="SELECT  PrintPriority,shortname,Code FROM CoagTestDefinitions  WHERE shortname IN ('".implode("','",$arr)."')  ORDER BY PrintPriority";



$ana= sqlsrv_query($conn_hq,$q1);
$arr1=[];
$arr2=[];
$a1=0;

// return $count=sqlsrv_num_rows($ana);
while($an1 = sqlsrv_fetch_array($ana, SQLSRV_FETCH_ASSOC)){
                    
   $arr1[$a1] = $an1['shortname'];

    


  

    $a1++;
}
//  return $arr1;

$an1=['CS'];
   $data=[
    'Order'=>$arr1,
    'Analyser'=>$an1
];
// return $data;
return view('layouts.coagandhaem')->with('data',$data);

// return $arr;
}else{
    $haem="Select distinct Content from HaePanels where PanelName='$panel'";
    $haempanel=sqlsrv_query($conn_hq,$haem);

    $arr2=[];
    $a=0;
    while($hae=sqlsrv_fetch_array($haempanel,SQLSRV_FETCH_ASSOC)){
        $arr2[$a]=$hae['Content'];
        $a++;
    }
    // return $arr2;
     $q1="SELECT distinct shortname,Code,PrintPriority FROM HaemTestDefinitions WHERE shortname IN('".implode("','",$arr2)."') Order By PrintPriority";



$ana= sqlsrv_query($conn_hq,$q1);
$arr1=[];
// $arr2=[];
$a1=0;

// return $count=sqlsrv_num_rows($ana);
while($an1 = sqlsrv_fetch_array($ana, SQLSRV_FETCH_ASSOC)){
                    
   $arr1[$a1] = $an1['Code'];

    



    $a1++;
}
$an=['IPU'];
$data=[
    'Order'=>$arr2,
    'Analyser'=>$an
];
// return $data;
return view('layouts.coagandhaem')->with('data',$data);

}

}




public function biop(Request $request){
       
       
       $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }



$panel=$request->s;
$sample=$request->sample;


 $q="Select distinct Content from Panels Where PanelName='$panel'";
$analyser= sqlsrv_query($conn_hq,$q);
$arr=[];
$a=0;
while($an = sqlsrv_fetch_array($analyser, SQLSRV_FETCH_ASSOC)){
                    
    $arr[$a] = $an['Content'];
   

    $a++;

    

}


// return 1;
// return $arr;
$q1="SELECT distinct shortname,Code,Analyser,PrintPriority FROM BioTestDefinitions WHERE shortname IN('".implode("','",$arr)."') ORDER BY PrintPriority ";

$ana= sqlsrv_query($conn_hq,$q1);


$data = array();

while ($an1 = sqlsrv_fetch_array($ana, SQLSRV_FETCH_ASSOC)) {


         $data[] = [

            'Order'=>$an1['shortname'],
            'Code'=>$an1['Code'],
            'Analyser'=>$an1['Analyser']

        ];


}




            return view('layouts.addbio')->with('data',$data)->with('mydata',$data);
    
}



    
        public function addmodal(Request $request) {


    
             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

           
                
                $sampleid = $request->sampleid;
                $units = $request->units;
                $res = $request->resval;
                $shortname = $request->code;
                $Code = $request->code;
                $comment = $request->comment;
                $getage1 = $request->age;
                if(str_contains($getage1,'Y')){
                    $getage1 = str_replace("Y"," ",$getage1);
                }
                $getage1 = $getage1*365;
             

                $getsex = $request->sex;
                // $getage = trim($getage1,"Yr");
                $biosend = '';
                $extunits = $request->extunits;

                $testcode = $request->testcode;

             

                $data="";
                $NormalLow = '';
                $NormalHigh = '';
            
                $dept = $request->dept;

                \App\Http\Controllers\addresults::autocom($sampleid,$Code,$res);
                \App\Http\Controllers\addresults::phonealertlevel($sampleid,$Code,$res,$dept);




                if($request->dept == "Biochemistry"){ 

                    $getcode = "SELECT * FROM BioTestDefinitions  WHERE shortname = '$Code'";
                    $qu = sqlsrv_query($conn_hq,$getcode);
                    $getrow = sqlsrv_fetch_array($qu);
                 
                    $Code = $getrow['Code'];
                    

                   $sql11 ="SELECT * FROM BioTestDefinitions where  AgeToDays >= '$getage1' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
                    
                    if ($count11 > 0) {

                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                    if($getsex == 'F') {

                        $NormalLow = $rows11['FemaleLow'];
                        $NormalHigh = $rows11['FemaleHigh'];
                            // $NormalLow = round($rows11['FemaleLow'],1);
                            // $NormalHigh = round($rows11['FemaleHigh'],1);
                       }
                       else {
                        $NormalLow = $rows11['MaleLow'];
                        $NormalHigh = $rows11['MaleHigh'];


                        // $NormalLow = round($rows11['MaleLow'],1);
                        // $NormalHigh = round($rows11['MaleHigh'],1);
                    }
                 
                    $plausibleLow = round($rows11['PlausibleLow'],2);
                    $plausibleHigh = round($rows11['PlausibleHigh'],2);

                    if($plausibleHigh == NULL  ){
                        $plausibleHigh = 9999;
                    }
                    
                    if($plausibleLow == NULL  ){
                        $plausibleLow = 0;
                    }

                
                    $sqlbiore="select * from BioResults where SampleID='$sampleid' AND Code ='$Code'";
                    $query=sqlsrv_query($conn_hq,$sqlbiore);
                    $count=sqlsrv_has_rows($query);

                    if($count  == 0){

                       $getdp="select * from BioTestDefinitions where Code='$Code'";    
                    
                    $sqlbiores="insert into  BioResults(SampleID,Code) values('$sampleid','$Code')";
                    sqlsrv_query($conn_hq,$sqlbiores);
                     
                    }

                     if($res >= $plausibleLow && $res <= $plausibleHigh) {
  
                    $getdp="select TOP(1) * from BioTestDefinitions where Code='$Code'";
                    $querydp=sqlsrv_query($conn_hq,$getdp);
                    $row=sqlsrv_fetch_array($querydp);
                    $dp=$row['dp'];

                    if($dp =='0'){
                      $res=$res;
                    }else {
                        $res=round($res, $dp);
                    }

                    $sql5="update bioresults set Units='$units',result='$res',NormalLow='$NormalLow',NormalHigh='$NormalHigh' , Analyser = 'Manual', Comment='$comment', RunDate = '".date('Y-m-d h:i:s')."',RunTime = '".date('Y-m-d h:i:s')."' where Code = '$Code' AND SampleID = '$sampleid' ";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);

                        if($results2 > 0){
                         $dele="delete from BioRequests where SampleID='$sampleid' AND Code='$Code'";
                         sqlsrv_query($conn_hq,$dele);
                        }

           
                        if(\App\Http\Controllers\addresults::getresult2($sampleid,$Code == '' )){
                        
                        $btn = '<button type="button" class="btn btn-primary addrbtn btn-xs" > <i class="fa fa-plus"></i></button>';
                        
                         } else {

                            $btn =  \App\Http\Controllers\addresults::getresult2($sampleid, $Code);
                         }

                        

                      $s1 = \App\Http\Controllers\addresults::getranges($shortname,$getsex,$request->age, 'Biochemistry',$Code);
                      $s2 = \App\Http\Controllers\addresults::getflags($shortname,$getsex,$request->age, 'Biochemistry',$sampleid);
                      $s3 = \App\Http\Controllers\addresults::getdata2($sampleid,$Code); 
                     
                      if(\App\Http\Controllers\addresults::getvalid($sampleid,$Code) =='1'){
                        $s4 = '<i class="fa fa-check text-primary"></i>';
                      }else{ 
                    $s4= '';
                     } 
                     $data=md5($shortname);
                   

                    // $analyser=$datajoins['AnalyserID'];
                     $analyser='';
                     $mydata='
                            
                    <td>&nbsp;&nbsp;<input type="checkbox" class=" px-4 form-check-input checkedinput ">
                        &nbsp;&nbsp;'.$shortname.'</td>
                    <td class="showmodal"  id="'.$shortname.'"   name="'.$data.'"">'.$btn.'</td>

                    <td>'.$units.'</td>
                    <td>'.$s1.'</td>
                    <td>'.$s2.'</td>
                    <td>'.$s3.'</td>
                    <td>'.$s4.'</td>
                    <td></td>
                    <td></td>
                    <td>'.$analyser.'</td>
               
';
           

                    return response()->json(['success'=>true,'rows11' => $rows11, "data" =>$mydata,'data1'=>$data]);
                    }

                    else {

                        return response()->json(['error'=>true , 'rows11' => $rows11]);
                    }

                           

              
                    }

                  
  
                    
                }
            
    
// Haematology
                elseif($request->dept == "Haematology"){ 

                    $getcode = "SELECT * FROM HaemTestDefinitions  WHERE shortname = '$Code'";
                    $qu = sqlsrv_query($conn_hq,$getcode);
                    $getrow = sqlsrv_fetch_array($qu);
                    $Code = $getrow['Code'];
                    

                    $sql11 ="SELECT * FROM HaemTestDefinitions where  AgeToDays >= '$getage1' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
    
                    
    
                    if ($count11 > 0) {
                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
                    $plausibleLow = round($rows11['PlausibleLow'],2);
                    $plausibleHigh = round($rows11['PlausibleHigh'],2);

                    if($plausibleHigh == NULL  ){
                        $plausibleHigh = 9999;
                    }
                    
                    if($plausibleLow == NULL  ){
                        $plausibleLow = 0;
                    }
                    
                    
                    $sqlbiore="select * from HaemResults50 where SampleID='$sampleid' AND Code ='$Code'";
                    $query=sqlsrv_query($conn_hq,$sqlbiore);
                    $count=sqlsrv_has_rows($query);

                    if($count  == 0){
                    
                    $sqlbiores="insert into  HaemResults50(SampleID,Code) values('$sampleid','$Code')";
                    sqlsrv_query($conn_hq,$sqlbiores);
                     
                    }

                    if($res >= $plausibleLow && $res <= $plausibleHigh) {



                        $sql5="update HaemResults50 set Units='$units',Result='$res', Analyser = 'Manual', Comment='$comment' where Code = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
                        if($results2 > 0){
                         $delres="delete from HaeRequests where SampleID='$sampleid' AND Code='$Code'";
                         sqlsrv_query($conn_hq,$delres);
                        }





                        if(\App\Http\Controllers\addresults::getresult4($sampleid,$Code == '' )){
                        
                        $btn = '<button type="button" class="btn btn-primary addrbtn btn-xs" > <i class="fa fa-plus"></i></button>';
                        
                         } else {

                            $btn =  \App\Http\Controllers\addresults::getresult4($sampleid, $Code);
                         }


                      $s1 = \App\Http\Controllers\addresults::getranges4($shortname,$getsex,$request->age, 'Haematology',$Code);
                      $s2 = \App\Http\Controllers\addresults::getflags4($shortname,$getsex,$request->age, 'Haematology',$sampleid);
                      $s3 = \App\Http\Controllers\addresults::getdata4($sampleid,$Code); 
                     
                      if(\App\Http\Controllers\addresults::getvalid4($sampleid,$Code) =='1'){
                        $s4 = '<i class="fa fa-check text-primary"></i>';
                      }else{ 
                    $s4= '';
                     } 
                   
                    $data=md5($shortname);
                    // $analyser=$datajoins['AnalyserID'];
                     $analyser='';
                     $mydata='
                            
                    <td>&nbsp;&nbsp;<input type="checkbox" class=" px-4 form-check-input checkedinput ">
                        &nbsp;&nbsp;'.$shortname.'</td>
                    <td class="showmodal"  id="'.$shortname.'"  name="'.$data.'"">'.$btn.'</td>

                    <td>'.$units.'</td>
                    <td>'.$s1.'</td>
                    <td>'.$s2.'</td>
                    <td>'.$s3.'</td>
                    <td>'.$s4.'</td>
                    <td></td>
                    <td></td>
                    <td>'.$analyser.'</td>
               
';



                        return response()->json(['success'=>true, 'rows11' => $rows11,'data'=>$mydata,'data1'=>$data]);
                    }

                    else {

                        return response()->json(['error'=>true, 'rows11' => $rows11]);
                    }

                        
                    }
                    
                }

// Coagulation
                elseif($request->dept == "Coagulation"){ 

                    $getcode = "SELECT * FROM CoagTestDefinitions  WHERE shortname = '$Code'";
                    $qu = sqlsrv_query($conn_hq,$getcode);
                    $getrow = sqlsrv_fetch_array($qu);
                     $Code = $getrow['Code'];

                    $sql11 ="SELECT * FROM CoagTestDefinitions where  AgeToDays >= '$getage1' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
    
    
                    if ($count11 > 0) {
                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                        if($getsex == 'F') {
                            $NormalLow = $rows11['FemaleLow'];
                            $NormalHigh = $rows11['FemaleHigh'];

                            // $NormalLow = round($rows11['FemaleLow'],1);
                            // $NormalHigh = round($rows11['FemaleHigh'],1);
                       }
                       else {
                        $NormalLow = $rows11['MaleLow'];
                        $NormalHigh = $rows11['MaleHigh'];

                        // $NormalLow = round($rows11['MaleLow'],1);
                        // $NormalHigh = round($rows11['MaleHigh'],1);
                    }



                    $plausibleLow = round($rows11['PlausibleLow'],2);
                    $plausibleHigh = round($rows11['PlausibleHigh'],2);

                    if($plausibleHigh == NULL  ){
                        $plausibleHigh = 9999;
                    }
                    
                    if($plausibleLow == NULL  ){
                        $plausibleLow = 0;
                    }

                   $sqlbiore="select * from CoagResults where SampleID='$sampleid' AND Code ='$Code'";
                    $query=sqlsrv_query($conn_hq,$sqlbiore);
                    $count=sqlsrv_has_rows($query);

                    if($count  == 0){
                    
                    $sqlbiores="insert into  CoagResults(SampleID,Code,Printed,Valid) values('$sampleid','$Code','0','0')";
                    sqlsrv_query($conn_hq,$sqlbiores);
                     
                    }

                    
                    if($res >= $plausibleLow && $res <= $plausibleHigh) {

                    $getdp="select TOP(1) * from CoagTestDefinitions where Code='$Code'";
                    $querydp=sqlsrv_query($conn_hq,$getdp);
                    $row=sqlsrv_fetch_array($querydp);
                    $dp=$row['dp'];

                    if($dp =='0'){
                      $res=$res;
                    }else {
                        $res=round($res, $dp);
                    }

                        $sql5="update CoagResults set Units='$units',Result='$res', Analyser = 'Manual', NormalLow='$NormalLow',NormalHigh='$NormalHigh',Comment = '$comment',
                         RunDate = '".date('Y-m-d h:i:s')."',RunTime = '".date('Y-m-d h:i:s')."' where Code = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);

                        if($results2){
                            $delreq = "DELETE from CoagRequests where SampleID = '$sampleid' and Code='$Code'";
                            sqlsrv_query($conn_hq,$delreq);
                        }



                        if(\App\Http\Controllers\addresults::getresult3($sampleid,$Code == '' )){
                        
                        $btn = '<button type="button" class="btn btn-primary addrbtn btn-xs" > <i class="fa fa-plus"></i></button>';
                        
                         } else {

                            $btn =  \App\Http\Controllers\addresults::getresult3($sampleid, $Code);
                         }

                        

                      $s1 = \App\Http\Controllers\addresults::getranges2($shortname,$getsex,$request->age, 'Coagulation',$Code);
                      $s2 = \App\Http\Controllers\addresults::getflags3($shortname,$getsex,$request->age, 'Coagulation',$sampleid);
                      $s3 = \App\Http\Controllers\addresults::getdata3($sampleid,$Code); 
                     
                      if(\App\Http\Controllers\addresults::getvalid2($sampleid,$Code) =='1'){
                        $s4 = '<i class="fa fa-check text-primary"></i>';
                      }else{ 
                    $s4= '';
                     } 

                    $data=md5($shortname);
                   
                    // $analyser=$datajoins['AnalyserID'];
                     $analyser='';
                     $mydata='
                            
                    <td>&nbsp;&nbsp;<input type="checkbox" class=" px-4 form-check-input checkedinput ">
                        &nbsp;&nbsp;'.$shortname.'</td>
                    <td class="showmodal"  id="'.$shortname.'"  name="'.$data.'">'.$btn.'</td>

                    <td>'.$units.'</td>
                    <td>'.$s1.'</td>
                    <td>'.$s2.'</td>
                    <td>'.$s3.'</td>
                    <td>'.$s4.'</td>
                    <td></td>
                    <td></td>
                    <td>'.$analyser.'</td>
               
';



                    return response()->json(['success'=>true, 'rows11' => $rows11,'data'=>$mydata,'data1'=>$data]);
                    }

                    else {

                        return response()->json(['error'=>true, 'rows11' => $rows11]);
                    }

                        
                    }
                    
                }


// External
                elseif($request->dept == "External"){ 
                   
              
                        
                         $sql5="update ExtResults set units='$extunits',result='$res' ,Comment ='$comment' where Analyte = '$Code' AND SampleID = '$sampleid'";
                    
                        $results2 = sqlsrv_query($conn_hq, $sql5);

                        $rows11=[];
                       
    
                        

                
       


                   if(\App\Http\Controllers\addresults::getresult5($sampleid, $Code) !=''){
                     $btn= \App\Http\Controllers\addresults::getresult5($sampleid, $Code);
                    }else{ 
                $btn= '<button type="button" class="btn btn-primary addrbtn btn-xs" > <i class="fa fa-plus"></i></button>';}
                $data=md5($Code);
                $range= \App\Http\Controllers\addresults::getrange5($sampleid, $Code,$getsex);
                $comment= \App\Http\Controllers\addresults::getComment23($sampleid, $Code);

                $mydata='<td>&nbsp;&nbsp;<input type="checkbox" class=" px-4 form-check-input checkedinput ">
                    &nbsp;&nbsp;'.$Code.'</td>
                    <td class="showmodal"  id="'.$Code.'"  name="'.$data.'">     
                    '.$btn.'
                    </td>
                    <td>'.$units.'</td>
                    <td>'.$range.'</td>
                    <td></td>
                    <td>'.$comment.'</td>
                    <td></td>
                    <td></td>';
                // $mydata='<td>Usman</td>';
         

                    // = '';
                    // $plausibleHigh = '';
                        // return $mydata;
                    if($results2){
                        
                        return response()->json(['success'=>true,'rows11' => $rows11, "data" =>$mydata ,'data1'=>$data]);
                    }
                   
                    
                }
            
  
    }
    
    
    
    
    
    public static function getid($sampleid='', $testcode= '', $dept = '') {


         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


	$department="";
        
            if($dept == "Biochemistry"){ 
               

                $department = 'BioResults';
                $code = 'Code';
				$column = 'result';
                $tests = 'BioTestDefinitions';


            }
            elseif($dept == "Coagulation"){ 


                $department = 'CoagResults';
                $code = 'Code';
				$column = 'Result';
                $tests = 'CoagTestDefinitions';
            }
      
            elseif($dept == "Haematology"){

                $department = "HaemResults50";
                $code = 'Code';
				$column = 'Result';
                $tests = 'HaemTestDefinitions';
    
            }

            elseif($dept == "External"){


                $department = "ExtResults";
                $code = 'Analyte';
				$column = 'Result';
                $tests = 'ExternalDefinitions';
    
            }
            else{
                $department = "";
                $code = '';
				$column = '';
                $tests = '';
            }

            
            $VP = '';
            
  $sql2 = "select * from  $department  where $code = '$testcode' AND SampleID = '$sampleid' ";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
            $count = sqlsrv_has_rows($results);
           $rows3 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
           
           if($dept == "Biochemistry"){ 

            $comment = $rows3['Comment'];
            $flags = $rows3['Flags'];
			$result = $rows3[$column];


            $NormalLow = $rows3['NormalLow'];
            $NormalHigh = $rows3['NormalHigh'];

            $NormalLow = round($NormalLow,1);
            $NormalHigh = round($NormalHigh,1);


            $range = $NormalLow.'-'.$NormalHigh;

            $printed = $rows3['Printed'];
            $valid = $rows3['Valid'];

            if ($valid == 1 && $printed == 1){
                $VP = 'VP';
            }
            elseif ($valid == 1 && $printed == 0){
                $VP = 'V';
            }
            elseif ($valid == 0 && $printed == 1){
                $VP = 'P';
            }
            elseif ($valid == 0 && $printed == 0){
                $VP = '';
            }


        }
        elseif($dept == "Coagulation"){ 


            $comment = $rows3['Comment'];
            $flags = '';

            $NormalLow = $rows3['NormalLow'];
            $NormalHigh = $rows3['NormalHigh'];


            $NormalLow = round($NormalLow,1);
            $NormalHigh = round($NormalHigh,1);

            $range = $NormalLow.'-'.$NormalHigh;


            $printed = $rows3['Printed'];
            $valid = $rows3['Valid'];

            if ($valid == 1 && $printed == 1){
                $VP = 'VP';
            }
            elseif ($valid == 1 && $printed == 0){
                $VP = 'V';
            }
            elseif ($valid == 0 && $printed == 1){
                $VP = 'P';
            }
            elseif ($valid == 0 && $printed == 0){
                $VP = '';
            }

            if($rows3 != ''){
			$result = $rows3['Result'];


        }
        else {
            $rows3 = '';
        }
        }
  
        elseif($dept == "Haematology"){

            $comment = $rows3['Comment'];
            $flags = $rows3['Flags'];
			$result = $rows3['Result'];
            $range = '';


            $printed = $rows3['Printed'];
            $valid = $rows3['Valid'];

            if ($valid == 1 && $printed == 1){
                $VP = 'VP';
            }
            elseif ($valid == 1 && $printed == 0){
                $VP = 'V';
            }
            elseif ($valid == 0 && $printed == 1){
                $VP = 'P';
            }
            elseif ($valid == 0 && $printed == 0){
                $VP = '';
            }

        }

        elseif($dept == "External"){

            $comment = '';
            $flags = '';
			$result = $rows3['Result'];
            $comment = $rows3['Comment'];
            $range = '';


            $printed = $rows3['Printed'];
            $valid = $rows3['Valid'];

            if ($valid == 1 && $printed == 1){
                $VP = 'VP';
            }
            elseif ($valid == 1 && $printed == 0){
                $VP = 'V';
            }
            elseif ($valid == 0 && $printed == 1){
                $VP = 'P';
            }
            elseif ($valid == 0 && $printed == 0){
                $VP = '';
            }
        }
        




        if($tests == 'ExternalDefinitions'){

            $sql3 = "select * from  $tests where AnalyteName = '$testcode'";

            $resultstest = sqlsrv_query($conn_hq, $sql3);
            $counttest = sqlsrv_has_rows($resultstest);
    
            if($counttest > 0) {
                $rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC);
                $SampleType = $rowstest['SampleType'];
        
                }
                else {
             
                    $SampleType = '';
                }
         }

         else {
            $sql3 = "select * from  $tests where $code = '$testcode'";

            $resultstest = sqlsrv_query($conn_hq, $sql3);
            $counttest = sqlsrv_has_rows($resultstest);
    
            if($counttest > 0) {
                $rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC);
                $SampleType = $rowstest['SampleType'];
        
                }
                else {
              
                    $SampleType = '';
                }

         }


            
          if($count > 0){
        
           $data  = [
         
            'result' => $result,
            'units' => $rows3['Units'],
            'comment'=>$comment,
            'flags'=>$flags,
            'analyser'=>$rows3['Analyser'],
            'range'=>$range,
            'VP'=>$VP,
            'SampleType'=> $SampleType
           ];
        }
        else{
            $data  = [
         
                'result' => '',
                'units' => '',
                'comment'=>'',
                'flags'=>'',
                'analyser'=>'',
                'range'=>'',
                'VP'=>'',
                'SampleType'=> ''
               ];
        }

        return $data;
           
        

       

        // elseif($dept == "External") {
          
        //     $sql2 = "select * from ExtResults where Analyte = '$code' AND SampleID = '$sampleid' ";
        //     $params = array();
        //     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        //     $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
        //     $count = sqlsrv_has_rows($results);
        //    $rows5 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);

        //    $data3  = [
         
        //     'result' => $rows5['Result'],
        //     'units' => $rows5['Units'],
        //     'comment' => $rows5['Comment']
        //    ];

         
        // }



        
    
    
        
        
    //return view ('Results',['data'=>$data]);  
    return \Response::json($data);

   }






       
   public  function modalData(Request $req) {


  

    $testdefi = [];
    $testget = 0;


    $dept = $req->dept;
    $testcode = $req->code;

     $comment = '';
        $flags = '';
        $analyser = '';

    


    $sampleid = $req->sampleid;
 
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


  
    
        if($dept == "Biochemistry"){ 


            $department = 'BioResults';
            $code = 'Code';
			$result = 'result';
            //$units - 'Units';

            $tests = 'BioTestDefinitions';

            $getcode1 = 'shortname';


            $getcode = "SELECT * FROM BioTestDefinitions  WHERE shortname = '$testcode'";
            $qu = sqlsrv_query($conn_hq,$getcode);
            $getrow = sqlsrv_fetch_array($qu);
            $testcode = $getrow['Code'];
    

        }
        elseif($dept == "Coagulation"){ 


            $department = 'CoagResults';
            $code = 'Code';
			$result = 'Result';
            // $units - 'Units';
            $tests = 'CoagTestDefinitions';

            $getcode1 = 'shortname';

            $getcode = "SELECT * FROM CoagTestDefinitions  WHERE shortname = '$testcode'";
            $qu = sqlsrv_query($conn_hq,$getcode);
            $getrow = sqlsrv_fetch_array($qu);
            $testcode = $getrow['Code'];
        }
  
        elseif($dept == "Haematology"){

            $department = "HaemResults50";
            $code = 'Code';
			$result = 'Result';
            // $units - 'Units';
        
            $tests = 'HaemTestDefinitions';

            $getcode1 = 'shortname';
        }

        elseif($dept == "External"){

            $department = "ExtResults";
            $code = 'Analyte';
			$result = 'result';
            // $units - 'units';
        
            $tests = 'ExternalDefinitions';

            $getcode1 = 'AnalyteName';


        }

   
   
     
        
        $sql2 = "select * from  $department  where $code = '$testcode' AND SampleID = '$sampleid' ";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
        $count = sqlsrv_has_rows($results);
       $rows3 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);

  


       if($tests != ''){


        if($tests == 'BioTestDefinitions'){

            $units = 'units';
         }
         else {
            
            $units = 'Units';
         }

     

         if($tests == 'ExternalDefinitions'){

            $sql3 = "select distinct $units as Units,SampleType from  $tests where AnalyteName = '$testcode' AND  $units != ''";

            $resultstest = sqlsrv_query($conn_hq, $sql3);
            $counttest = sqlsrv_has_rows($resultstest);
    
            if($counttest > 0) {
                $rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC);
                $units =  $rowstest['Units'];
                $SampleType = $rowstest['SampleType'];
        
                }
                else {
                    $units = '';
                    $SampleType = '';
                }
         }

         else {


      $sql3 = "select distinct $units as Units,SampleType from  $tests where $code = '$testcode' AND  $units != ''";

        $resultstest = sqlsrv_query($conn_hq, $sql3);
        $counttest = sqlsrv_has_rows($resultstest);

        if($counttest > 0) {
        $rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC);
        $units =  $rowstest['Units'];

        $SampleType = $rowstest['SampleType'];

        }
        else {
            $units = '';
            $SampleType = '';
        }
        
    }
     

        // if($counttest >0){
            // while($rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC)){
                 
            //    $units =  $rowstest['Units'];
            

            //     $testdefi[$testget] =  $units;
            //     $testget++;
                
                
            // }
           
            // while($rowstest = sqlsrv_fetch_array($resultstest, SQLSRV_FETCH_ASSOC)){
            //     $testdefi[$testget] = $rowstest['Units'];
            //     $testget++;
            // }

            
        // }
        
       
       }


  if($count > 0){
       
       if($dept == "Biochemistry"){ 

    
        //$units = $rows3['Units'];
        $comment = $rows3['Comment'];
        $flags = $rows3['Flags'];
        $analyser = $rows3['Analyser'];

       
    
        

    }
    elseif($dept == "Coagulation"){ 


        $comment = '';
        $flags = '';
        $analyser = $rows3['Analyser'];
        //$units = $rows3['Units'];
     


    }

    elseif($dept == "Haematology"){

        $comment = $rows3['Comment'];
        $flags = $rows3['Flags'];
        $analyser = $rows3['Analyser'];
        //$units = $rows3['Units'];
      
    

    }

    elseif($dept == "External"){

        $comment = '';
        $flags = '';
        $analyser = '';
        //$units = $rows3['units'];
        

    }
    
}
        
      if($count > 0){
    
       $data  = [
     
        'result' => $rows3[$result],
        // 'units' => $rows3['Units'],
        'units' => $units,
        'comment'=>$comment,
        'flags'=>$flags,
        'analyser'=>$analyser,
        'SampleType'=>$SampleType,
        'testcode' => $testcode

       ];
    }
    else{
        $data  = [
     
            'result' => '',
            'units' => $units,
            'comment'=>'',
            'flags'=>'',
            'analyser'=>'',
            'SampleType'=>'',
            'testcode'=>''
           ];
    }

   
       

    


    
    
//return view ('Results',['data'=>$data]);  
return \Response::json($data);

}

    
    
    //    public static function checkResult($department='', $sample='',$testcode='')
    //     {
    //            if($department == 'Haem'){
    //             $table = 'HaemResults50';
    //            } 
    //            else{
    //             $table = $department.'Results';
    //            }
    
               
    //            $serverName = "WIN-VSRLG0S17CC";
    //            $connectionInfo = array( "Database"=>"CavanTest",
    //                                     "UID"=>"CSSQL",
    //                                     "PWD"=>"Custom@4321",
    //                                     "Encrypt"=>true,
    //                                     "TrustServerCertificate"=>true);
    //            $conn_hq = sqlsrv_connect( $serverName, $connectionInfo);
    
    //            $sql = "select "
    
    
    //         //    return $result = DB::table('$department'.'Results') 
    //         //                   ->where('sampleID', $sample)
    //         //                   ->where('Code', $testcode)
    //         //                   ->get();
    //     }

    public function addphone(Request $request) {

          
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


      
        $sid = $request->phonesid;
        $phoneto = $request->phoneto;
        $phoneby = $request->phoneby;
        $phonedate = $request->phonedate;




        $phonedate = Carbon::parse($phonedate)->format('Y-m-d H:i:s');

        $phcomment = $request->phonecomment;

        $commentvalue = $request->commentvalue;

        if($phcomment =='Result given to -'){
         $phcomment = $phcomment .' '.$commentvalue;
        }



        $Haemresultsphoned = $request->Haemresultsphoned;
        $Bioresultsphoned = $request->Bioresultsphoned;
        $Coagresultsphoned = $request->Coagresultsphoned;
        $Gasresultsphoned = $request->Gasresultsphoned;
        $Microresultsphoned = $request->Microresultsphoned;
        $notphoned = $request->notphoned;


  $validator = Validator::make($request->all(), [      
        'phoneto' => 'required',
        'phonecomment' => 'required',
        'phonecall' => 'required'

    ]);


 

        // $phonedarr = [
        //     $Haemresultsphoned,
        //     $Bioresultsphoned,
        //     $Coagresultsphoned,
        //     $Gasresultsphoned,
        //     $Microresultsphoned,
        //     $notphoned
        // ];

        if($Haemresultsphoned == NULL){
            $Haemresultsphoned = ' ';
        }
        if($Bioresultsphoned == NULL){
            $Bioresultsphoned = ' ';
        }
        if($Coagresultsphoned == NULL){
            $Coagresultsphoned = ' ';
        }
        if($Gasresultsphoned == Null){
            $Gasresultsphoned=' ';
        }
        if($Microresultsphoned == Null){
            $Microresultsphoned=' ';
        }
        if($notphoned == Null){
            $notphoned=' ';
        }



        $discipline =  $Haemresultsphoned.$Bioresultsphoned.$Coagresultsphoned.$Gasresultsphoned.$Microresultsphoned.$notphoned;




    


    //     $trim=trim($phonedarr ,'[ ]');
    //     $array=explode(',',$trim);

    //     return $array;

    //     $res=[];
    //     $i=0;
    // foreach($array as $key=>$value)
    // {
    //      // $int[$i] = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    //      // $i++;
    //     $result = preg_replace("/[^a-zA-Z0-9]+/", "", $value);
    
    //      $res[$i]=str_replace('value','',$result);
    //      $i++;
    // }

    // $res2=implode(" ", $res);



       

   
        $direction = $request->phonecall;



        $year = Carbon::parse($phonedate)->format('Y');
       

       
        // $sql2 = "SELECT * from PhoneLog where SampleID = '$sid'";
        // $params = array();
        // $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        // $results2 = sqlsrv_query($conn_hq, $sql2, $params, $options);
        // $count = sqlsrv_has_rows($results2);

        // if ($count > 0){
          

        //     $sql3 = "update PhoneLog set PhonedTo = '$phoneto', PhonedBy= '$phoneby',Comment='$phcomment',Discipline='$discipline',DateTime='$phonedate', Direction='$direction', Year = '$year' where SampleID = '$sid' ";
        //     $results3 = sqlsrv_query($conn_hq, $sql3);

    
        // return response()->json(['success'=>'Results Updated Successfully']);
        // }

        
        
        // else{
           
   if ($validator->passes()) {

        
            $sql = "INSERT into PhoneLog (SampleID,PhonedTo, PhonedBy, Comment,Discipline, DateTime, Direction, Year) values ('$sid','$phoneto','$phoneby','$phcomment','$discipline','$phonedate','$direction','$year')";
            $results = sqlsrv_query($conn_hq, $sql);

           

            // DB::insert('insert into productfeatures (pid, name, icon, description) values (?, ?, ?, ?)', 
            // [$uid, $ftitle[$key], $ficon[$key], $fdesc[$key]]);

        return response()->json(['success'=>'Results Inserted Successfully']);
}else{

    return response()->json(['error'=>$validator->errors()->first()]); 

}
            
        // }

        

}



public function validatedata(Request $request){



     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


    $sid = $request->sid;
    $depart = $request->depart;
     $comment = $request->comment;

    if($comment==''){
    
     $comment=NULL;
    }
   
    $username = Auth::user()->name;
     

   

    if($depart == "Haematology"){
        $department = 'HaemResults50';
        $discipline = 'Haem';
    }
    elseif($depart == "Biochemistry"){
        $department = 'BioResults';
        $discipline = 'Bio';
    }
    elseif($depart == "Coagulation"){
        $department = 'CoagResults';
        $discipline = 'Coag';
    }
    elseif($depart == "External"){
        $department = 'ExtResults';
        $discipline = 'Ext';
    }
    
    $datetime = date("Y-m-d h:i:s");

    $validdatetime = date("Y-m-d h:i:s");

    $sqlvalid = "UPDATE $department set Valid=1,ValidateTime = '$validdatetime' where SampleID='$sid' AND result IS NOT NULL";
    $validsave =  sqlsrv_query($conn_hq, $sqlvalid);

    $sqlgetsample="select TOP(1) * from $department where Valid='0' ORDER BY SampleID DESC";
    $querysample=sqlsrv_query($conn_hq,$sqlgetsample);
    $countsample=sqlsrv_has_rows($querysample);

    if($countsample > 0){
    $fetchsample=sqlsrv_fetch_array($querysample);
    $fetchid=$fetchsample['SampleID'];
    }else{
    $fetchid='';
    }





    $checkobs = "SELECT * from Observations where SampleID = '$sid'";
    $checkres =  sqlsrv_query($conn_hq, $checkobs);
    $checkcount =sqlsrv_has_rows($checkres);

    if($checkcount > 0) {
     if($comment==''){
        $sqlsave = "UPDATE Observations set Discipline = '$discipline',UserName = '$username',DateTimeOfRecord='$datetime' where SampleID = '$sid' AND Discipline = '$discipline'";
        $ressave = sqlsrv_query($conn_hq, $sqlsave);   
     }else{
        $sqlsave = "UPDATE Observations set Discipline = '$discipline',Comment='$comment',UserName = '$username',DateTimeOfRecord='$datetime' where SampleID = '$sid' AND Discipline = '$discipline'";
        $ressave = sqlsrv_query($conn_hq, $sqlsave);   
     }
    }
    else{
        if($comment==''){
            $sqlsave = "INSERT into Observations(SampleID,Discipline,UserName,DateTimeOfRecord) values ('$sid','$discipline','$username','$datetime')";
            $ressave = sqlsrv_query($conn_hq, $sqlsave);
        }else{
            $sqlsave = "INSERT into Observations(SampleID,Discipline,Comment,UserName,DateTimeOfRecord) values ('$sid','$discipline','$comment','$username','$datetime')";
            $ressave = sqlsrv_query($conn_hq, $sqlsave);
        }
       
}



    if($validsave && $ressave ){
    return response()->json(['success'=>'Data Validated Successfully','fetchid'=>$fetchid]);   
    }
}


public function savespecimendata(Request $request) {


     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


    $sid = $request->sid;
    $depart = $request->depart;
    $comment = $request->comment;
   
    $username = Auth::user()->name;

    if($depart == "Haematology"){
        $department = 'HaemResults50';
        $discipline = 'Haem';
    }
    elseif($depart == "Biochemistry"){
        $department = 'BioResults';
        $discipline = 'Bio';
    }
    elseif($depart == "Coagulation"){
        $department = 'CoagResults';
        $discipline = 'Coag';
    }
    elseif($depart == "External"){
        $department = 'ExtResults';
        $discipline = 'Ext';
    }
    
    $datetime = date("Y-m-d h:i:s");






    // $checkobs = "SELECT * from Observations where SampleID = '$sid'";
    // $checkres =  sqlsrv_query($conn_hq, $checkobs);
    // $checkcount =sqlsrv_has_rows($checkres);


    // if($checkcount > 0) {
    //     $sqlsave = "UPDATE Observations set Discipline = '$discipline',Comment='$comment',UserName = '$username',DateTimeOfRecord='$datetime' where SampleID = '$sid' AND Discipline = '$discipline'";
    //     $ressave = sqlsrv_query($conn_hq, $sqlsave);    
    // }
    // else{
        $sqlsave = "INSERT into Observations(SampleID,Discipline,Comment,UserName,DateTimeOfRecord) values ('$sid','$discipline','$comment','$username','$datetime')";
        $ressave = sqlsrv_query($conn_hq, $sqlsave);
    // }

    if($ressave ){
    return response()->json(['success'=>'Data Saved Successfully']);   
    }

}

    
        public function ocmnet(){
            return view('ocmOrNet');
        }

public function enterresults(Request $req){
    $sampleid =$req->sampleid2;


     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


    $sql10 = "select * from HaemResults50 where SampleID='$sampleid'";
    $res11 = sqlsrv_query( $conn_hq, $sql10);

$cliarray=[];
$getcli=0;
    while($rowscli = sqlsrv_fetch_array($res11, SQLSRV_FETCH_ASSOC)){

                    $cliarray[$getcli] = $rowscli;
                    $getcli++;

                }





 foreach($cliarray as $res12){
    $getcode = $res12['Code'];
   
    $sql11 = "select * from HaemTestDefinitions where Code='$getcode'";
    $res14 = sqlsrv_query( $conn_hq, $sql11);
    $getCode2 = sqlsrv_fetch_array($res14, SQLSRV_FETCH_ASSOC);
    $getunits =$getCode2['Units'];
    $randomno = mt_rand(50, 100);
   
        $sql5="Update HaemResults50 set Result = '$randomno', Units = '$getunits' Where SampleID = '$sampleid' and Code='$getcode'";
        $res12 = sqlsrv_query( $conn_hq, $sql5);

    }

    return response()->json(['success'=>'Data Update Successfully']);
}
public function bloodgas(){
return view('bloodgas');    
}




public function biochemqc(Request $request,  $id=NULL){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
    if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }    
 

    $rowsedit = [];
    $qcarray = [];
    $getqc = 0;
    
    if ($request->ajax()) {
   

    
    $sql = "SELECT * from BioQCDefs";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $results = sqlsrv_query($conn_hq, $sql);
    $count = sqlsrv_has_rows($results);

    if($count > 0){

        while($rows = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)){

            $qcarray[$getqc] = $rows;
            $getqc++;

        }


    return Datatables::of($qcarray)
                ->addIndexColumn()
                ->addColumn('action', function($row){
 
                       $btn = '
                            <div class="btn-group" role="group">
                            <a title="Edit Product"  class="btn btn-primary"  href="/ocm/BioChemistryQc/'.$row['ControlName'].'"  >
                             <i class="bx bx-edit"></i>
                            </a>
                            <a  type="button"  id="'.$row['ControlName'].'" title="Delete Product" class="delete btn btn-dark"><i class="bx bx-x-circle" ></i>
                            </a>
                             </div>
                              ';

                        return $btn;
                }) 

                ->setRowId('')
                ->rawColumns(['action'])
                ->make(true);

            }
        }

            if($id!=NULL){

                $sql = "SELECT * from BioQCDefs where ControlName = '$id'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $results = sqlsrv_query($conn_hq, $sql);
                $count = sqlsrv_has_rows($results);

                if($count > 0 ){
                    $rowsedit = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
                }

            }

    return view('biochemistryqc')->with('rowsedit', $rowsedit);;
}



public function qcsave(Request $request, $id = NULL){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
    if(!$conn_hq) {
    die( print_r( sqlsrv_errors(), true));
}

    $cname = $request->controlname;
    $aname = $request->aliasname;

    $cnameprev = $request->controlnameprev;
    


 


    $validator = Validator::make($request->all(), [      
        'controlname' => 'required',
        'aliasname' => 'required'

    ]);


    if ($validator->passes()) {


        $sqlcheck = "SELECT * FROM BioQCDefs where ControlName = '$cnameprev'";
        $querycheck=sqlsrv_query($conn_hq,$sqlcheck);
        $countcheck = sqlsrv_has_rows($querycheck);

       
    if($countcheck > 0){

      



        $sql = "UPDATE BioQCDefs set ControlName = '$cname', AliasName = '$aname' where ControlName = '$cnameprev'";
        $results = sqlsrv_query($conn_hq, $sql);

        if($results){
            return response()->json(['success'=>'Data Updated Successfully']);
        }
    }

    else{

            $sqlcheck = "SELECT * FROM BioQCDefs where ControlName = '$cname'";
        $querycheck=sqlsrv_query($conn_hq,$sqlcheck);
        $countcheck = sqlsrv_has_rows($querycheck);

        if($countcheck > 0){

          $rowexist = sqlsrv_fetch_array($querycheck, SQLSRV_FETCH_ASSOC);
         $countname = $rowexist['ControlName'];

        if($countname == $cname){
            return response()->json(['error'=>'Control Name already exists']);
        }

}
        $sql = "Insert into BioQCDefs (ControlName,AliasName) values('$cname','$aname')";
        $results = sqlsrv_query($conn_hq, $sql);
        if($results){
            return response()->json(['success'=>'Data Inserted Successfully']);
        }
    }

    }

    else {
       
        return response()->json(['error'=>$validator->errors()->first()]);
    }
    
    // return view('qcsave');
}



public function BioChemistryQcdel(Request $req){


   
    $controlname= $req->cnametext;

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


        $sqldel = "DELETE from BioQCDefs where ControlName = '$controlname'";
        $query=sqlsrv_query($conn_hq,$sqldel);

        // if($query){

        //     return response()->json(['success'=>true]);
        // }

}

public function BioCode(){
    return view('biocode');
  }
        
public function fasting(){
    return view('fasting');
  }
public function assignpanel(){
  return view('assignpanel');
  }

 public function autovalid(){
  return view('autovalid');
  }
  public function coagtestcode(){
 return view('coagtestcode');
     }
                        
 public function inuse(){
                    return view('inuse');
     }
     public function deltachecking(){

      return view('deltachecking');
     }
     public function haemcodemap(){
        return view('haemcodemap');
     }
     public function biocodemap(){
        return view('biocodemap');
     }
     
     public function saveresult(Request $req){



     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

      $address = $req->address;
      $address2 = $req->address2;
      $address4 = $req->address2;
      $age = $req->age;
      $chart = $req->chart;
      $clinician = $req->clinician;
      $code = $req->code;
      $dept = $req->dept;
      $dob2 =  date('Y-m-d H:i:s', strtotime($req->dob2));
      $fname = $req->fname;
      $gp = $req->gp;
      $hospital = $req->hospital;
       $myArray = $req->myArray;
      $myArray2 = $req->myArray2;
      $myArray3 = $req->myArray3;
      $recieved = date('Y-m-d H:i:s', strtotime($req->recieved));
      $results = $req->results;
      $sampledate = date('Y-m-d H:i:s', strtotime($req->sampledate));
      $sampleid = $req->sampleid;
      $selectunits = $req->selectunits;
      $sid = $req->sid;
      $sname = $req->sname;
      $specimancomments = $req->specimancomments;
      $tcomment = $req->tcomment;
      $ward = $req->ward;
       $biochemistry2 = $req->biochemistry2;
      $coagulation2 = $req->coagulation2;
      $external2 = $req->external2;
      $patname=$fname.$sname;
      $sex=$req->sex;
      $fasting=$req->fasting;
      $copyto=$req->copyto;
      $demographicscmt=$req->demographicscmt;

        $biochemistry=$req->biochemistry;
        $heamatology=$req->heamatology;
        $coagulation=$req->coagulation;
        $microbiology=$req->microbiology;
        $external=$req->external;

     $clinicaldetails=$req->clinicaldetails;
     $pregnent2=$req->pregnent2;

     if($pregnent2 ==''){
        $pregnent2=0;
     }

    $address3=$req->address3;
    $address4=$req->address4;

    $siteresult50=$req->siteresult50;
    $sitedel=$req->sitedel;
    $username=Auth::user()->name;


      $smalldate =date('Y-m-d H:i:s', strtotime($req->recieved));

      if($fasting ==''){
        $fasting=0;
      }
      $urgent=$req->urgent;
      
      if($urgent ==''){
        $urgent=0;
      }


      $validator = Validator::make($req->all(), [      
            'sid' => 'required',
            'address' => 'required',
            'age' => 'required',
            'clinician' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'dept' => 'required',
            'hospital' => 'required',
            'ward' => 'required',
            'sex'=>'required'
        ]);

        if ($validator->passes()) {
         
        // $sql23="select * from demographics where SampleID='$sid'";
        // $query23=sqlsrv_query($conn_hq,$sql23);
        // $count23=sqlsrv_has_rows($query23);
        // if($count23 > 0){
        //     return 2;
        //     $sql24="delete from demographics where SampleID='$sid'";
        //     sqlsrv_query($conn_hq,$sql24);
        // }
      

        $sql="insert into demographics (SampleID,Chart,PatName,Age,Sex,DoB,Addr0,Addr1,Ward,Clinician,GP,SampleDate,Hospital,Fasting,Urgent,RecDate,SurName,ForeName,addr3,addr4,ClDetails,Pregnant) values('$sid','$chart','$patname','$age','$sex','$dob2','$address','$address2','$ward','$clinician','$gp','$sampledate','$hospital','$fasting','$urgent','$recieved','$sname','$fname','$address3','$address4','$clinicaldetails','$pregnent2')";
       sqlsrv_query($conn_hq,$sql);

       $sql50="insert into SiteDetails50(SampleID,Site,SiteDetails,UserName,DateTimeOfRecord,Medrenal) values('$sid','$siteresult50','$sitedel','$username','$sampledate','0')";
       sqlsrv_query($conn_hq,$sql50);

    $sqlcopy="Insert into sendcopyto(SampleID,GP) values('$sid','$copyto')";
    sqlsrv_query($conn_hq,$sqlcopy);


     if($demographicscmt !=''){
    $sqldemocmt="insert into observations(SampleID,Discipline,Comment,DateTimeOfRecord,UserName) values('$sid','$dept','$demographicscmt','$sampledate','$username')";
    sqlsrv_query($conn_hq,$sqldemocmt);
     }
   

    // if($biochemistry =='Biochemistry'){

    //  $getsqlval="select * from  BioTestDefinitions where longname='Rejected Bio'";
    // $querysql=sqlsrv_query($conn_hq,$getsqlval);
    // $rows14=sqlsrv_fetch_array($querysql);
    // $longname=$rows14['longname'];
    // $analyser=$rows14['Analyser'];
    // $code=$rows14['Code'];

    // $insertsql="insert into BioResults(SampleID,Valid,Analyser,Result,RunDate,Code) values('$sid','1','$analyser','REJ','$sampledate','$code')";
    // sqlsrv_query($conn_hq,$insertsql);
    // }

    //  if($external =='External'){
    
    // $getsqlval="select * from  BioTestDefinitions where longname='Rejected External'";
    // $querysql=sqlsrv_query($conn_hq,$getsqlval);
    // $rows14=sqlsrv_fetch_array($querysql);
    // $longname=$rows14['longname'];
    // $analyser=$rows14['Analyser'];

    // $insertsql="insert into BioResults(SampleID,Valid,Analyser,Result,RunDate,Code) values('$sid','1','$analyser','REJ','$sampledate',$code)";
    // sqlsrv_query($conn_hq,$insertsql);
    // }
    // if($heamatology =='Heamatology'){
   
    // $getsqlval="select * from  HaemTestDefinitions where AnalyteName='IPU'";
    // $querysql=sqlsrv_query($conn_hq,$getsqlval);
    // $rows14=sqlsrv_fetch_array($querysql);
    // $longname=$rows14['AnalyteName'];
    // $code=$rows14['Code'];

    // $insertsql="insert into HaemResults50(SampleID,Code,Valid,Analyser,Result) values('$sid','$code','1','$longname','REJ')";
    // sqlsrv_query($conn_hq,$insertsql);
    // }
    // if($coagulation =='Coagulation'){

    // $getsqlval="select * from  CoagTestDefinitions where Testname='Rejected'";
    // $querysql=sqlsrv_query($conn_hq,$getsqlval);
    // $rows14=sqlsrv_fetch_array($querysql);
    // $longname=$rows14['Testname'];
    // $code=$rows14['Code'];

    // $insertsql="insert into CoagResults(SampleID,Valid,Analyser,Result,Code,RunDate,Printed) values('$sid','1','$longname','REJ','$code','$sampledate','0')";
    // sqlsrv_query($conn_hq,$insertsql);
    // }


     

       if($biochemistry2 =='Biochemistry'){

        foreach($myArray as $myarrays){

      if($myarrays !=''){
        
        $sql222="select Analyser,Code from BioTestDefinitions where shortname='$myarrays'";
        $query222=sqlsrv_query($conn_hq,$sql222);
        
        $count222=sqlsrv_has_rows($query222);
       
       if($count222 > 0){
       
        $rows222=sqlsrv_fetch_array($query222);
       
        $analysername = $rows222['Analyser'];
        $Code = $rows222['Code'];
         $sql44="Insert into BioRequests(SampleID,Code,DateTime,DateTimeOfRecord,Programmed,AnalyserID) values('$sid','$Code','$sampledate','$smalldate','1','$analysername')";
        sqlsrv_query($conn_hq,$sql44);
       }
      }
        }
       }


        if($coagulation2 =='Coagulation'){

        foreach($myArray2 as $coagresults){

      if($coagresults !=''){
         $sql3="select * from CoagTestDefinitions where Testname='$coagresults'";
        $query3=sqlsrv_query($conn_hq,$sql3);
        $count3=sqlsrv_has_rows($query3);
       if($count3 > 0){
        $rows=sqlsrv_fetch_array($query3);
        $coagcode = $rows['Code'];
        $sql4="Insert into CoagRequests(SampleID,Code,DateTime) values('$sid','$coagcode','$sampledate')";
        sqlsrv_query($conn_hq,$sql4);
       }

        $sql4="select * from HaemTestDefinitions where Code='$coagresults'";
        $query4=sqlsrv_query($conn_hq,$sql4);
        $count4=sqlsrv_has_rows($query4);
       if($count4 > 0){

        $rows=sqlsrv_fetch_array($query4);
     $haeanalyser = $rows['AnalyteName'];
     $haeacode = $rows['Code'];
     $sql4="Insert into HaeRequests(SampleID,Code,DateTimeOfRecord,DateTime,Analyser) values('$sid','$haeacode','$sampledate','$smalldate','$haeanalyser')";
        sqlsrv_query($conn_hq,$sql4);
       }
      

      }
        }

       }



      if($external2 =='External'){
  
       foreach($myArray3 as $myextcode){
      if($myextcode !=''){


        $sql4="Insert into ExtResults(SampleID,Analyte) values('$sid','$myextcode')";
        sqlsrv_query($conn_hq,$sql4);

        $sql34="insert into Biomnisrequests(SampleID,TestCode,SampleDateTime) values('$sid','$myextcode','$sampledate')";
        sqlsrv_query($conn_hq,$sql34);

       // }
      }
        }

       }


        return response()->json(['success'=>'Data Saved.','sid'=>$sid]); 
        }{
             return response()->json(['error'=>$validator->errors()->first()]);
        }

    
     }
     public function updateresults(Request $req){




     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

    //   $sampleid2 = $req->sampleid2; 
    //   $address = $req->address;
    //   $address2 = $req->address2;
    //   $address4 = $req->address2;
    //   $age = $req->age;
    //   $chart = $req->chart;
    //   $clinician = $req->clinician;
    //   $code = $req->code;
    //   $dept = $req->dept;
    //   $dob2 = $req->dob2;
    //   $fname = $req->fname;
    //   $gp = $req->gp;
    //   $hospital = $req->hospital;
    //    $myArray = $req->myArray;
    //   $myArray2 = $req->myArray2;
    //   $myArray3 = $req->myArray3;
    //   $recieved =$req->recieved;
    //   $results = $req->results;
    //   $sampledate = date('Y-m-d H:i:s', strtotime($req->sampledate));
    //   $sampleid = $req->sampleid;
    //   $selectunits = $req->selectunits;
    //   $sid = $req->sid;
    //   $sname = $req->sname;
    //   $specimancomments = $req->specimancomments;
    //   $tcomment = $req->tcomment;
    //   $ward = $req->ward;
    //    $biochemistry2 = $req->biochemistry2;
    //   $coagulation2 = $req->coagulation2;
    //   $external2 = $req->external2;
    //   $patname=$fname.$sname;
    //   $sex=$req->sex;
    //   $fasting=$req->fasting;
    //   $copyto=$req->copyto;
    //   $demographicscmt=$req->demographicscmt;

    //     $biochemistry=$req->biochemistry;
    //     $heamatology=$req->heamatology;
    //     $coagulation=$req->coagulation;
    //     $microbiology=$req->microbiology;
    //     $external=$req->external;

    //  $clinicaldetails=$req->clinicaldetails;
    //  $pregnent2=$req->pregnent2;

    //  if($pregnent2 ==''){
    //     $pregnent2=0;
    //  }

    // $address3=$req->address3;
    // $address4=$req->address4;


    //   $smalldate =date('Y-m-d H:i:s', strtotime($req->recieved));

    //   if($fasting ==''){
    //     $fasting=0;
    //   }
    //   $urgent=$req->urgent;
      
    //   if($urgent ==''){
    //     $urgent=0;
    //   }


      $address = $req->address;
      $address2 = $req->address2;
      $address4 = $req->address2;
      $age = $req->age;
      $chart = $req->chart;
      $clinician = $req->clinician;
      $code = $req->code;
      $dept = $req->dept;
      $dob2 = date('Y-m-d H:i:s', strtotime($req->dob2));
      $fname = $req->fname;
      $gp = $req->gp;
      $hospital = $req->hospital;
      $myArray = $req->myArray;
      $myArray2 = $req->myArray2;
      $myArray3 = $req->myArray3;
      $recieved = date('Y-m-d H:i:s', strtotime($req->recieved));
      $results = $req->results;
      $sampledate = date('Y-m-d H:i:s', strtotime($req->sampledate));
      $sampleid = $req->sampleid;
      $selectunits = $req->selectunits;
      $sid = $req->sid;
      $sname = $req->sname;
      $specimancomments = $req->specimancomments;
      $tcomment = $req->tcomment;
      $ward = $req->ward;
      $biochemistry2 = $req->biochemistry2;
      $coagulation2 = $req->coagulation2;
      $external2 = $req->external2;
      $patname=$fname.$sname;
      $sex=$req->sex;
      $fasting=$req->fasting;
      $copyto=$req->copyto;
      $demographicscmt=$req->demographicscmt;

        $biochemistry=$req->biochemistry;
        $heamatology=$req->heamatology;
        $coagulation=$req->coagulation;
        $microbiology=$req->microbiology;
        $external=$req->external;

     $clinicaldetails=$req->clinicaldetails;
     $pregnent2=$req->pregnent2;

     if($pregnent2 ==''){
        $pregnent2=0;
     }

    $address3=$req->address3;
    $address4=$req->address4;

    $siteresult50=$req->siteresult50;
    $sitedel=$req->sitedel;
     $username=Auth::user()->name;
    $sampleid22=$req->sampleid22;


      $smalldate =date('Y-m-d H:i:s', strtotime($req->recieved));

      if($fasting ==''){
        $fasting=0;
      }
      $urgent=$req->urgent;
      
      if($urgent ==''){
        $urgent=0;
      }




           $validator = Validator::make($req->all(), [      
            'sid' => 'required',
            'address' => 'required',
            'age' => 'required',
            'clinician' => 'required',

            'fname' => 'required',
            'sname' => 'required',
            'dept' => 'required',
            'hospital' => 'required',
            'ward' => 'required',
            'sex'=>'required'
        ]);

        if ($validator->passes()) {


         $sql="update demographics set SampleID='$sid',PatName='$patname',Age='$age', Sex='$sex', DoB='$dob2', Addr0 = '$address', Addr1 = '$address2', Ward = '$ward', Clinician = '$clinician',GP='$gp', SampleDate = '$sampledate',hospital='$hospital', Fasting = '$fasting', Urgent = '$urgent', RecDate = '$recieved', SurName='$sname', ForeName = '$fname', addr3 = '$address3', addr4 = '$address4',ClDetails = '$clinicaldetails', Pregnant = '$pregnent2' where SampleID = $sampleid22";
            sqlsrv_query($conn_hq,$sql);
           
            $copysql2="select * from SendCopyTo where SampleID='$sampleid22'";
            $querycopy=sqlsrv_query($conn_hq,$copysql2);
            $count=sqlsrv_has_rows($querycopy);
            if($count > 0){
               $copysql="Update SendCopyTo set GP='$copyto' where SampleID ='$sampleid22'";
              sqlsrv_query($conn_hq,$copysql); 
            }else{
                $sqlcopy="Insert into sendcopyto(SampleID,GP) values('$sid','$copyto')";
      sqlsrv_query($conn_hq,$sqlcopy); 
            }
           


    if($biochemistry =='Biochemistry'){

    $sql3="Delete from BioRequests where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql3);

     $sql5="Delete from BioResults where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql5);

    $getsqlval="select * from  BioTestDefinitions where longname='Rejected Bio'";
    $querysql=sqlsrv_query($conn_hq,$getsqlval);
    $rows14=sqlsrv_fetch_array($querysql);
    $longname=$rows14['longname'];
    $analyser=$rows14['Analyser'];
    $code=$rows14['Code'];

    $insertsql="insert into BioResults(SampleID,Valid,Analyser,Result,RunDate,Code) values('$sid','1','$analyser','REJ','$sampledate','$code')";
    sqlsrv_query($conn_hq,$insertsql);
    }

     if($external =='External'){
    
     $sql4="Delete from Biomnisrequests where SampleID='$sid'";

    sqlsrv_query($conn_hq,$sql4);
    $sql5="Delete from ExtResults where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql5);

    $getsqlval="select * from  BioTestDefinitions where longname='Rejected External'";
    $querysql=sqlsrv_query($conn_hq,$getsqlval);
    $rows14=sqlsrv_fetch_array($querysql);
    $longname=$rows14['longname'];
    $analyser=$rows14['Analyser'];
    $code=$rows14['Code'];

    $insertsql="insert into BioResults(SampleID,Valid,Analyser,Result,RunDate,Code) values('$sid','1','$analyser','REJ','$sampledate','$code')";
    sqlsrv_query($conn_hq,$insertsql);
    }
    if($heamatology =='Heamatology'){
   
   $sql5="Delete from HaeRequests where SampleID='$sid'";
   sqlsrv_query($conn_hq,$sql5);

    $sql5="Delete from HaemResults50 where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql5);

    $getsqlval="select * from  HaemTestDefinitions where AnalyteName='IPU'";
    $querysql=sqlsrv_query($conn_hq,$getsqlval);
    $rows14=sqlsrv_fetch_array($querysql);
    $longname=$rows14['AnalyteName'];
    $code=$rows14['Code'];

    $insertsql="insert into HaemResults50(SampleID,Code,Valid,Analyser,Result) values('$sid','$code','1','$longname','REJ')";
    sqlsrv_query($conn_hq,$insertsql);
    }
    if($coagulation =='Coagulation'){

    $sql6="Delete from CoagRequests where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql6);

     $sql5="Delete from CoagResults where SampleID='$sid'";
    sqlsrv_query($conn_hq,$sql5);

    $getsqlval="select * from  CoagTestDefinitions where Testname='Rejected'";
    $querysql=sqlsrv_query($conn_hq,$getsqlval);
    $rows14=sqlsrv_fetch_array($querysql);
    $longname=$rows14['Testname'];
    $code=$rows14['Code'];

    $insertsql="insert into CoagResults(SampleID,Valid,Analyser,Result,Code,RunDate,Printed) values('$sid','1','$longname','REJ','$code','$sampledate','0')";
    sqlsrv_query($conn_hq,$insertsql);
    }



//     if($biochemistry =='Biochemistry'){

// $sql3="Delete from BioRequests where SampleID='$sid'";
// sqlsrv_query($conn_hq,$sql3);
//     }

//      if($external =='External'){

// $sql4="Delete from ExtResults where SampleID='$sid'";
// sqlsrv_query($conn_hq,$sql4);

//     }
//     if($heamatology =='Heamatology'){
   
 
// $sql5="Delete from HaeRequests where SampleID='$sid'";
// sqlsrv_query($conn_hq,$sql5);

//     }
//     if($coagulation =='Coagulation'){

// $sql6="Delete from CoagRequests where SampleID='$sid'";
// sqlsrv_query($conn_hq,$sql6);
//     }

           return response()->json(['success'=>'Data Updated.','sid'=>$sampleid22]); 


         }else{
            return response()->json(['error'=>$validator->errors()->first()]); 
         }


     }
     public function wardopt(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        $search = $request->input('search');
        $sql4="select Top 15 Text from Wards where Text like '%$search%'";
        $query4=sqlsrv_query($conn_hq,$sql4);
        $count4=sqlsrv_has_rows($query4);
        $clientList = [];
        $i=0;
        if($count4 > 0){
         while($rowsward = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)){
            $clientList[$i] = ['id' => $rowsward['Text'], 'text'=>$rowsward['Text']];
            $i++;
         }
        }

        return response()->json($clientList);
     }
     public function clinoption(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        $search = $request->input('search');
        $sql5="select  Top 15 Text from Clinicians where Text like '%$search%'";
        $query5=sqlsrv_query($conn_hq,$sql5);
        $count5=sqlsrv_has_rows($query5);
        $clinList = [];
        $i=0;
        if($count5 > 0){
         while($rowsclin = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)){
            $clinList[$i] = ['id' => $rowsclin['Text'], 'text'=>$rowsclin['Text']];
            $i++;
         }
        }

        return response()->json($clinList);
     }
     public function gpoption(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        $search = $request->input('search');
        $sql6="select Top 15 Text from gps where Text like '%$search%'";
        $query6=sqlsrv_query($conn_hq,$sql6);
        $count6=sqlsrv_has_rows($query6);
        $GPList = [];
        $i=0;
        if($count6 > 0){
         while($rowsgp = sqlsrv_fetch_array($query6, SQLSRV_FETCH_ASSOC)){
            $GPList[$i] = ['id' => $rowsgp['Text'], 'text'=>$rowsgp['Text']];
            $i++;
         }
        }

        return response()->json($GPList);
     }
     public function practiceoption(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        $search = $request->input('search');
        $sql7="select distinct Top 15 Practice from gps where Practice like '%$search%'";
        $query7=sqlsrv_query($conn_hq,$sql7);
        $count7=sqlsrv_has_rows($query7);
        $PracticeList = [];
        $i=0;
        if($count7 > 0){
         while($rowsprac = sqlsrv_fetch_array($query7, SQLSRV_FETCH_ASSOC)){
            $PracticeList[$i] = ['id' => $rowsprac['Practice'], 'text'=>$rowsprac['Practice']];
            $i++;
         }
        }

        return response()->json($PracticeList);
     }
     public function siteoption(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        $search = $request->input('search');
        $sql8="select Top 15 Site from SiteDetails50 where Site like '%$search%'";
        $query8=sqlsrv_query($conn_hq,$sql8);
        $count8=sqlsrv_has_rows($query8);
        $SiteResultList = [];
        $i=0;
        if($count8 > 0){
         while($rowssite = sqlsrv_fetch_array($query8, SQLSRV_FETCH_ASSOC)){
            $SiteResultList[$i] = ['id' => $rowssite['Site'], 'text'=>$rowssite['Site']];
            $i++;
         }
        }

        return response()->json($SiteResultList);
     }
     public static function getranges($sname,$male,$age,$dept){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

    if(str_contains($age,'Y')){
    $age = str_replace("Y"," ",$age);
     }
     $age= (int)$age;
     $newage=$age*365;

     if($male=='M'){
      $sql="select * from BioTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){
     $rows12=sqlsrv_fetch_array($query);

     return round($rows12['MaleLow']).'-'.round($rows12['MaleHigh']);   
     }
     }else{
    
    $sql="select * from BioTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){
     $rows12=sqlsrv_fetch_array($query);
     return round($rows12['FemaleLow']).'-'.round($rows12['FemaleHigh']);  

     }
     

     }

}

     public static function getflags($sname,$male,$age,$dept,$sid){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
 if(str_contains($age,'Y')){
    $age = str_replace("Y"," ",$age);
     }
     $age= (int)$age;
   
      $newage=$age*365;
     
     if($male=='M'){
         $sql="select * from BioTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){

    $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from BioResults where SampleID='$sid' AND Code='$code2' AND result IS NOT NULL"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['result'] < $rows12['MaleLow']){
      return '<button class="btn btn-primary btn-xs" type="button">L</button';
    }else if($rows13['result'] > $rows12['MaleHigh']){
        // return $rows12['FlagFemaleHigh'];
return '<button class="btn btn-danger btn-xs" type="button">H</button>';
    }else if($rows13['result'] >=$rows12['MaleLow'] AND $rows13['result'] <=$rows12['MaleHigh']  ){
return ' ';
    }
    }else{
     return ' ';     
    }
    
     }
     }else{
    $sql="select * from BioTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){

    $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from BioResults where SampleID='$sid' AND Code='$code2'"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['result'] < $rows12['FemaleLow']){
     return '<button class="btn btn-primary btn-xs" type="button">L</button';
    }else if($rows13['result'] > $rows12['FemaleHigh']){
return '<button class="btn btn-danger btn-xs" type="button">H</button>';
    }else if($rows13['result'] >=$rows12['FemaleLow'] AND $rows13['result'] <=$rows12['FemaleHigh']  ){
return ' ';
    }
    }else{
     return ' ';     
    }
   
    

     }
     

     }

}

     public static function getvalid($sid,$code){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

   
   $sql="Select * from BioResults where Code='$code' AND SampleID='$sid'";
   $query=sqlsrv_query($conn_hq,$sql);
   $count=sqlsrv_has_rows($query);
   if($count > 0){
    $row=sqlsrv_fetch_array($query);
    return $row['valid'];
   }else{
    return '';
   }

}
    public static function getresult3($sampleid='',$code=''){

 
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }
   

    $sql="Select * from CoagResults where SampleID='$sampleid' AND Code='$code'";
    $query=sqlsrv_query($conn_hq,$sql);
    $rows3=sqlsrv_fetch_array($query);
 
     $count=sqlsrv_has_rows($query);

 if($count > 0){

return $rows3['Result'];
     }else{
return "";
     }


    }


         public static function getranges2($sname,$male,$age,$dept){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

   
     if(str_contains($age,'Y')){
    $age = str_replace("Y"," ",$age);
     }
$age= (int)$age;
     $newage=$age*365;

     if($male=='M'){
      $sql="select * from CoagTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){
     $rows12=sqlsrv_fetch_array($query);

     return round($rows12['MaleLow']).'-'.round($rows12['MaleHigh']);   
     }
     }else{
    
    $sql="select * from CoagTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){
     $rows12=sqlsrv_fetch_array($query);
     return round($rows12['FemaleLow']).'-'.round($rows12['FemaleHigh']);  

     }
     

     }

}

     public static function getflags3($sname,$male,$age,$dept,$sid){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

    if(str_contains($age,'Y')){
    $age = str_replace("Y"," ",$age);
    }
$age= (int)$age;
     $newage=$age*365;
     
  
if($dept=='Coagulation'){


    
     if($male=='M'){



      $sql="select * from CoagTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){

         $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from CoagResults where SampleID='$sid' AND Code='$code2' AND Result IS NOT NULL"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['Result'] < $rows12['MaleLow']){

    return '<button class="btn btn-primary btn-xs" type="button">L</button';

    }else if($rows13['Result'] > $rows12['MaleHigh']){

        return '<button class="btn btn-danger btn-xs" type="button">H</button';

    }else if($rows13['Result'] >=$rows12['MaleLow'] AND $rows13['Result'] <=$rows12['MaleHigh']  ){
return ' ';
    }
    }else{
     return ' ';     
    }

     // $rows12=sqlsrv_fetch_array($query);
     // return round($rows12['FlagMaleLow']).'-'.round($rows12['FlagMaleHigh']);   
     }
     }else{
    $sql="select * from CoagTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
     $query=sqlsrv_query($conn_hq,$sql);
     $count=sqlsrv_has_rows($query);
     if($count > 0){

                 $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from CoagResults where SampleID='$sid' AND Code='$code2' AND Result IS NOT NULL"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['Result'] < $rows12['FemaleLow']){
      return '<button class="btn btn-primary btn-xs" type="button">L</button';
    }else if($rows13['Result'] > $rows12['FemaleHigh']){
    return '<button class="btn btn-danger btn-xs" type="button">H</button';
    }else if($rows13['Result'] >=$rows12['FemaleLow'] AND $rows13['Result'] <=$rows12['FemaleHigh']  ){
return ' ';
    }
    }else{
     return ' ';     
    }


     // $rows12=sqlsrv_fetch_array($query);
     // return round($rows12['FlagFemaleLow']).'-'.round($rows12['FlagFemaleHigh']);  

     }
     

     }
    }else{

        
    
     if($male=='M'){



        $sql="select TOP (1) * from ExternalDefinitions where AnalyteName='$sname'";
       $query=sqlsrv_query($conn_hq,$sql);
       $count=sqlsrv_has_rows($query);
       if($count > 0){
  
           $rows12=sqlsrv_fetch_array($query);
      $code2=$rows12['AnalyteName']; 
      $ssqlres="select * from ExtResults where SampleID='$sid' AND Analyte='$code2' AND Result IS NOT NULL"; 
      $queryres=sqlsrv_query($conn_hq,$ssqlres);
      $countres=sqlsrv_has_rows($queryres);
      if($countres > 0){
      $rows13=sqlsrv_fetch_array($queryres);
      if( $rows13['result'] < $rows12['MaleLow']){
  
      return '<button class="btn btn-primary btn-xs" type="button">L</button';
  
      }else if($rows13['Result'] > $rows12['MaleHigh']){
  
          return '<button class="btn btn-danger btn-xs" type="button">H</button';
  
      }else if($rows13['Result'] >=$rows12['MaleLow'] AND $rows13['Result'] <=$rows12['MaleHigh']  ){
  return ' ';
      }
      }else{
       return ' ';     
      }
  
       // $rows12=sqlsrv_fetch_array($query);
       // return round($rows12['FlagMaleLow']).'-'.round($rows12['FlagMaleHigh']);   
       }
       }else{
      $sql="select TOP (1) * from ExternalDefinitions where AnalyteName='$sname' ";
       $query=sqlsrv_query($conn_hq,$sql);
       $count=sqlsrv_has_rows($query);
       if($count > 0){
  
                   $rows12=sqlsrv_fetch_array($query);
      $code2=$rows12['AnalyteName']; 
      $ssqlres="select * from ExtResults where SampleID='$sid' AND Analyte='$code2' AND Result IS NOT NULL"; 
      $queryres=sqlsrv_query($conn_hq,$ssqlres);
      $countres=sqlsrv_has_rows($queryres);
      if($countres > 0){
      $rows13=sqlsrv_fetch_array($queryres);
      if( $rows13['result'] < $rows12['FemaleLow']){
        return '<button class="btn btn-primary btn-xs" type="button">L</button';
      }else if($rows13['result'] > $rows12['FemaleHigh']){
      return '<button class="btn btn-danger btn-xs" type="button">H</button';
      }else if($rows13['Result'] >=$rows12['FemaleLow'] AND $rows13['Result'] <=$rows12['FemaleHigh']  ){
  return ' ';
      }
      }else{
       return ' ';     
      }
  
  
       // $rows12=sqlsrv_fetch_array($query);
       // return round($rows12['FlagFemaleLow']).'-'.round($rows12['FlagFemaleHigh']);  
  
       }
       
  
       }
    }  

}

     public static function getvalid2($sid,$code){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 

   
   $sql="Select * from CoagResults where Code='$code' AND SampleID='$sid'";
   $query=sqlsrv_query($conn_hq,$sql);
   $count=sqlsrv_has_rows($query);
   if($count > 0){
    $row=sqlsrv_fetch_array($query);
    return $row['Valid'];
   }else{
    return '';
   }

}
    public static function getdata3($sampleid='',$code=''){
   
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
        die( print_r( sqlsrv_errors(), true));
    }
   

    $sql="Select * from CoagResults where SampleID='$sampleid' AND Code='$code'";
    $query=sqlsrv_query($conn_hq,$sql);
    $rows3=sqlsrv_fetch_array($query);
 
     $count=sqlsrv_has_rows($query);

 if($count > 0){

return $rows3['Comment'];
     }else{
return "-";
     }
    
// if(count($rows3) > 0){
//     return 2;
// }else{
//     return 1;
// }



    }



    public static function getranges4($sname,$male,$age,$dept){

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
    
       
         if(str_contains($age,'Y')){
        $age = str_replace("Y"," ",$age);
         }
    $age= (int)$age;
         $newage=$age*365;
    
         if($male=='M'){
          $sql="select * from HaemTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
         $query=sqlsrv_query($conn_hq,$sql);
         $count=sqlsrv_has_rows($query);
         if($count > 0){
         $rows12=sqlsrv_fetch_array($query);
    
         return round($rows12['MaleLow']).'-'.round($rows12['MaleHigh']);   
         }
         }else{
        
        $sql="select * from HaemTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
         $query=sqlsrv_query($conn_hq,$sql);
         $count=sqlsrv_has_rows($query);
         if($count > 0){
         $rows12=sqlsrv_fetch_array($query);
         return round($rows12['FemaleLow']).'-'.round($rows12['FemaleHigh']);  
    
         }
         
    
         }
    
    }




    public static function getflags4($sname,$male,$age,$dept,$sid){

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
    
        if(str_contains($age,'Y')){
        $age = str_replace("Y"," ",$age);
        }
    $age= (int)$age;
         $newage=$age*365;
         
         if($male =='M'){

         
     
         $sql="select * from HaemTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
         $query=sqlsrv_query($conn_hq,$sql);
         $count=sqlsrv_has_rows($query);
         if($count > 0){
        $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from HaemResults50 where SampleID='$sid' AND Code='$code2' AND Result IS NOT NULL"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['Result'] < $rows12['MaleLow']){
    return '<button class="btn btn-primary btn-xs" type="button">L</button';
    }else if($rows13['Result'] > $rows12['MaleHigh']){

        return '<button class="btn btn-danger btn-xs" type="button">H</button';


    }else if($rows13['Result'] >=$rows12['MaleLow'] AND $rows13['Result'] <=$rows12['MaleHigh']  ){
return ' ';
    }
    }else{
    return ' ';     
    }
         // $rows12=sqlsrv_fetch_array($query);
         // return round($rows12['FlagLow']).'-'.round($rows12['FlagHigh']);   
         }
        }else{


            
         $sql="select * from HaemTestDefinitions where shortname='$sname' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
         $query=sqlsrv_query($conn_hq,$sql);
         $count=sqlsrv_has_rows($query);
         if($count > 0){
        $rows12=sqlsrv_fetch_array($query);
    $code2=$rows12['Code']; 
    $ssqlres="select * from HaemResults50 where SampleID='$sid' AND Code='$code2' AND Result IS NOT NULL"; 
    $queryres=sqlsrv_query($conn_hq,$ssqlres);
    $countres=sqlsrv_has_rows($queryres);
    if($countres > 0){
    $rows13=sqlsrv_fetch_array($queryres);
    if( $rows13['Result'] < $rows12['FemaleLow']){
    return '<button class="btn btn-primary btn-xs" type="button">L</button';
    }else if($rows13['Result'] > $rows12['FemaleHigh']){

        return '<button class="btn btn-danger btn-xs" type="button">H</button';


    }else if($rows13['Result'] >=$rows12['FemaleLow'] AND $rows13['Result'] <=$rows12['FemaleHigh']  ){
return ' ';
    }
    }else{
    return ' ';     
    }
         // $rows12=sqlsrv_fetch_array($query);
         // return round($rows12['FlagLow']).'-'.round($rows12['FlagHigh']);   
         }


        }
    }


    public static function getdata4($sampleid='',$code=''){
   
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
                
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }
       
    
        $sql="Select * from HaemResults50 where SampleID='$sampleid' AND Code='$code'";
        $query=sqlsrv_query($conn_hq,$sql);
        $rows3=sqlsrv_fetch_array($query);
     
         $count=sqlsrv_has_rows($query);
    
     if($count > 0){
    
    return $rows3['Comment'];
         }else{
    return "-";
         }
        
    // if(count($rows3) > 0){
    //     return 2;
    // }else{
    //     return 1;
    // }
    
    
    
        }



        public static function getvalid4($sid,$code){

            $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
        
           
           $sql="Select * from HaemResults50 where Code='$code' AND SampleID='$sid'";
           $query=sqlsrv_query($conn_hq,$sql);
           $count=sqlsrv_has_rows($query);
           if($count > 0){
            $row=sqlsrv_fetch_array($query);
            return $row['Valid'];
           }else{
            return '';
           }
        
        }

        public static function getunit5($sid,$code){

            $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
        
           
           $sql="Select * from ExtResults where Analyte='$code' AND SampleID='$sid'";
           $query=sqlsrv_query($conn_hq,$sql);
           $count=sqlsrv_has_rows($query);
           if($count > 0){
            $row=sqlsrv_fetch_array($query);
            return $row['units'];
           }else{
            return '';
           }
        
        }
        public static function getresult5($sid,$code){

            $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
        
           
           $sql="Select * from ExtResults where Analyte='$code' AND SampleID='$sid'";
           $query=sqlsrv_query($conn_hq,$sql);
           $count=sqlsrv_has_rows($query);
           if($count > 0){
            $row=sqlsrv_fetch_array($query);
            return $row['result'];
           }else{
            return '';
           }
        
        }
        public static function getrange5($sid,$code,$sex){

            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

        if ($sex == 'M') {
            $sql="Select * from ExternalDefinitions where AnalyteName='$code' ";
            $query=sqlsrv_query($conn_hq,$sql);
            $count=sqlsrv_has_rows($query);
            if($count > 0){
             $row=sqlsrv_fetch_array($query);
             return $row['MaleLow'].'-'.$row['MaleHigh'];
            }else{
             return '';
            }
        } else {
        
            $sql="Select * from ExternalDefinitions where AnalyteName='$code'";
            $query=sqlsrv_query($conn_hq,$sql);
            $count=sqlsrv_has_rows($query);
            if($count > 0){
             $row=sqlsrv_fetch_array($query);
             return $row['FemaleLow'].'-'.$row['FemaleHigh'];
            }else{
             return '';
            }
        }
        
        
        }

        public static function getComment23($sid,$code){
          $conn_hq = \App\Http\Controllers\Controller::SQLConnect(); 
            
          $sql="Select * from ExtResults where Analyte='$code' AND SampleID='$sid'";
           $query=sqlsrv_query($conn_hq,$sql);
           $count=sqlsrv_has_rows($query);
           if($count > 0){
            $row=sqlsrv_fetch_array($query);
            return $row['Comment'];
           }else{
            return '';
           }
        }


        public static function phonealertlevel($sid,$Code,$res,$dept) {
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

            $sql = "Select * from PhoneAlertLevel where Discipline = '$dept' AND Parameter = '$Code'";
            $query = sqlsrv_query($conn_hq,$sql);
            $count = sqlsrv_has_rows($query);

            if($count > 0){
                $rows = sqlsrv_fetch_array($query);
                $discipline = $rows['Discipline'];
                $paramter = $rows['Parameter'];
                $LessThan = $rows['LessThan'];
                $GreaterThan = $rows['GreaterThan'];
                
                if($res >= $LessThan AND $res <= $GreaterThan){
                    $date = date('Y-m-d H:i:s');
                    $insert = "INSERT into PhoneALert(SampleID,Discipline,Parameter,PhoneAlertDateTime) values('$sid','$discipline','$paramter','$date')";
                    sqlsrv_query($conn_hq,$insert);
                }
            }

           

        }



}
