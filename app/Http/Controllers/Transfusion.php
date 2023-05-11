<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;
use DB;
Use Carbon\Carbon;

class Transfusion extends Controller
{
    public function transfusionlabdata(Request $req, $id=null)
    {

        $forcedEligible = "";
        $NotEligible = "";
        $previousSample = "";
        $adverseReaction = "";
        $chart = "";
        $sampledate1 = "";
        $prevAB = "";
        $currentAB="";
        $unmodcurrentAB="";
        $currentgroup = [];
        $rows11 = [];
        $rowsbarcode11 = [];
        $prevgroupagreement = "";
        $cg=0;
        $rows="";
        $rowsNew="";
        $rowsNew2="";

        if($id != null) {

        $forcedEligible = 0;
        $NotEligible = 0;
        $previousSample = 0;
        $adverseReaction = 0;
        $chart = 0;
        $sampledate1 = 0;
        $prevAB = 0;
        $currentAB=0;
        $unmodcurrentAB=0;
        $prevgroupagreement = 0;

        $currentDate = Carbon::now();

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect2();


        $sql="select * from patientdetails where SampleID='$id'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results0 = sqlsrv_query( $conn_hq, $sql, $params, $options);
        $count0 = sqlsrv_num_rows($results0);
        $rows = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);

        if($count0){
            $chart = $rows['patnum'];
            $sampledate1 = $rows['SampleDate'];

            //Prev Eligible
            if(strcmp($rows['Eligible4EI'], "F_E") == 0){
                $forcedEligible = 1;
            } else if(strcmp($rows['Eligible4EI'], "FNE") == 0){
                $NotEligible = 1;
               
            }
            //Prev Sample
            if(strcmp($rows['Eligible4EI'], "F_E") == 0 || strcmp($rows['Eligible4EI'], "A_E") == 0 || strcmp($rows['Eligible4EI'], "") == 0){
                $previousSample = 1;
            }
        }
        // return $NotEligible;
        // return $forcedEligible."|".$previousSample;

        //Adverse Reactions
        $sql2 = "Select COUNT(*) countnum FROM BadReact where patno = '$chart'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results2 = sqlsrv_query( $conn_hq, $sql2, $params, $options);
        $countBad = sqlsrv_num_rows($results2);
        if($countBad > 0){
            $rows2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC);
            if($rows2['countnum'] == 0){
                $sql3 = "Select COUNT(*) countnum1 FROM AdverseReactions where Chart = '$chart'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $results3 = sqlsrv_query( $conn_hq, $sql3, $params, $options);
                $rows3 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC);
                $countAdverse = sqlsrv_num_rows($results3);

                if($rows3['countnum1'] == 0){
                    $adverseReaction = 0;
                } else {
                    $adverseReaction = 1;
                }
            }  else {
                $adverseReaction = 1;
            }
        }

        //Prev A/B
        $count4=0;
        $sql4 = "Select AIDR, DATEDIFF(minute, SampleDate,'$currentDate') FROM PatientDetails where patnum = '$chart' and AIDR IS NOT NULL AND FGROUP IS NOT NULL";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results4 = sqlsrv_query( $conn_hq, $sql4, $params, $options);
        $rows4 = sqlsrv_fetch_array($results4, SQLSRV_FETCH_ASSOC);
        $count4 = sqlsrv_num_rows($results4);

        if($count4>0){
            $sql5 = "SELECT CASE (SELECT COUNT(*) FROM PatientDetails 
            WHERE PatNum = '$chart' 
            AND DATEDIFF(minute, SampleDate, '$currentDate') >= 0 )
            WHEN 0 THEN 2
            WHEN 1 THEN 2
            ELSE (SELECT CASE 
                    (SELECT COUNT(*) FROM PatientDetails 
                    WHERE PatNum = '$chart'
                    AND DATEDIFF(minute, SampleDate, '$currentDate') >= 0 
                    AND AIDR LIKE '%anti%' )
                WHEN 0 THEN 1 
                ELSE 0 
                END) 
            END Tot";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results5 = sqlsrv_query( $conn_hq, $sql5, $params, $options);
            $count5 = sqlsrv_num_rows($results5);

            if($count5>0){  
                $rows5 = sqlsrv_fetch_array($results5, SQLSRV_FETCH_ASSOC);
                $prevAB = 1;
            }
        }
        //Current A/B
        $sql6 = "select top 1 AIDR from PatientDetails where SampleID = '$id'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results6 = sqlsrv_query( $conn_hq, $sql6, $params, $options);
        $count6 = sqlsrv_num_rows($results6);

        if($count6 > 0){
            $rows6 = sqlsrv_fetch_array($results6, SQLSRV_FETCH_ASSOC);
            if(strcmp($rows6['AIDR'], "NEG") == 0){
                $currentAB = 1;
            } else {
                $currentAB = 0;
            }
        }
        // return $currentAB;

        //unmodified Current AB
       $sql7 = "SELECT ABSCR_Result FROM VisionABscreenResults
        WHERE SampleID = '$id' and Result_Flag != 'M' and ABSCR_Result like '%NEG%'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results7 = sqlsrv_query( $conn_hq, $sql7, $params, $options);
        $count7 = sqlsrv_num_rows($results7);

        if($count7 > 0){
            $rows7 = sqlsrv_fetch_array($results7, SQLSRV_FETCH_ASSOC);
            $unmodcurrentAB = 1;
        } else  {
            $unmodcurrentAB = 0;
        }
        // return $unmodcurrentAB;

        //group aggreement
        $sql8 = "select top 1 fgroup from PatientDetails where labnumber = '$id' and fgroup is not null";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results8 = sqlsrv_query( $conn_hq, $sql8, $params, $options);
        $count8 = sqlsrv_num_rows($results8);

        if($count8 > 0){
            $rows8 = sqlsrv_fetch_array($results8, SQLSRV_FETCH_ASSOC);
            $sql9= "select top 2 fgroup from PatientDetails where patnum = '$chart' and fgroup is not null and DATEDIFF(minute, SampleDate, '$currentDate')>=0";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results9 = sqlsrv_query( $conn_hq, $sql9, $params, $options);
            $count9 = sqlsrv_num_rows($results9);
            if($count9 > 0){
                while($rows9 = sqlsrv_fetch_array($results9, SQLSRV_FETCH_ASSOC)){
                    $currentgroup[$cg] = $rows9['fgroup'];
                    $cg++;
                }
                // return $currentgroup;
                if(count($currentgroup) > 1){
                    if($currentgroup[0] != "" && $currentgroup[1] != "" && $currentgroup[0] == $currentgroup[1]){
                        $prevgroupagreement = 1;
                    } 
                    else
                    {
                        $prevgroupagreement = 0;	
                    }
                }
            }
        }

        $a=0;
        $sql12="select * from Product where LabNumber='$id'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results12 = sqlsrv_query( $conn_hq, $sql12, $params, $options);

        $count12 = sqlsrv_num_rows($results12);
        if($count12 > 0){
            while($rows12 = sqlsrv_fetch_array($results12, SQLSRV_FETCH_ASSOC)){
                    $rows11[$a] = $rows12;
                    $barcode = $rows12['BarCode'];

                    $sql13="select * from ProductList where BarCode='$barcode'";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results13 = sqlsrv_query( $conn_hq, $sql13, $params, $options);
                    $rows13 = sqlsrv_fetch_array($results13, SQLSRV_FETCH_ASSOC);
                    $rowsbarcode11[$a] =  $rows13;
                    $a++;
                }
            }
        }

        return view('BTBS.transfusionlaboratory', ['rowsNew'=>$rowsNew, 'rowsNew2'=>$rowsNew2,'rows11'=>$rows11, 'rowsbarcode11'=>$rowsbarcode11,'rows'=>$rows, 'forcedEligible'=>$forcedEligible,
        'NotEligible'=>$NotEligible, 'previousSample'=>$previousSample, 'adverseReaction'=>$adverseReaction,
        'prevAB'=>$prevAB, 'currentAB'=>$currentAB, 'unmodcurrentAB'=>$unmodcurrentAB, 'prevgroupagreement'=>$prevgroupagreement, "success"=>true]);
    }

    public function checkins($var){
        if(str_contains($var, "'")){
            $var = str_replace("'", "''", $var);
        }
        return $var;
    }


    // public function gettransfusion($id=null)
    // {
    //     $rows11="";
    //     if($id!="")
    //     {

    //     $serverName = env('SQL_Server2');
    //     $DB=env('SQL_Connection_DB2');
    //     $uid=env('SQL_Connection_User2');
    //     $pwd=env('SQL_Connection_PW2');
    //     $connectionInfo = array( "Database"=>$DB,
    //                              "UID"=>$uid,
    //                              "PWD"=>$pwd,
    //                              "Encrypt"=>true,
    //                              "TrustServerCertificate"=>true,
    //                              'ReturnDatesAsStrings'=> true);
    //     $conn_hq = sqlsrv_connect($serverName, $connectionInfo);
    
    //     if(!$conn_hq) {
    //         die( print_r( sqlsrv_errors(), true));
    //     }
     
    //     $sql="select *from product where ISBT128='$id'";
    //     $results0 = sqlsrv_query( $conn_hq, $sql);
    //     $rows11 = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);
        
    //     }
    //     return $this->transfusionlabdata($id);

    //     // return view('BTBS.transfusionlaboratory', ['rows11'=>$rows11]);
    // }


    public function postTransfusion(Request $request){
        // return 1;
        
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect2();


        $id=$request->samplenum;
        $patnum = $request->chart;
        $name=$request->namepat;
        $addr1=$request->address1;
        $addr2=$request->address2;
        $addr3=$request->address3;
        $addr4=$request->address4;
        $ward=$request->ward;
        $clinician=$request->clinician;
        $conditions=$request->conditions;
        $procedure=$request->procedure;
        $gp=$request->gp;
        $specialprod=$request->specialprod;
        $samplecomment=$request->samplecomment;
        $dob=$request->dob;
        $age=$request->age;
        $sex=$request->sex;
        $checkby=$request->checkby;
        $sampledate=$request->sampledate;
        $sampletime=$request->sampletime;

        $sampledatetime=$sampledate.' '.$sampletime;

        $datetimeRec1=$request->datetime;
        $datetimeRec = \Carbon\Carbon::parse($datetimeRec1);

        $report=$request->report;
        $kel=$request->kel;
        $suggest=$request->suggest;
        $abreport=$request->abreport;



        $name = $this->checkins($name);
        $addr1 = $this->checkins($addr1);
        $addr2 = $this->checkins($addr2);
        $addr3 = $this->checkins($addr3);
        $addr4 = $this->checkins($addr4);
        $samplecomment = $this->checkins($samplecomment);
        $patnum = $this->checkins($patnum);
        $ward = $this->checkins($ward);
        $clinician = $this->checkins($clinician);
        $conditions = $this->checkins($conditions);
        $procedure = $this->checkins($procedure);
        $gp = $this->checkins($gp);
        $specialprod = $this->checkins($specialprod);
        $dob = $this->checkins($dob);
        $age = $this->checkins($age);
        $sex = $this->checkins($sex);
        $checkby = $this->checkins($checkby);
        $sampledate = $this->checkins($sampledate);
        $sampletime = $this->checkins($sampletime);
        $sampledatetime = $this->checkins($sampledatetime);
        $datetimeRec = $this->checkins($datetimeRec);
        $suggest = $this->checkins($suggest);
        $abreport = $this->checkins($abreport);


        $sql="update patientdetails set patnum='$patnum', name='$name', ward='$ward', clinician='$clinician', [procedure]='$procedure', conditions='$conditions', addr1='$addr1', addr2='$addr2', addr3='$addr3', addr4='$addr4', specialprod='$specialprod', GP='$gp', age='$age', sex='$sex', Checker='$checkby', SampleDate='$sampledatetime', DateReceived='$datetimeRec', fgroup='$report', Kell='$kel', SampleComment='$samplecomment', fgsuggest='$suggest' where SampleID='$id'";
        $results0 = sqlsrv_query( $conn_hq, $sql);
        $rows = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);

        return $this->transfusionlabdata($id);
    }
    
}
    ?>
