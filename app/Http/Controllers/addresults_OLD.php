<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addresults extends Controller
{
    

    public function sidsend2($tab = '', $id = ''){
        // return 1;
        $sid = $id;
    
    
        // return $sid;
        $rows="";
        $rows2="";
        $count2=0;
        $count1=0;
    
        $haem = 0;
        
        if($sid != '')
        {

        
        $haemarray = [];
    
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

    
        
        $sql1="select * from demographics where SampleID = '$sid'";
        $results0 = sqlsrv_query( $conn_hq, $sql1);
    
        $count1 = sqlsrv_has_rows($results0);
        $rows = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);
    
        
      

    
        $array = [];
        $m=0;
    
        // $sql="SELECT BioRequests.Code, BioResults.Result, BioResults.Flags, BioResults.Units, BioResults.Analyser, BioResults.Comment, BioResults.NormalLow, BioResults.NormalHigh 
        // FROM BioRequests LEFT JOIN BioResults ON BioRequests.Code = BioResults.Code where BioRequests.SampleID = '$sid'
        // GROUP BY BioRequests.Code, BioResults.Result, BioResults.Flags,BioResults.Units, BioResults.Analyser, BioResults.Comment, BioResults.PC, BioResults.NormalLow, BioResults.NormalHigh
        // ";
    
          $sql = "SELECT CONCAT('Bio','chemistry') as dept,
         BioRequests.Code
         from BioRequests where  BioRequests.SampleID = '$sid'";
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
        HaeRequests.Code
        from HaeRequests where  HaeRequests.SampleID = '$sid'";

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
 CoagRequests.Code
 from CoagRequests where  CoagRequests.SampleID = '$sid'";

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
    
    
    
    if($rows==0 && $extcount == 0 && $haemcount ==0 && $count3 == 0 && $coagcount == 0){

     return redirect('/Results/Demographics');
    //return response()->json(['error'=>'No Sample ID Found']);
    }
    
    
        
    $rows3='';
    $rows5 = '';
    
        }    else {

            $rows =[];
            $array = [];
            $rows3 = [];
            $haemarray =[];
            $extarray = [];
            $coagarray = [];
            $rows5 = [];
        }
    
        return view ('Results', ['rows'=>$rows,'array'=>$array, 'rows3'=> $rows3, 'haemarray'=>$haemarray, 'extarray'=>$extarray,'coagarray'=>$coagarray,  'rows5'=>$rows5]);    
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
    
    
        public function addmodal(Request $request) {


    
            $serverName = "WIN-VSRLG0S17CC";
            $connectionInfo = array( "Database"=>"CavanTest",
                                     "UID"=>"CSSQL",
                                     "PWD"=>"Custom@4321",
                                     "Encrypt"=>true,
                                     "TrustServerCertificate"=>true);
            $conn_hq = sqlsrv_connect( $serverName, $connectionInfo);
    
    if(!$conn_hq) {
      
              die( print_r( sqlsrv_errors(), true));
            }

                $sampleid = $request->sampleid;
                $units = $request->units;
                $res = $request->resval;
                $Code = $request->code;
                $comment = $request->comment;

                $getage1 = $request->age;
                $getsex = $request->sex;
                $getage = trim($getage1,"Yr");
                $biosend = '';

                $data="";
                $NormalLow = '';
                $NormalHigh = '';
                 $request->dept;

                if($request->dept == "Biochemistry"){ 

                    $sql11 ="SELECT * FROM BioTestDefinitions where  AgeToDays >= '$getage' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
    
    
                    if ($count11 > 0) {
                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                        if($getsex == 'F') {
                            $NormalLow = round($rows11['FemaleLow'],1);
                            $NormalHigh = round($rows11['FemaleHigh'],1);
                       }
                       else {
                        $NormalLow = round($rows11['MaleLow'],1);
                        $NormalHigh = round($rows11['MaleHigh'],1);
                    }


                        
                        
                         $sql5="update bioresults set Units='$units',Result='$res',NormalLow='$NormalLow',NormalHigh='$NormalHigh', Comment='$comment' where Code = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
    
             

              
                    }

                    
                    
                }
            
    
// Haematology
                elseif($request->dept == "Haematology"){ 

                    $sql11 ="SELECT * FROM HaemTestDefinitions where  AgeToDays >= '$getage' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
    
    
                    if ($count11 > 0) {
                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                    //     if($getsex == 'F') {
                    //         $NormalLow = round($rows11['FemaleLow'],1);
                    //         $NormalHigh = round($rows11['FemaleHigh'],1);
                    //    }
                    //    else {
                    //     $NormalLow = round($rows11['MaleLow'],1);
                    //     $NormalHigh = round($rows11['MaleHigh'],1);
                    // }

                        
                         $sql5="update HaemResults50 set Units='$units',Result='$res', Comment='$comment' where Code = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
    
              
                    }
                    
                }

// Coagulation
                elseif($request->dept == "Coagulation"){ 

                    $sql11 ="SELECT * FROM CoagTestDefinitions where  AgeToDays >= '$getage' and Code = '$Code'"; 
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    $count11 = sqlsrv_has_rows($results11);
    
    
                    if ($count11 > 0) {
                    $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                        if($getsex == 'F') {
                            $NormalLow = round($rows11['FemaleLow'],1);
                            $NormalHigh = round($rows11['FemaleHigh'],1);
                       }
                       else {
                        $NormalLow = round($rows11['MaleLow'],1);
                        $NormalHigh = round($rows11['MaleHigh'],1);
                    }

                        
                         $sql5="update CoagResults set Units='$units',Result='$res',NormalLow='$NormalLow',NormalHigh='$NormalHigh' where Code = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
    
                    

              
                    }
                    
                }


// External
                elseif($request->dept == "External"){ 

                    // $sql11 ="SELECT * FROM ExternalDefinitions where AnalyteName = '$Code'"; 
                    // $params = array();
                    // $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    // $results11 = sqlsrv_query($conn_hq, $sql11,$params, $options);
                    // $count11 = sqlsrv_has_rows($results11);
    
    
                    // if ($count11 > 0) {
                    // $rows11 = sqlsrv_fetch_array($results11, SQLSRV_FETCH_ASSOC);
    
    
                    //     if($getsex == 'F') {
                    //         $NormalLow = round($rows11['FemaleLow'],1);
                    //         $NormalHigh = round($rows11['FemaleHigh'],1);
                    //    }
                    //    else {
                    //     $NormalLow = round($rows11['MaleLow'],1);
                    //     $NormalHigh = round($rows11['MaleHigh'],1);
                    // }

                        
                         $sql5="update ExtResults set Units='$units',Result='$res' where Analyte = '$Code' AND SampleID = '$sampleid'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
    
                        // if($comment != NULL) {
    
                        //     $commupdate = "update Extesults set Comment = '$comment' where Code = '$Code'";
                        //     $params = array();
                        //     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        //     $resultcom = sqlsrv_query($conn_hq, $commupdate, $params, $options);
                        // }

              
                    // }
                    
                }


    
            
            return response()->json(['success'=>true]);
  
    }
    
    
    
    
    
    public static function getid($sampleid='', $testcode= '', $dept = '') {

 
        $serverName = "WIN-VSRLG0S17CC";
        $connectionInfo = array( "Database"=>"CavanTest",
                                 "UID"=>"CSSQL",
                                 "PWD"=>"Custom@4321",
                                 "Encrypt"=>true,
                                 "TrustServerCertificate"=>true);
        $conn_hq = sqlsrv_connect( $serverName, $connectionInfo);

if(!$conn_hq) {
  
          die( print_r( sqlsrv_errors(), true));
        }


        
            if($dept == "Biochemistry"){ 


                $department = 'BioResults';
                $code = 'Code';

            }
            elseif($dept == "Coagulation"){ 


                $department = 'CoagResults';
                $code = 'Code';

            }
      
            elseif($dept == "Haematology"){

                $department = "HaemResults50";
                $code = 'Code';
            
    
            }

            elseif($dept == "External"){

                $department = "ExtResults";
                $code = 'Analyte';
            
    
            }
            
            
   $sql2 = "select * from  $department  where $code = '$testcode' AND SampleID = '$sampleid' ";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
            $count = sqlsrv_has_rows($results);
           $rows3 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
           
           if($dept == "Biochemistry"){ 


            $comment = $rows3['Comment'];
            $flags = $rows3['Flags'];

        }
        elseif($dept == "Coagulation"){ 


            $comment = '';
            $flags = '';
        }
  
        elseif($dept == "Haematology"){

            $comment = $rows3['Comment'];
            $flags = $rows3['Flags'];
        

        }

        elseif($dept == "External"){

            $comment = '';
            $flags = '';

        }
        

            
          if($count > 0){
        
           $data  = [
         
            'result' => $rows3['Result'],
            'units' => $rows3['Units'],
            'comment'=>$comment,
            'flags'=>$flags,
            'analyser'=>$rows3['Analyser']
           ];
        }
        else{
            $data  = [
         
                'result' => '',
                'units' => '',
                'comment'=>'',
                'flags'=>'',
                'analyser'=>''
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


        // elseif($dept == "Coagulation") {
          
        //     $sql2 = "select * from CoagResults where Code = '$code' AND SampleID = '$sampleid' ";
        //     $params = array();
        //     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        //     $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
        //     $count = sqlsrv_has_rows($results);
        //    $rows6 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);

        //    $data4  = [
        //     'result' => $rows6['Result'],
        //     'units' => $rows6['Units'],
        //     'comment' => $rows6['Comment']
        //    ];

        // }

        
    
    
        
        
    //return view ('Results',['data'=>$data]);  
    return \Response::json($data);

   }






       
   public  function modalData(Request $req) {

    $dept = $req->dept;
    $testcode = $req->code;
    $sampleid = $req->sampleid;
    $serverName = "WIN-VSRLG0S17CC";
    $connectionInfo = array( "Database"=>"CavanTest",
                             "UID"=>"CSSQL",
                             "PWD"=>"Custom@4321",
                             "Encrypt"=>true,
                             "TrustServerCertificate"=>true);
    $conn_hq = sqlsrv_connect( $serverName, $connectionInfo);

if(!$conn_hq) {

      die( print_r( sqlsrv_errors(), true));
    }


    
        if($dept == "Biochemistry"){ 


            $department = 'BioResults';
            $code = 'Code';

        }
        elseif($dept == "Coagulation"){ 


            $department = 'CoagResults';
            $code = 'Code';

        }
  
        elseif($dept == "Haematology"){

            $department = "HaemResults50";
            $code = 'Code';
        

        }

        elseif($dept == "External"){

            $department = "ExtResults";
            $code = 'Analyte';
        

        }
        
        
$sql2 = "select * from  $department  where $code = '$testcode' AND SampleID = '$sampleid' ";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
        $count = sqlsrv_has_rows($results);
       $rows3 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
       
       if($dept == "Biochemistry"){ 


        $comment = $rows3['Comment'];
        $flags = $rows3['Flags'];
        $analyser = $rows3['Analyser'];

    }
    elseif($dept == "Coagulation"){ 


        $comment = '';
        $flags = '';
        $analyser = $rows3['Analyser'];

    }

    elseif($dept == "Haematology"){

        $comment = $rows3['Comment'];
        $flags = $rows3['Flags'];
        $analyser = $rows3['Analyser'];
    

    }

    elseif($dept == "External"){

        $comment = '';
        $flags = '';
        $analyser = '';

    }
    

        
      if($count > 0){
    
       $data  = [
     
        'result' => $rows3['Result'],
        'units' => $rows3['Units'],
        'comment'=>$comment,
        'flags'=>$flags,
        'analyser'=>$analyser
       ];
    }
    else{
        $data  = [
     
            'result' => '',
            'units' => '',
            'comment'=>'',
            'flags'=>'',
            'analyser'=>''
           ];
    }

    return $data;
       

    


    
    
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
    
        public function ocmnet(){
            return view('ocmOrNet');
        }
}
