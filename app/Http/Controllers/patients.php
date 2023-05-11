<?php
  
namespace App\Http\Controllers;
use App\Http\Controllers\patienthistorybt;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use Mail;
use PDF;
use Storage;

class patients extends Controller
{   

    


 public function getChartResults(Request $request)
    {  


        $mrn = $request->mrn;
        $code = $request->code;
        $date1 = $request->date1;
        $date2 = $request->date2;
        $r = $request->r;
        $r=str_replace(",", "','", $r);

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

        $chart=[];
        $i=0;

        // $sql23="Select * from BioTestDefinitions where shortname='$code'";
        // $query23=sqlsrv_query($conn_hq,$sql23);
        // $row22=sqlsrv_fetch_array($query);
        // return $row22[0]['Code'];

          // $chart = DB::table('patientifs')->where('Chart',$mrn)->get(); 
        $sql="select * from demographics  where  SampleID IN ('$r')";
        $query=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($query);
        if($count > 0){
          while($row=sqlsrv_fetch_array($query)){
          $chart[$i]=$row;
          $i++;
          }  
        }


         // $mrn = $chart[0]->id;  

              // $results = DB::table('results')
              //   ->select('sampleid','result','RunTime')
              //   ->whereBetween('RunTime',[$date1, $date2])
              //   ->where('patient',$mrn)
              //   ->where('code',$code)
              //   ->groupby('sampleid')
              //   ->orderBy('sampleid','desc')
              //   ->get();

        $results=[];
        $j=0;
        $sql2="select SampleID,result,RunTime from BioResults  where  SampleID IN ('$r') AND Code='$code'";
        $query2=sqlsrv_query($conn_hq,$sql2);
        $count2=sqlsrv_has_rows($query2);
        if($count2 > 0){
          while($row2=sqlsrv_fetch_array($query2)){
          $results[$j]=$row2;
          $j++;
          }  
        }
        // return $results;


                // $range = DB::table('results')
                // ->select('NormalLow','NormalHigh')
                // ->where('patient',$mrn)
                // ->where('code',$code)
                // ->where('NormalLow','!=',null)
                // ->where('NormalHigh','!=',null)
                // ->orderBy('sampleid','desc')
                // ->limit(1)
                // ->get();

        $range=[];
        $k=0;
        $sql3="select NormalLow,NormalHigh from BioResults  where  SampleID IN ('$r')";
        $query3=sqlsrv_query($conn_hq,$sql3);
        $count3=sqlsrv_has_rows($query3);
        if($count3 > 0){
          while($row3=sqlsrv_fetch_array($query3)){
          $range[$k]=$row3;
          $k++;
          }  
        }
       
           foreach($range as $ranges){
         
                if($ranges['NormalLow'] == '' || $ranges['NormalLow'] == null) {

                   $NormalLow = 0; 
                } 
                else {

                    $NormalLow = $ranges['NormalLow']; 
                }
             
           }

           foreach($range as $ranges){

                if($ranges['NormalHigh'] == '' || $ranges['NormalHigh'] == null) {

                   $NormalHigh = 0; 
                } 
                else {

                    $NormalHigh = $ranges['NormalHigh']; 
                }


           }

         


             

                foreach($results as $result) {


                        $labels[] = $result['SampleID'];

                        if($result['result'] == null || $result['result'] == '') {

                            $result = 0;
                        } else {

                        $result = $result['result'];
                        }
                        $values[] = $result;
                }

          $data = [

                    'labels' => $labels,
                    'values' => $values,
                    'NormalLow' => $NormalLow,
                    'NormalHigh' => $NormalHigh

          ]; 


        return view ('layouts.patientchart')->with('data',$data);


    }     
    public function checkPatient(Request $request)
    {  
        // return $request;
      $mrn = $request->mrn;

      $data = DB::table('patientdetails')->where('patnum','=',$mrn)->get();
      if(count($data)>0){
        return response()->json(['success'=>true]);
      } else {
        return response()->json(['success'=>false]);
      }
    }
    public function checkMicroPatient1(Request $request)
    {  
      $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

      $mrn = $request->mrn;
       $sql = "select * from demographics where Chart='$mrn'";
      $params = array();
      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
      $query=sqlsrv_query($conn_hq,$sql, $params, $options);

      $count = sqlsrv_num_rows($query);
      if($count>0){
        return response()->json(['success'=>true]);
      } else {
        return response()->json(['success'=>false]);
      }
    }
    public function checkMicroPatient($id=null)
    {  
      $demo=[];
      $li=0;
      $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
      $sql = "select * from demographics where Chart='$id' order by RunDate desc";
      $query=sqlsrv_query($conn_hq,$sql);

      while($rows23=sqlsrv_fetch_array($query)){
        $demo[$li]=$rows23;
        $li++;
       }
  
      return view('microbiologyhistory')->with('demo', $demo);      
    }
    public function getPatientHistory(Request $request)
    {  
   // return $request;
        $mrn = $request->mrn;
        $date1 = $request->date1;
        $date2 = $request->date2;
        $r2 = $request->r3;
        $date2 =   date('Y-m-d', strtotime("+1 day", strtotime($request->date2)));
         $department = $request->department;
        $mrn1=$request->r;
        $mrn2=str_replace(",", "','", $mrn1);


      
        
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        if($r2 == 'Patient'){
          $chart = DB::table('patientifs')->where('Chart',$mrn)->get(); 
        }elseif ($r2 == 'demo'){
        $sql="select top 1 * from demographics where Chart='$mrn'";
        $query12=sqlsrv_query($conn_hq,$sql);
        $chart=sqlsrv_fetch_array($query12);
        $mrn = $chart['SampleID']; 
        }
        
       
        

if($department=='1306')
{

//  echo  
$arr=[];
$hos=[];
$Requests= DB::table('ocmrequest')->where('RequestPatientID',$mrn1)->pluck('ReqestID');
$i=0;
$a=0;
foreach($Requests as $request){

  $hospitals=DB::table('ocmphlebotomy')
  ->where('PhlebotomyRequestID',$request)
  ->where('department',1306)
  ->pluck('hospital')->toArray();
  // return $hospitals;
  if($hospitals){
    
  $hos=DB::table('facilities')
  ->select('name')
  ->where('id',$hospitals[0])
  ->get();
// $a++;
  }

//   if($hospitals){
// $h2[$a]=DB::table('facilities')
//   ->select('name')
//   ->where('id',$hospitals)
//   ->get();
// $a++;  
// }
  

  $x=DB::table('ocmphlebotomy')->where('PhlebotomyRequestID',$request)
  ->where('department',1306)

  ->pluck('PhlebotomySampleID','PhlebotomySampleDateTime')->toArray();

  if($x){
    
    $arr[$i]=$x;
    
$i++;
  }
  // $a++;

}
// return $hos;
// return $arr;
// return $x;
// print_r(array_filter($arr));
// array_filter($h2, 'array_filter');

// return $h2;
// return $arr;



return view('layouts.pat')->with('data',$arr)->with('hospital',$hos);
// return 1;
}

    if($r2 == 'Patient'){
    

    $Requests= DB::table('ocmrequest')->where('RequestPatientID',$mrn1)->pluck('ReqestID');

    $i=0;
    $a=0;
    if(count($Requests) > 0){
      foreach($Requests as $request){
    
        $x=DB::table('ocmphlebotomy')->where('PhlebotomyRequestID',$request)
       ->where('department',1270)
     
       ->pluck('PhlebotomySampleID')->toArray();
     
       if($x){
         
         $arr[$i]=$x;
         
     $i++;
       }
 
      
     
     }
 
     
 $arr2=[];
 $i=0;
 
     foreach($arr as $arrs){
       $arr2[$i]=$arrs[0];
       $i++;
     }
   
    $arr2=implode(",", $arr2);
    $mrn2=str_replace(",", "','", $arr2);
   
    }
   
   
  
   

    }
   

      $sql23="Select * from demographics where SampleID IN ('$mrn2') AND SampleDate BETWEEN '$date1' AND '$date2'";
      $query23=sqlsrv_query($conn_hq,$sql23);
      
      $samplesinfo=[];
      $i=0;
     if($department =='1270'){

         while ($row=sqlsrv_fetch_array($query23)) {
        $sid=  $row['SampleID'];
        $sql="select * from bioresults where SampleID='$sid' AND result IS NOT NULL";
        $query=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($query);
        if($count > 0){
        $samplesinfo[$i]=$row;
            $i++; 
      }
    }

            $sql33="Select SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed from BioResults where SampleID IN ('$mrn2') AND RunDate BETWEEN '$date1' AND '$date2' AND result IS NOT NULL Group By SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed";
      $query33=sqlsrv_query($conn_hq,$sql33);
      
      $codes=[];
      $shortnames=[];

      
      while ($row=sqlsrv_fetch_array($query33)) {
      $code2=$row['Code'];
      $sql34="Select top 1 shortname from BioTestDefinitions where Code='$code2'";
      $query34=sqlsrv_query($conn_hq,$sql34);
      $rows34=sqlsrv_fetch_array($query34);
        //  $codes[]=$rows34;

         $codes[]=$code2;
        $shortnames[]=$rows34['shortname'];
       
      }
         
    // }

    $codes=array_unique($codes);
    $shortnames=array_unique($shortnames);    


     }else if($department =='1277'){

         while ($row=sqlsrv_fetch_array($query23)) {
        $sid=  $row['SampleID'];
        $sql="select * from HaemResults50 where SampleID='$sid' AND result IS NOT NULL";
        $query=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($query);
        if($count > 0){
        $samplesinfo[$i]=$row;
            $i++; 
      }
    }


            $sql33="Select SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed from BioResults where SampleID IN ('$mrn2') AND RunDate BETWEEN '$date1' AND '$date2' AND result IS NOT NULL Group By SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed";
      $query33=sqlsrv_query($conn_hq,$sql33);
      
      $codes=[];
      $shortnames=[];

      
      while ($row=sqlsrv_fetch_array($query33)) {
      $code2=$row['Code'];
      $sql34="Select top 1 shortname from BioTestDefinitions where Code='$code2'";
      $query34=sqlsrv_query($conn_hq,$sql34);
      $rows34=sqlsrv_fetch_array($query34);
        //  $codes[]=$rows34;

         $codes[]=$code2;
        $shortnames[]=$rows34['shortname'];
       
      }
         
    // }

    $codes=array_unique($codes);
    $shortnames=array_unique($shortnames);    


     }elseif($department =='1297'){
     

         while ($row=sqlsrv_fetch_array($query23)) {
        $sid=  $row['SampleID'];
       return  $sql="select * from CoagResults where SampleID='$sid' AND result is NOT NULL";
        $query=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($query);
        if($count > 0){
        $samplesinfo[]=$row;
      }
    }
    return $samplesinfo;

     $sql33="Select SampleID,Code,result,Valid,Printed,RunTime,RunDate,Units,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed from CoagResults where SampleID IN ('$mrn2') AND RunDate BETWEEN '$date1' AND '$date2' AND result IS NOT NULL Group By SampleID,Code,result,Valid,Printed,RunTime,RunDate,Units,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed";
      $query33=sqlsrv_query($conn_hq,$sql33);
      
      $codes=[];
      $shortnames=[];

      
      while ($row=sqlsrv_fetch_array($query33)) {
      $code2=$row['Code'];
      $sql34="Select top 1 shortname from CoagTestDefinitions where Code='$code2'";
      $query34=sqlsrv_query($conn_hq,$sql34);
      $rows34=sqlsrv_fetch_array($query34);
        //  $codes[]=$rows34;

         $codes[]=$code2;
        $shortnames[]=$rows34['shortname'];
       
      }
         
    // }

    $codes=array_unique($codes);
    $shortnames=array_unique($shortnames);    



     }elseif($department =='1487'){

         while ($row=sqlsrv_fetch_array($query23)) {
        $sid=  $row['SampleID'];
        $sql="select * from ExtResults where SampleID='$sid' AND result IS NOT NULL";
        $query=sqlsrv_query($conn_hq,$sql);
        $count=sqlsrv_has_rows($query);
        if($count > 0){
        $samplesinfo[$i]=$row;
            $i++; 
      }
    }


            $sql33="Select SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed from BioResults where SampleID IN ('$mrn2') AND RunDate BETWEEN '$date1' AND '$date2' AND result IS NOT NULL Group By SampleID,Code,result,Valid,Printed,RunTime,RunDate,Operator,Flags,Units,SampleType,Analyser,Faxed,Authorised,NOPAS,NormalHigh,NormalLow,NormalUsed";
      $query33=sqlsrv_query($conn_hq,$sql33);
      
      $codes=[];
      $shortnames=[];

      
      while ($row=sqlsrv_fetch_array($query33)) {
      $code2=$row['Code'];
      $sql34="Select top 1 shortname from BioTestDefinitions where Code='$code2'";
      $query34=sqlsrv_query($conn_hq,$sql34);
      $rows34=sqlsrv_fetch_array($query34);
        //  $codes[]=$rows34;

         $codes[]=$code2;
        $shortnames[]=$rows34['shortname'];
       
      }
         
    // }

    $codes=array_unique($codes);
    $shortnames=array_unique($shortnames);    



     }

     
       // }
   
   
   
   
   
   
   
       return       $data = [
   
                       'shortnames' => $shortnames,
                       'codes' => $codes,
                       'samplesinfo' => $samplesinfo,
                       'flags' => ''
   
             ]; 
          // return $data['codes'][0]['Code'];
                
        
          return view ('layouts.patienthistorylist')->with('data',$data);
    }



    public static function GetResult($code='',$sampleid='',$mrn='')
        
        {       
          
           $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

          //  $sql="select * from ocmMapping where SourceValue='$code'";
          // $query=sqlsrv_query($conn_hq,$sql);
          // $row=sqlsrv_fetch_array($query);
          // return $row['TargetValue'];

          $sql2="select * from BioResults where Code='$code' AND SampleID='$sampleid'";
          $query2=sqlsrv_query($conn_hq,$sql2);
          $row2=sqlsrv_fetch_array($query2);
          $count=sqlsrv_has_rows($query2);
          if($count > 0){
            return $row2['result'];
        }else{
            return '';
        }
          



            $chart = DB::table('patientifs')->where('Chart',$mrn)->get(); 
            $mrn = $chart[0]->id;

               $results = DB::table('results')
                ->select('results.result','results.Flags')
                ->where('results.patient',$mrn)
                ->where('results.sampleid',$sampleid)
                ->where('results.Code',$code)
                ->get();  

                if(count($results) > 0) {

                        return $results[0]->result;
                 }


        }


        public static function GetResult2($code='',$sampleid='',$mrn='')
        
        {       

               $results = DB::table('results')
                ->select('results.result','results.Flags')
                ->where('results.patient',$mrn)
                ->where('results.sampleid',$sampleid)
                ->where('results.Code',$code)
                ->get();  

                if(count($results) > 0) {

                       return $results[0]->Flags;
                }
        }




    public function PatientHistory(Request $request)
    {   
   
      $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
 
            $type =  $request->type;
         $mrn = $request->id;
         // $mrn=explode (",", $mrn);
         $mrn=str_replace(",", "','", $mrn);
         // foreach($mrn as $charts){
         //  return $charts;
         // }

         if($type == 'demo'){
          $sql="SELECT top 1 * FROM demographics WHERE SampleID IN ('$mrn') Order By SampleDate desc";
          // $sql="select * from demographics where SampleID='$mrn'";
          $query=sqlsrv_query($conn_hq,$sql);
  
          $patient=sqlsrv_fetch_array($query);
          // $patient = DB::table('patientifs')->where('id',$mrn)->get();
          $now = Carbon::now();
  
          $date1 = Carbon::now()->subDay(35);
          $date2 = Carbon::now();
  
          $date1 =  $date1->format('Y-m-d'); 
          $date2 =  $date2->format('Y-m-d'); 

          $type = 'demo';
  
         }
         else{
            $patient = DB::table('patientifs')->where('id',$mrn)->get();

            $now = Carbon::now();
            $date1 = Carbon::now()->subDay(35);
            $date2 = Carbon::now();
    
            $date1 =  $date1->format('Y-m-d'); 
            $date2 =  $date2->format('Y-m-d'); 

            $type = 'patientifs';
    
         }
        
        $departments = DB::table('Lists')->where('ListType','DPT')->where('Text','!=','Trans')->get();
      
      
   

     $data = [

                    'date1' => $date1,
                    'date2' => $date2,
                    'patient' => $patient,
                    'departments' => $departments,
                    'type'=> $type


          ]; 

         
    


        
        return view ('patienthistory')->with('data',$data);
    } 


    public function index(Request $request)
    {   

                 
          $segment =  $request->List;  


            if($segment == 'All') {

                  
            } 
            elseif($segment == 'My') { 
 
            }


              


         if ($request->ajax()) {
            
         

            $segment =  $request->List;  


           
            $user = auth()->user();


        
          $myPatients = DB::table('ocmrequest')->where('RequestCreatedBy',$user->id)
                    ->orderBy('ReqestID','desc')->limit(10)->pluck('RequestPatientID');
                          


            $ocmrequest = DB::table('ocmrequest')->where('RequestCreatedBy',$user->id)
            ->orderBy('ReqestID','desc')->limit(10)->pluck('RequestPatientID');

          
             
            if(count($ocmrequest) == 0) {

               $id = 0;

            }    else {

                 $result = array(); 
                   foreach ($ocmrequest as $value){
                      if(!in_array($value, $result))
                        $result[]=$value;
                    }
                  
                  sort($result, SORT_NUMERIC); 
                 $id = implode(",",$result);

            }

            $data = DB::table('PatientIFs') 
                            ->select(
                                    'PatientIFs.*',
                                    'Wards.Text as Wards',
                                    'PatientIFs.Ward as WardID', 
                                    'Clinicians.Text as Clinicians',
                                   
                                    DB::raw('(SELECT RequestClinicianID FROM OCMRequest WHERE OCMRequest.RequestPatientID = PatientIFs.id order by OCMRequest.ReqestID desc limit 1)  as ClinicianID'),


                                    DB::raw('(SELECT COUNT(*) FROM OCMRequest WHERE OCMRequest.RequestPatientID = PatientIFs.id and OCMRequest.ExecutionDateTime < CURRENT_TIMESTAMP)+1 as Visits')
                                  
                                
                                )
                            ->leftjoin('Wards', 'Wards.id', '=', 'PatientIFs.Ward')
                            ->leftjoin('Clinicians', 'Clinicians.id', '=', 'PatientIFs.Clinician')
                           
                              


                              ->when(!empty($request->mrn) , function ($query) use($request){
                            
                           
                                 return $query->where('patientifs.Chart',$request->mrn);

                            
                             }) 


                              ->when(!empty($request->clinician) , function ($query) use($request){
                            
                           
                                 return $query->where('patientifs.Clinician',$request->clinician);
                            
                             }) 


                              ->when(!empty($request->ward) , function ($query) use($request){
                            
                                 return $query->where('patientifs.Ward',$request->ward)
                                                ->whereNotIn('ADTmessage',['ADT^A03']);


                            
                             }) 


                             ->when(empty($request->mrn) , function ($query) use($myPatients,$segment){
                                         
                                            
                                          return $query->whereNotIn('ADTmessage',['ADT^A03']);

                                     }) 


                             ->when(!empty($request) , function ($query) use($myPatients,$segment){
                                         
                                  
                                         if($segment == 'My') {
                                          return $query->whereIn('PatientIFs.id',$myPatients);
                                            }

                                     });

                           
                            // ->groupby('Chart')
                            // ->whereIn('DateTimeAmended', function($q){
                            //         $q->select(DB::raw('MAX(DateTimeAmended) FROM patientifs GROUP BY Chart'));
                            //     });
                           

                                  


            return Datatables::of($data)

                    ->addIndexColumn()

                    ->editColumn('PatName', function($row){ 

                     

                            return '<a href="'.route('Requests').'/All/'.$row->id.'" class="text-primary">'.$row->PatName.'</a>';

                       

                     })
                     ->editColumn('Chart', function($row){ 

                     
                        
                      return '<button id="'.$row->Chart.'" class="text-left text-primary chartID" style="border:0px;background:none;">'.$row->Chart.'</button>';

                     

                   })
                    ->editColumn('Clinicians', function($row){ 

                     

                            return '<button id="'.$row->Clinician.'" class="text-left text-primary clinicianID" style="border:0px;background:none;">'.$row->Clinicians.'</button>';

                       

                     })

                    ->editColumn('Wards', function($row){ 

                     

                            return '<button id="'.$row->Ward.'" class="text-left text-primary wardID" style="border:0px;background:none;">'.$row->Wards.'</button>';

                       

                     })


                    ->addColumn('action', function($data){
                      $RequestClinicalDetails = DB::table('OCMRequest')
                      ->select('OCMRequest.RequestClinicalDetail')
                      ->where('OCMRequest.RequestPatientID',$data->id)
                      ->limit(1)
                      ->orderBy('OCMRequest.id','desc')
                      ->get();
                 
                 if(count($RequestClinicalDetails) > 0) {
                     $RequestClinicalDetail = $RequestClinicalDetails[0]->RequestClinicalDetail;
                 } else {
                     $RequestClinicalDetail = '';
                 }
                           $btn = '
                                
                                <div class="btn-group" role="group">
                                 <button type="button"      id="'. $data->id .'" 
                                 name="'. $data->PatName .'"  
                                 bed="'. $data->BedNumber .'"  
                                 Chart="'. $data->Chart .'"  
                                 clinician="'. $data->ClinicianID .'" 
                                 clinicianDetails = "'. $RequestClinicalDetail .'" 
                                 Sex="'. $data->Sex .'" 
                                 DoB="'. $data->DoB .'" 
                                 MRN="'. $data->MRN .'" 
                                 Address0="'. $data->Address0 .'"
                                 Visits="'. $data->Visits .'"  title="Add New Request" class="addRequest btn btn-warning"><i class="fas fa-plus"></i>
                                </button>



                                 <a href="../PatientHistory/'.$data->id.'/Patient/Biochemistry" title="Patient History" class="PatientHistory btn btn-primary">
                                 <i class="fas fa-chart-area"></i>
                                </a>


                                 <a href="../PatientHistoryBT/'.$data->Chart.'" title="Product History" class="PatientHistoryBT btn btn-danger">
                                 <i class="fas fa-chart-line"></i>
                                </a>

                                 <a href="../Requests/All/'.$data->id.'" title="Requests List" class="btn btn-info"><i class="fas fa-th-list"></i>
                                </a>


                                 </div>
                                  ';
    
                            return $btn;
                    }) 

                    ->setRowId('id')
                    ->rawColumns(['action','PatName','Chart','Wards','Clinicians'])
                    ->make(true);

                    
                  
        }


        $clinicians = DB::table('clinicians')->orderby('Text')->get();
        $wards = DB::table('wards')->orderby('Text')->get();


        $data = [

                    'clinicians' => $clinicians,
                    'wards' => $wards


          ];  

        
        return view ('patients')->with('data',$data);

        
    }
 public function PatientSaveFile(Request $request){
    $chartno = $request->chartno;
    $rootPath = 'D:/';
    $client = Storage::createLocalDriver(['root' => $rootPath]);
    $txt="[Password]\nPass=gort77\n\n[ChartNo]\nChart=$chartno\n";
    $client->put('WE.ini', $txt);


    // Storage::put('WE.ini', $txt);
    


    return response()->json(['success'=>true]);
 }

 public function GtTest(){
  return view('GtTest');
}
    
public function glucoseTol(){

  return view("glucoseTol");
}
public function GlucoseTolData(Request $request){
  $result=[];
  $to=$request->to;
  $from=$request->from;
  $patname=$request->patname;
  $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
  $tsql4="SELECT D1.DoB, D1.PatName FROM Demographics AS D1, BioResults AS B1 WHERE D1.PatName LIKE '%$patname%' AND D1.SampleID = B1.SampleID AND B1.RunDate BETWEEN '$from' AND ' $to'";
  $getlist4 = sqlsrv_query($conn_hq, $tsql4);

  while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
  {
    $result[]=$row4;
  }
  return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('Date', function($row){
           $dob= $row['DoB'];
            return $btn = "<button class='btn btn-primary dob' id='$dob' data=".$row['DoB']." type='button'>$dob</button>";
        }) 
        ->addIndexColumn()
        ->addColumn('Name', function($row){
            return $row['PatName'];
        }) 
        ->setRowId('Date')
        ->rawColumns(['Date', 'Name'])
        ->make(true);
}
public function GlucoseTolDataButton(Request $request){
        $result=[];
        $date=$request->id;
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
  
        $tsql4="SELECT D1.SampleID, B1.RunDate FROM Demographics AS D1, BioResults AS B1 WHERE D1.SampleID = B1.SampleID AND B1.RunDate ='$date'";
         $getlist4 = sqlsrv_query($conn_hq, $tsql4);
         while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
         {
            $result[]=$row4;
         }
         return DataTables::of($result) 
         ->addIndexColumn()
         ->addColumn('Run#', function($row){
             return $row['SampleID'];
         }) 
         ->addIndexColumn()
         ->addColumn('Time', function($row){
             return $row['RunDate'];
         }) 
         ->addIndexColumn()
         ->addColumn('Serum mmol/L', function($row) use($request){
             $to=$request->to;
             $from=$request->from;
             $patname=$request->patname;
             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
             $tsql = "Select Contents from Options where Description = 'BioCodeForCreat'";     
             $getlist = sqlsrv_query($conn_hq, $tsql);
             $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);
             $SCreaCode=$row1['Contents'];
             $sid= $row['SampleID'];
              $tsql5 = "SELECT Code from BioResults where RunDate BETWEEN '$from' AND '$to' AND Code ='$SCreaCode'";
 
            $getlist5 = sqlsrv_query($conn_hq, $tsql5);
             if($getlist5 !== false){
             
                 $count5=sqlsrv_has_rows($getlist5);
 
             $btn = "<button class='btn btn-primary getsid' id='$sid' data='$SCreaCode' type='button' >$sid</button>";
             if($count5 > 0){  
                 return $btn;
             }else{
                 return '-';
             } 
             }
         }) 
         ->setRowId('Run#')
         ->rawColumns(['Run#', 'Time', 'Serum mmol/L'])
         ->make(true);

}

public function GlucoseTolDataButton2(Request $request){
  $data=[];
  $id=$request->id;
  $SCreaCode=$request->SCreaCode;
  $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
  $tsql = "select Chart,DoB,Age,Sex,Addr0,Addr1,ward,GP from demographics WHERE SampleID='$id'";     
  $getlist = sqlsrv_query($conn_hq, $tsql);
  $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);
  $data=[
    'Chart'=>$row1['Chart'], 
    'DoB'=>$row1['DoB'], 
    'Age'=>$row1['Age'],
    'Sex'=>$row1['Sex'],
    'Addr0'=>$row1['Addr0'],
    'Addr1'=>$row1['Addr1'],
    'ward'=>$row1['ward'],
    'GP'=>$row1['GP']
  ];
return $data;
}


}