<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\ticketattachment;
use App\Models\ticketmessages;
use DB;
use App;
use Carbon\Carbon;
use DataTables;
use DateTime;
use Auth;
class tickets extends Controller
{


   public function uploadFiles(Request $request)
   {                    

         if ($request->hasfile('files')) {
            

            foreach ($request->file('files') as $file) {
                
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('images');
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid().'.'.$extension;
                $file->move($destinationPath,$filename);

            if($request->mid != '') {


            DB::insert('insert into ticketattachments (ticketid, filename,  datetime, mid) values (?, ?, ?, ?)', 
            [$request->tid, $filename, date('Y-m-d H:i:s'),  $request->mid] ); 

            } else {


            DB::insert('insert into ticketattachments (ticketid, filename,  datetime) values (?, ?, ?)', 
            [$request->tid, $filename, date('Y-m-d H:i:s') ] ); 

            }    

                
            }

             return response()->json(['success'=>'File uploaded.']);
        }


   } 

   public function Ticket(Request $request){

        $patients =DB::table('patientifs')->select('Chart','PatName')->get();


        if($request->id != '') {

             $id = $request->id;
             $ticketinfo=ticket::find($id); 
                $ticketattachments=ticketattachment::find($id); 

                $data = [
                            'ticketinfo' => $ticketinfo,
                            'ticketattachments' => $ticketattachments,
                            'patients' => $patients

                  ];  

        } 
        else {


                $data = [
                            'ticketinfo' => '',
                            'ticketattachments' => '',
                            'patients' => $patients

                  ];    

   
        }  
        
        return view('Ticket')->with('data', $data);  

    
    }



       public function TicketView(Request $request){

                $patients =DB::table('patientifs')->select('Chart','PatName')->get(); 
                
                $id = $request->id;
                $ticketinfo=ticket::where('id',$id)->get(); 
                $ticketattachments=ticketattachment::where('mid', null)->where('ticketid',$ticketinfo[0]->ticketid)->get(); 


                  $ticketmessages = DB::table('ticketmessages') 
                         ->select('*')
                         ->where('ticketmessages.ticketid',$ticketinfo[0]->ticketid)
                         ->orderBy('created_at','asc')
                         ->get();





                $data = [
                            'ticketinfo' => $ticketinfo,
                            'ticketattachments' => $ticketattachments,
                            'ticketmessages' => $ticketmessages,
                            'patients' => $patients

                  ];  


        
        return view('ticketview')->with('data', $data);  

    
    }

    public static function getTicketReplyAttachments($mid){


        
         $mid =DB::table('ticketattachments')->where('mid',$mid)->get();

         return $mid;


    }
           

public function save(Request $request){
      
      $patientname = $request->patientname;
        $requestid = $request->requestid ;
        $sampleid = $request->sampleid;
        $subject = $request->subject;
        $department = $request->department;
        $priority = $request->priority;
        $message = $request->message;
        $tid = $request->tid;
           
           $id=auth()->user()->id;
           $email=auth()->user()->email;
           $date=Carbon::now();


        $validated = $request->validate([
             'subject' => 'required',
            'department' => 'required',
            'priority'=> 'required',
            'message' => 'required'
            
                                 
        ]);

        $business =DB::table('business')->get();

        if($priority != '') {

                $ticketstime =DB::table('ticketstime')->where('type',$priority)->get();
                $estresponse = $ticketstime[0]->response;
                $esttime = $ticketstime[0]->resolution;
        }

        DB::insert('insert into tickets (patientname, username, requestid,sampleid,subject,department,priority,message,created_at,created_by,ticketid,status,business,estresponse,esttime) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$patientname,$email,$requestid,$sampleid,$subject,$department,$priority,$message,$date,$id,$tid,'Opened', $business[0]->name,$estresponse,$esttime]);
              return response()->json(['status','true']);

}

public function updateTicketInfo(Request $request){


        
        $patientname = $request->patientname;
        $requestid = $request->requestid ;
        $sampleid = $request->sampleid;
        $subject = $request->subject;
         $department = $request->department;
          $priority = $request->priority;
           $message = $request->message;
             $tid = $request->tid;
             $mid = $request->mid;
           
           $user = auth()->user()->id;
           $email=auth()->user()->email;
           $date=Carbon::now();


        $validated = $request->validate([
            'tid' => 'required',
            'mid' => 'required',
             'subject' => 'required',
            'department' => 'required',
            'priority'=> 'required',
            'message' => 'required'
            
                                 
        ]);

     DB::insert('insert into ticketmessages (ticketid, mid, username, message, user, created_at, created_by) values (?, ?, ?, ?, ?, ?, ?)', 
            [$request->tid, $request->mid, $email, $message, 'client', date('Y-m-d H:i:s'), $user ]); 


      $tid =DB::table('tickets')->where('ticketid',$request->tid)->get();
      return $tid[0]->id;

         
          

}


public function sendTicketToOCM(Request $request){


        
        $patientname = $request->patientname;
        $requestid = $request->requestid ;
        $sampleid = $request->sampleid;
        $subject = $request->subject;
         $department = $request->department;
          $priority = $request->priority;
           $message = $request->message;
             $tid = $request->tid;
             $mid = $request->mid;
           
           $user = auth()->user()->id;
           $email=auth()->user()->email;
           $date=Carbon::now();


        $validated = $request->validate([
            'tid' => 'required',
            'mid' => 'required',
             'subject' => 'required',
            'department' => 'required',
            'priority'=> 'required',
            'message' => 'required'
            
                                 
        ]);

     DB::insert('insert into ticketmessages (ticketid, mid, username, message, user, created_at, created_by) values (?, ?, ?, ?, ?, ?, ?)', 
            [$request->tid, $request->mid, $email, $message, 'client', date('Y-m-d H:i:s'), $user ]); 


    
    DB::update("update tickets  set status = 'Opened', internal = 1, requestedat = '".date('Y-m-d H:i:s')."'  where ticketid = '".$request->tid."'");

  

      $tid =DB::table('tickets')->where('ticketid',$request->tid)->get();
      return $tid[0]->id;

         
          

}




public function CloseTicket(Request $request){


        
        $patientname = $request->patientname;
        $requestid = $request->requestid ;
        $sampleid = $request->sampleid;
        $subject = $request->subject;
         $department = $request->department;
          $priority = $request->priority;
           $message = $request->message;
             $tid = $request->tid;
             $mid = $request->mid;
           
           $user = auth()->user()->id;
            $email=auth()->user()->email;
           $date=Carbon::now();


        $validated = $request->validate([
            'tid' => 'required',
            'mid' => 'required',
            'department' => 'required',
            'priority'=> 'required',
            'message' => 'required'
            
                                 
        ]);

     DB::insert('insert into ticketmessages (ticketid, username, mid, message, user, created_at, created_by) values (?, ?, ?, ?, ?, ?, ?)', 
            [$request->tid, $email, $request->mid, $message, 'client', date('Y-m-d H:i:s'), $user ]); 


       DB::update("update tickets  set status = 'Closed', assignedto = '".$email."' where ticketid = '".$request->tid."'");


      $tid =DB::table('tickets')->where('ticketid',$request->tid)->get();
      return $tid[0]->id;

         
          

}

public function update(Request $req){
  
   $data=ticket::find($req->id);
   $file=ticket::find($req->id);
   $data->patientname=$req->patientname;
   $data->requestid=$req->requestid;
   $data->sampleid=$req->sampleid;
   $data->subject=$req->subject;
   $data->department=$req->department;
   $data->priority=$req->priority;
   $data->file=$req->file;
   $data->message=$req->message;
   $data->save();
   
}
public function deleteTicket(Request $request){
   

   DB::table('tickets')->where('ticketid',$request->id)->delete(); 
   DB::table('ticketattachments')->where('ticketid',$request->id)->delete(); 


}
public function tickets(Request $request){
    
       
         if ($request->ajax()) {
                  $data = DB::table('tickets')
                  ->select(
                        'tickets.*',
                        DB::raw('(SELECT max(created_at) FROM ticketmessages WHERE tickets.ticketid = ticketmessages.ticketid order by created_at desc limit 1) as closed')
                        )
                  ->leftjoin('ticketattachments', 'tickets.id' ,"=",'ticketattachments.id')
                  ->get();
          


            return Datatables::of($data)
                    
            
            ->addIndexColumn()


                     ->editColumn('priority', function($row){ 

                     if($row->priority == 'Low') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-info">'.$row->priority.'</span>';


                     } elseif($row->priority == 'Medium') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-primary">'.$row->priority.'</span>';

                     } 
                     elseif($row->priority == 'High') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-warning">'.$row->priority.'</span>';

                     } 

                      elseif($row->priority == 'Critical') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-danger">'.$row->priority.'</span>';

                     } 

                                

                        })


                  ->editColumn('internal', function($row){ 

                     if($row->internal == null) {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-primary">Internal</span>';


                     } else {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-success">OCM Support</span>';

                     } 
                    }) 


                     ->editColumn('status', function($row){ 

                     if($row->status == 'Opened') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-primary">'.$row->status.'</span>';


                     } elseif($row->status == 'Processing') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-warning">'.$row->status.'</span>';

                     } 
                     elseif($row->status == 'Closed') {

                         return '<span class="state p-1 btn-sm px-0 btn-block text-center bg-success">'.$row->status.'</span>';

                     } 

                                

                        })

                    ->addColumn('action', function($row){
     
                              $btn = '
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a style="width:70px;" href="TicketView/'.$row->id.'" title="View Ticket" class="btn btn-info update">
                                 <i class="fas fa-eye"></i> | <i class="bx bx-edit"></i>
                                </a>
                                 </div>

                                <a href="Ticket/'.$row->id.'" title="Edit User" class="btn btn-primary update d-none">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button id="'.$row->ticketid.'" type="button" class="d-none btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                  ';
    
                            return $btn;
                             
                    })

                    ->addColumn('resolved', function($row){
     
                                        if($row->status == 'Closed') {

                                            $start  = new Carbon($row->created_at);
                                        $end    = new Carbon($row->closed);

                                        if($start->diff($end)->format('%D') > 1) {

                                            return $start->diff($end)->format('%D days %H hours');   
                                        }
                                        elseif($start->diff($end)->format('%H') > 1) {

                                            return $start->diff($end)->format('%H hours %I mins');   
                                        } 
                                        else {

                                            return $start->diff($end)->format('%I mins');  
                                        }
                                        }
                                        
                                                                     
                    })


                    

                    ->setRowId('id')
                    ->rawColumns(['action','priority','internal','status'])
                    ->make(true);

                   
                 
        }

        return view('tickets');
}






function Scanpost(Request $request){

 $sdate = $request->sdate;
 $rdate = $request->rdate;

  $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }




    if(!$conn_hq){
        return false;
    }
    if($request->ajax()){
    // $request;
    $sid=$request->s;
   $s= array_unique($sid);


    foreach($s as $key => $s){
        // $sdate= \Carbon\Carbon::parse($sdate[$key])->format('Y-m-d h:m:s');
        // $rdate=\Carbon\Carbon::parse($rdate[$key])->format('Y-m-d h:m:s');
        // $sdate=\Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $sdate[$key]);
        // $rdate=\Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $rdate[$key]);
          $sdate = date("Y-m-d H:i:s ", strtotime($sdate[$key]));
         $rdate = date("Y-m-d H:i:s", strtotime($rdate[$key]));

        // $rdate[$key]=str_replace('T',' ',$rdate[$key]);
 $sql1 = "Select top 1 * from ocmRequestDetails  WHERE SampleID ='$s' and Programmed = 0";
$results = sqlsrv_query( $conn_hq, $sql1); 
$rows1 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
 $requestid = $rows1['RequestID']; 
 $addon = $rows1['Addon']; 


 $sql2 = "Select * from ocmRequest  WHERE RequestID ='$requestid'";
$results2 = sqlsrv_query( $conn_hq, $sql2); 
$date="";
$time="";
$date=date('d-m-y');
$time=date("d-m-y h:i:s");
// return $date;
$rows2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC);
        $requestpatid = $rows2['Chart'];
        $Ward = $rows2['Ward'];
        $clinician=$rows2['Clinician'];
        
        $cldetails=$rows2['ClDetails'];
        $hospital=$rows2['Hospital'];
        $fasting=$rows2['fasting'];
        $urgent=$rows2['Urgent'];


        
        // $array[$i] = $rows1['SampleID'];
        
 
    // return $requestpatid;
    $sql3 = 

   "Select * from patientifs  WHERE Chart='$requestpatid'";
    $results3 = sqlsrv_query( $conn_hq, $sql3); 
    $array3=[];
    $i=0;
    $rows3 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC);
    //    $array3[$i] = $rows3;
    //     $i++;
        $Chart = $rows3['Chart'];
        $PatName=$rows3['PatName'];
        $Sex=$rows3['Sex'];
     $DoB=$rows3['DoB'];
     
     $type1=gettype($DoB);

     if($type1=="string"){
        $DoB=$rows3['DoB'];
        }
else{
    $DoB=$rows6['SampleDate']->format('Y-m-d-h-i-s');

}

        $Addr0=$rows3['Address0'];
        $Addr1=$rows3['Address1'];
        // $Ward=$rows3['Ward'];
		// $clinician = $rows3['Clinician'];
		$gp = $rows3['GP'];
		$surname = $rows3['PatSurName'];
		$forename = $rows3['PatForeName'];
        // $i++;
        // $dateOfBirth = "15-06-1995";

    //    $DoB=date('Y-m-d',strtotime($DoB));

        $birthdate = new DateTime($DoB);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today);
		
		// $rundate= Carbon::now();
		
		
        if($age->y<0){
        $age=$age->m.'M';
    }
    else{
        $age=$age->y.'Y';
    }
        // return $age;
        // return $DoB;
    


      $sql4 = "Insert into demographics(SampleID,Chart,PatName,Sex,DoB,Addr0
      ,Addr1,Ward,Age,Clinician,GP,SurName,ForeName,SampleDate
      ,TimeTaken,ClDetails,Hospital,DateTimeDemographics,
      RunDate,RecordDateTime,RecDate,Operator,LabNo,Urgent,
      fasting)
      values('$s','$Chart','$PatName','$Sex','$DoB','$Addr0','$Addr1','$Ward','$age', '$clinician', '$gp', '$surname','$forename','".$sdate."','".$rdate."','$cldetails','$hospital','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','Robotics','$s','$urgent','$fasting')";
    $results4 = sqlsrv_query( $conn_hq, $sql4); 

    




  $q="SELECT * from ocmRequestDetails where RequestID ='$requestid' and SampleID='$s' ";
    $r = sqlsrv_query( $conn_hq, $q); 
	
    
    while ($rows6 = sqlsrv_fetch_array($r, SQLSRV_FETCH_ASSOC)){
$sa=$rows6['SampleID'];
        $department=$rows6['DepartmentID'];
       $scode=$rows6['TestCode'];
        $daterequired=$rows6['daterequired'];
        $sampletype=$rows6['SampleType'];

        $units=$rows6['units'];
        $SampleDate=$rows6['SampleDate'];
         $type=gettype($SampleDate);
        if($type=="string"){
        $SampleDate=$rows6['SampleDate'];
        }
else{
    $SampleDate=$rows6['SampleDate']->format('Y-m-d-h-i-s');

}
        $external=$rows6['external_'];
        // $array[$i] = $rows1['SampleID'];
      if($daterequired==""){
	  $daterequired="NULL";
	  }
	  
     $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$scode'";
      $reu = sqlsrv_query( $conn_hq, $ssql); 
        
       $rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
      $code=$rows69['TargetValue'];
	
    if($department=='Bio' && $external=='0'){
     
        


       echo $sql8="Insert into BioRequests(SampleID,Code,Programmed,DateTime,SampleType) values('$sa','$code',1,'".date('Y-m-d H:i:s')."','$sampletype')";
	
        $results9 = sqlsrv_query( $conn_hq, $sql8);
   
        $analy="Select Analyser from BioTestDefinitions where Code='$code'";
        $analys=sqlsrv_query( $conn_hq, $analy);
        $count=sqlsrv_has_rows($analys);
        if($count > 0){
            $m = sqlsrv_fetch_array($analys, SQLSRV_FETCH_ASSOC);
              $analyser=$m['Analyser'];
        }else{
            $analyser=NULL;
        }
      

      $sql9="Insert into BioResults(SampleID,Code,Printed,Valid,Analyser) values('$sa','$code',0,0,'$analyser')";
   //     $results10 = sqlsrv_query( $conn_hq, $sql9); 
    }
        
        elseif($department=='Bio' && $external=='1'){
         echo    $analy="Select * from ExternalDefinitions where AnalyteName='$code'";
            $analys=sqlsrv_query( $conn_hq, $analy);
            $m = sqlsrv_fetch_array($analys, SQLSRV_FETCH_ASSOC);
            $analyser=$m['AnalyteName'];
          echo  $sql9="Insert into ExtResults(SampleID,Analyte) values('$sa','$analyser')";
     $results10 = sqlsrv_query( $conn_hq, $sql9); 
        
        $sql6969="Insert into Biomnisrequests(SampleID,TestCode,SampleDateTime) values('$sa','$analyser','".date('Y-m-d H:i:s')."')";
        $results106 = sqlsrv_query( $conn_hq, $sql6969); 
        }
            
             elseif($department=='Haem'){
           $sql10="Insert into HaeRequests(SampleID,Code,Programmed,DateTimeOfRecord,DateTime) values('$sa','$code',1,NULL,'".date('Y-m-d H:i:s')."')";
                $results11 = sqlsrv_query($conn_hq, $sql10); 
               
           $sql11="Insert into HaemResults50(SampleID,Code,Printed,Valid,Analyser) values('$sa','$code',0,0,'IPU')";
             //   $results12 = sqlsrv_query( $conn_hq, $sql11); 
                 
				   }
                     elseif($department=='Coag'){
                   $sql12="Insert into CoagRequests(SampleID,Code,Units,DateTime) values('$sa','$code','$units','".date('Y-m-d H:i:s')."')";
                        $results13 = sqlsrv_query( $conn_hq, $sql12); 
                     
                     $sql13="Insert into CoagResults(SampleID,Code,Printed,Valid,Analyser) values('$sa','$code',0,0,'CS')";
                       // $results14 = sqlsrv_query( $conn_hq, $sql13); 
                            } 
                            
                            
                          
        

    }  
if(!$addon){
    $updatestatus="Update ocmRequest set RequestState='Received in the lab' where RequestID='$requestid'";
    sqlsrv_query( $conn_hq, $updatestatus);
    $updatestatus2="Update ocmRequestDetails set RequestState='Received in the lab' where RequestID='$requestid'";
    sqlsrv_query( $conn_hq, $updatestatus2);

    DB::update("Update ocmRequest set RequestState='Received in the lab' where ReqestID='$requestid'");
 $upd="Update ocmRequestDetails set Programmed='1',SampleDate='".$sdate."',recevieddate='".$rdate."' where SampleID='$s'";
 sqlsrv_query( $conn_hq, $upd);   
}else if($addon){
    $updatestatus="Update ocmRequest set RequestState='In Progress' where RequestID='$requestid'";
    sqlsrv_query( $conn_hq, $updatestatus);
    DB::update("Update ocmRequest set RequestState='In Progress' where ReqestID='$requestid'");
 $upd="Update ocmRequestDetails set Programmed='1',SampleDate='".$sdate."',recevieddate='".$rdate."' where SampleID='$s'";
 sqlsrv_query( $conn_hq, $upd);    
}  

	 DB::update("Update ocmPhlebotomy set PhlebotomySampleReceivedInLabDateTime ='".$rdate."' where PhlebotomySampleID='$s'");
}




}

}



function ScanAddons(Request $request){

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

   
    $arr=[];
    if($request->ajax()){

    $sid=$request->sid;
  $sql1="select TOP(1)* from ocmRequestDetails where SampleID = '$sid' AND Programmed=0 and Addon=1";
//return $sql1;       
	   $results0 = sqlsrv_query( $conn_hq, $sql1); 
        // return $results0; 
        $i=0;
        $array=[];
        $array2=[];
        $a=0;
        while ($rows1 = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC)){
            $array[$i] = $rows1;
            $i++;
            // $array[$i] = $rows1['SampleID'];

         
            
            
        } 

		// return $array;
         $requestid= $array[0]['RequestID'];

        $sql2 = "Select * from ocmRequest  WHERE RequestID ='$requestid'";
        $results2 = sqlsrv_query( $conn_hq, $sql2);
        while ($rows2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)){
            $array2[$a] = $rows2;
            $a++;
            // $array[$i] = $rows1['SampleID'];
            
            

        }  
        // return $array2;

        $data =  ['array'=>$array, 'array2'=>$array2];

   return view('ab', compact('data'))->render();  

    return response()->json(array('success' => true, 'html'=>$data));
    }


   }
   


static function  deptrequest(  $requestid=''){
//  $requestid='22599';
        // return $requestid;
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }



  $request=DB::table('ocmphlebotomy')->where('PhlebotomyRequestID','=',$requestid)->get();
//   return $request;
foreach($request as $requests){

    $sampleid=$requests->PhlebotomySampleID;
  $department=$requests->department;
    $hospital=$requests->hospital;

     $type=DB::table('facilities')->where('id',$hospital)->pluck('type');


     $dcode=DB::table('Lists')->where('id',$department)->pluck('Code');
            $recieveddate = "Select * from ocmRequestDetails where requestid='$requestid'";
            $sq=sqlsrv_query($conn_hq, $recieveddate);
            if (sqlsrv_has_rows($sq) > 0) {
         while($re=sqlsrv_fetch_array($sq,SQLSRV_FETCH_ASSOC)){
                    DB::update(
                        "update ocmphlebotomy set
                     PhlebotomySampleReceivedInLabDateTime='" . $re['recevieddate']. "'
                      where PhlebotomyRequestID='$requestid'"
                    
                    );
         }
            
            }







// return $dcode;



if($dcode[0]=="Bio" && $type[0]=='Internal'){


    $tests=DB::table('ocmrequesttestsdetails')->where('sampleID',$sampleid)->get();


foreach($tests as $test) {

                    

   $patient =  $test->patient;
   $testid = $test->test;
$sex='';
$age='';
     $code=DB::table('testdefinitions')->where('id',$testid)->select('shortname')->get();
    $testcode =  $code[0]->shortname;

                      $demo = "Select TOP(1)* from demographics where SampleID='$sampleid'";
					  $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
      $reu = sqlsrv_query( $conn_hq, $ssql); 
        
       $rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
      $tar=$rows69['TargetValue'];
	  
                    $demo2 = sqlsrv_query( $conn_hq, $demo);
                    if (sqlsrv_has_rows($demo2) > 0) {
                        $rows69 = sqlsrv_fetch_array($demo2, SQLSRV_FETCH_ASSOC);
                        $age = $rows69['Age'];
                        $sex = $rows69['Sex'];


                        if (str_contains($age, 'Y')) {
                            $age = str_replace("Y", " ", $age);
                        }
                        $age = (int) $age;

                         $newage = $age * 365;
                    
                    $malehigh = '';
                    $malelow='';
                    $codes = '';
                    $flag = '';
					
                    if($sex=='M'){
						
                         $sql="select TOP(1)* from BioTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                    $query=sqlsrv_query($conn_hq,$sql);
                    $count=sqlsrv_has_rows($query);
                
                    if($count > 0){
                            $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                $malelow = $rew['MaleLow'];
                                $malehigh = $rew['MaleHigh'];
                                $codes = $rew['Code'];
                                $ssqlres="select TOP(1)* from BioResults where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL"; 
                                $queryres=sqlsrv_query($conn_hq,$ssqlres);
                                $countres=sqlsrv_has_rows($queryres);
                            if ($countres > 0) {

                                $rows13=sqlsrv_fetch_array($queryres);
                                if ($rows13['result'] < $malelow) {
                                    $flag = 'L';
                                }else if($rows13['result']>$malehigh ){
                                    $flag = 'H';
                                } else if ($rows13['result'] >= $malelow && $rows13['result'] <= $malehigh) {
                                $flag='';
                                
                                }
                            }

   
                        
                    }
                       
                }else{
                      $sql="select TOP(1)* from BioTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                        $query=sqlsrv_query($conn_hq,$sql);
                        $count=sqlsrv_has_rows($query);
                       
                        if($count > 0){
                                $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                    $malelow = $rew['FemaleLow'];
                                    $malehigh = $rew['FemaleHigh'];
                                    $codes = $rew['Code'];
                                    $ssqlres="select TOP(1)* from BioResults where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL"; 
                                    $queryres=sqlsrv_query($conn_hq,$ssqlres);
                                    $countres=sqlsrv_has_rows($queryres);
                                if ($countres > 0) {
                                    $rows13=sqlsrv_fetch_array($queryres);
                                    if ($rows13['result'] < $malelow) {
                                        $flag = 'L';
                                    }else if($rows13['result']>$malehigh ){
                                        $flag = 'H';
                                    } else if ($rows13['result'] >= $malelow && $rows13['result'] <= $malehigh) {
                                    $flag = '';
                                    
                                    }
                                }
                            
                        }   
                    }
					}
                    // return $flag;
   $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
    $reu = sqlsrv_query( $conn_hq, $ssql); 
      if(sqlsrv_has_rows($reu)>0){
     $rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
    $nacode=$rows69['TargetValue'];
      }
  $sql3 = "SELECT * FROM BioResults where sampleid = $sampleid and valid = 1 and Code = '".$nacode."' ";
    $result3 = sqlsrv_query($conn_hq, $sql3);
     $has=sqlsrv_has_rows($result3);
    if($has){
    $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
  
    // $runtime=Carbon::parse($row3['RunTime'])->format('Y-m-d H:i:s');
    // $rundate=Carbon::parse($row3['RunDate'])->format('Y-m-d H:i:s');
    $validtime=Carbon::parse($row3['ValidateTime'])->format('Y-m-d H:i:s');
    $validdatetime=Carbon::parse($row3['ValidatedDateTime'])->format('Y-m-d H:i:s');
                        

     $sql = "update results  set 	
    PrintPriorty='',
    resulted=1,
    result = '".$row3['result']."',
    valid = '".$row3['valid']."',
    printed = '".$row3['printed']."',
    RunTime = '".date('Y-m-d H:i:s')."',
    RunDate = '".date('Y-m-d H:i:s')."',
    Operator = '',
    Flags = '".$flag."',
    Units = '".$row3['Units']."',
    SampleType = '".$row3['SampleType']."',
    Analyser = '".$row3['Analyser']."',
    Faxed = '',
    Authorised = '',
    NOPAS = '',
    NormalLow = '".$malelow."',
    NormalHigh = '".$malehigh."',
    NormalUsed = '',
    Healthlink = '',
    `Comment` = '".$row3['Comment']."',
    MedRenal ='',
    ValidateTime ='$validtime',
    ValidatedDateTime = ''

    where Code = '".$testcode."' and sampleid = $sampleid ";
    DB::update($sql);


    }



}
 
   
}




if($dcode[0]=="Coag" && $type[0]=='Internal'){


    $tests=DB::table('ocmrequesttestsdetails')->where('sampleID',$sampleid)->get();



foreach($tests as $test) {



   $patient =  $test->patient;
   $testid = $test->test;

     $code=DB::table('testdefinitions')->where('id',$testid)->select('shortname')->get(); 

    $testcode =  $code[0]->shortname;
    $demo = "Select TOP(1)* from demographics where SampleID='$sampleid'";
    $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
    $age='';
                    $sex = '';
$reu = sqlsrv_query( $conn_hq, $ssql); 

$rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
$tar=$rows69['TargetValue'];

  $demo2 = sqlsrv_query( $conn_hq, $demo);
                    if (sqlsrv_has_rows($demo2) > 0) {
                        $rows69 = sqlsrv_fetch_array($demo2, SQLSRV_FETCH_ASSOC);
                        $age = $rows69['Age'];
                        $sex = $rows69['Sex'];


                        if (str_contains($age, 'Y')) {
                            $age = str_replace("Y", " ", $age);
                        }
                        $age = (int) $age;

                        $newage = $age * 365;

                        $malehigh = '';
                        $malelow = '';
                        $codes = '';
                        $flag = '';
                        if ($sex == 'M') {

                            $sql = "select TOP(1)* from CoagTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                            $query = sqlsrv_query($conn_hq, $sql);
                            $count = sqlsrv_has_rows($query);

                            if ($count > 0) {
                                $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                $malelow = $rew['MaleLow'];
                                $malehigh = $rew['MaleHigh'];
                                $codes = $rew['Code'];
                                $ssqlres = "select TOP(1)* from CoagResults where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL";
                                $queryres = sqlsrv_query($conn_hq, $ssqlres);
                                $countres = sqlsrv_has_rows($queryres);
                                if ($countres > 0) {

                                    $rows13 = sqlsrv_fetch_array($queryres);
                                    if ($rows13['Result'] < $malelow) {
                                        $flag = 'L';
                                    } else if ($rows13['Result'] > $malehigh) {
                                        $flag = 'H';
                                    } else if ($rows13['Result'] >= $malelow && $rows13['Result'] <= $malehigh) {
                                        $flag = '';

                                    }
                                }



                            }

                        } else {
                            $sql = "select TOP(1)* from CoagTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                            $query = sqlsrv_query($conn_hq, $sql);
                            $count = sqlsrv_has_rows($query);

                            if ($count > 0) {
                                $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                $malelow = $rew['FemaleLow'];
                                $malehigh = $rew['FemaleHigh'];
                                $codes = $rew['Code'];
                                $ssqlres = "select TOP(1)* from CoagResults where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL";
                                $queryres = sqlsrv_query($conn_hq, $ssqlres);
                                $countres = sqlsrv_has_rows($queryres);
                                if ($countres > 0) {
                                    $rows13 = sqlsrv_fetch_array($queryres);
                                    if ($rows13['Result'] < $malelow) {
                                        $flag = 'L';
                                    } else if ($rows13['Result'] > $malehigh) {
                                        $flag = 'H';
                                    } else if ($rows13['Result'] >= $malelow && $rows13['Result'] <= $malehigh) {
                                        $flag = '';

                                    }
                                }

                            }
                        }
                    }

     $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
    $reu = sqlsrv_query( $conn_hq, $ssql); 
      
     $rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
    $nacode=$rows69['TargetValue'];

    $sql3 = "SELECT * FROM CoagResults where sampleid = $sampleid and valid = 1 and Code = '".$nacode."' ";
    $result3 = sqlsrv_query($conn_hq, $sql3);
    $row4 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                    if (sqlsrv_has_rows($result3) > 0) {
                        $runtime = Carbon::parse($row4['RunTime'])->format('Y-m-d H:i:s');
                        $rundate = Carbon::parse($row4['RunDate'])->format('Y-m-d H:i:s');
                        $validtime = Carbon::parse($row4['ValidateTime'])->format('Y-m-d H:i:s');
                        // $validdatetime=Carbon::parse($row4['ValidatedDateTime'])->format('Y-m-d H:i:s');

                        $sql = "update results  set 	
    resulted=1,
     RunDate = '$rundate',
     SampleID = '" . $row4['SampleID'] . "',
     RunTime = '$runtime',
     result = '" . $row4['Result'] . "',
     Printed = '" . $row4['Printed'] . "',
     Valid = '" . $row4['Valid'] . "',
     Units = '" . $row4['Units'] . "',
     NOPAS = '" . $row4['NOPAS'] . "',
     Authorised = '" . $row4['Authorised'] . "',
    Faxed = '" . $row4['FAXed'] . "',
    Analyser = '" . $row4['Analyser'] . "',
    NormalLow = '" . $malelow . "',
    NormalHigh = '" . $malehigh."',
    NormalUsed = '" . $row4['NormalUsed'] . "',
    Healthlink = '" . $row4['Healthlink'] . "',
    ValidateTime = '$validtime',
    SignOff = '" . $row4['SignOff'] . "',
    SignOffBy = '" . $row4['SignOffBy'] . "',
    SignOffDateTime = '" . $row4['SignOffDateTime'] . "',
    MedRenal = '" . $row4['MedRenal'] . "'   ,
    Flags='".$flag."'  
    where Code = '" . $testcode . "' and sampleid = $sampleid ";
                        DB::update($sql);



                    }
}
 
   
}
if($dcode[0]=="Haem" && $type[0]=='Internal'){


    $tests=DB::table('ocmrequesttestsdetails')->where('sampleID',$sampleid)->get();



foreach($tests as $test) {



   $patient =  $test->patient;
   $testid = $test->test;

     $code=DB::table('testdefinitions')->where('id',$testid)->select('shortname')->get(); 

    $testcode =  $code[0]->shortname;
    $demo = "Select TOP(1)* from demographics where SampleID='$sampleid'";
    $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
$reu = sqlsrv_query( $conn_hq, $ssql); 

$rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
$tar=$rows69['TargetValue'];
                    $age = '';
                    $sex = '';
  $demo2 = sqlsrv_query( $conn_hq, $demo);
                    if (sqlsrv_has_rows($demo2) > 0) {
                        $rows69 = sqlsrv_fetch_array($demo2, SQLSRV_FETCH_ASSOC);
                        $age = $rows69['Age'];
                        $sex = $rows69['Sex'];


                        if (str_contains($age, 'Y')) {
                            $age = str_replace("Y", " ", $age);
                        }
                        $age = (int) $age;

                        $newage = $age * 365;

                        $malehigh = '';
                        $malelow = '';
                        $codes = '';
                        $flag = '';
                        if ($sex == 'M') {

                            $sql = "select TOP(1)* from HaemTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                            $query = sqlsrv_query($conn_hq, $sql);
                            $count = sqlsrv_has_rows($query);

                            if ($count > 0) {
                                $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                $malelow = $rew['MaleLow'];
                                $malehigh = $rew['MaleHigh'];
                                $codes = $rew['Code'];
                                $ssqlres = "select TOP(1)* from HaemResults50 where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL";
                                $queryres = sqlsrv_query($conn_hq, $ssqlres);
                                $countres = sqlsrv_has_rows($queryres);
                                if ($countres > 0) {

                                    $rows13 = sqlsrv_fetch_array($queryres);
                                    if ($rows13['Result'] < $malelow) {
                                        $flag = 'L';
                                    } else if ($rows13['Result'] > $malehigh) {
                                        $flag = 'H';
                                    } else if ($rows13['Result'] >= $malelow && $rows13['Result'] <= $malehigh) {
                                        $flag = '';

                                    }
                                }



                            }

                        } else {
                            $sql = "select TOP(1)* from HaemTestDefinitions where code='$tar' and '$newage' >= AgeFromDays AND '$newage' <= AgeToDays order by AgeToDays";
                            $query = sqlsrv_query($conn_hq, $sql);
                            $count = sqlsrv_has_rows($query);

                            if ($count > 0) {
                                $rew = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                $malelow = $rew['FemaleLow'];
                                $malehigh = $rew['FemaleHigh'];
                                $codes = $rew['Code'];
                                $ssqlres = "select TOP(1)* from HaemResults50 where SampleID='$sampleid' AND Code='$codes' AND result IS NOT NULL";
                                $queryres = sqlsrv_query($conn_hq, $ssqlres);
                                $countres = sqlsrv_has_rows($queryres);
                                if ($countres > 0) {
                                    $rows13 = sqlsrv_fetch_array($queryres);
                                    if ($rows13['Result'] < $malelow) {
                                        $flag = 'L';
                                    } else if ($rows13['Result'] > $malehigh) {
                                        $flag = 'H';
                                    } else if ($rows13['Result'] >= $malelow && $rows13['Result'] <= $malehigh) {
                                        $flag = '';

                                    }
                                }

                            }
                        }
                    }

     $ssql=" SELECT TargetValue FROM ocmMapping WHERE SourceValue='$testcode'";
    $reu = sqlsrv_query( $conn_hq, $ssql); 
      
     $rows69 = sqlsrv_fetch_array($reu, SQLSRV_FETCH_ASSOC);
    $nacode=$rows69['TargetValue'];

    $sql3 = "SELECT * FROM HaemResults50 where sampleid = $sampleid and valid = 1 and Code = '".$nacode."' ";
    $result3 = sqlsrv_query($conn_hq, $sql3);
    $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
    // $runtime=Carbon::parse($row3['RunTime'])->format('Y-m-d H:i:s');
         // $rundate=Carbon::parse($row3['RunDate'])->format('Y-m-d H:i:s');
                    if (sqlsrv_has_rows($result3) > 0) {
                        $validtime = Carbon::parse($row3['ValidateTime'])->format('Y-m-d H:i:s');
                        // $validdatetime=Carbon::parse($row3['ValidatedDateTime'])->format('Y-m-d H:i:s');
                    
       
 
 
 
         $sql = "update results  set 	
         PrintPriorty='',
         resulted=1,
         result = '".$row3['Result']."',
         valid = '".$row3['Valid']."',
         printed = '".$row3['Printed']."',
         RunTime = '".date('Y-m-d H:i:s')."',
         RunDate = '".date('Y-m-d H:i:s')."',
         Operator = '',
         Flags = '".$flag."',
         Units = '".$row3['Units']."',
         SampleType = '".$row3['SampleType']."',
         Analyser = '".$row3['Analyser']."',
         Faxed = '',
         Authorised = '',
         NOPAS = '',
         NormalLow = '".$malelow."',
         NormalHigh = '".$malehigh."',
         NormalUsed = '',
         Healthlink = '',
         `Comment` = '".$row3['Comment']."',
         MedRenal ='',
         ValidateTime ='$validtime',
         ValidatedDateTime = ''
     
         where Code = '".$testcode."' and sampleid = $sampleid ";
 DB::update($sql);

                }


}
 
   
}






$count=DB::select("select id from results where request='".$requestid."' and resulted=1");

$count2=DB::select("select id from results where request='".$requestid."' ");

if(count($count) == count($count2)) {

    DB::update("update OCMRequest set RequestState = 'Results Ready' where ReqestID = '".$requestid."' ");

}else{
    DB::update("update OCMRequest set RequestState = 'In Progress' where ReqestID = '".$requestid."' ");

}







}


}


function ScanSamples(){
   
    
    if (Auth::attempt(['email'=>'john@hse.ie','password'=>'112233'])) {

            return view('layouts.scansamples');

    }
    

}


 function ScanSample(Request $request){
    // return $request;
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

   
    $arr=[];
    if($request->ajax()){

    $sid=$request->sid;
  $sql1="select TOP(1)* from ocmRequestDetails where SampleID = '$sid' AND Programmed=0 and Addon=0";
//return $sql1;       
	   $results0 = sqlsrv_query( $conn_hq, $sql1); 
        // return $results0; 
        $i=0;
        $array=[];
        $array2=[];
        $a=0;
        while ($rows1 = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC)){
            $array[$i] = $rows1;
            $i++;
            // $array[$i] = $rows1['SampleID'];

         
            
            
        } 

		// return $array;
         $requestid= $array[0]['RequestID'];

        $sql2 = "Select * from ocmRequest  WHERE RequestID ='$requestid'";
        $results2 = sqlsrv_query( $conn_hq, $sql2);
        while ($rows2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)){
            $array2[$a] = $rows2;
            $a++;
            // $array[$i] = $rows1['SampleID'];
            
            

        }  
        // return $array2;

        $data =  ['array'=>$array, 'array2'=>$array2];

   return view('ab', compact('data'))->render();  

    return response()->json(array('success' => true, 'html'=>$data));
    }

   
    // return view('scan');
}

public function scan($sid=null){
    // $sid;
    $sid= substr($sid,0,-1);
$sid=explode(",",$sid);

    return view('scans')->with('data',$sid);
}
public function Sc(Request $request){
    return $request;
    // return view('scans');
}
public function sidsend2($id){
    // return 1;
    $sid = $id;


    // return $sid;
    $rows="";
    $rows2="";
    $count2=0;
    $count1=0;

    $haem = 0;


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

    $sql = "SELECT Code from BioRequests where SampleID = '$sid'";
    $results = sqlsrv_query( $conn_hq, $sql);
    
    $count3 = sqlsrv_has_rows($results);

    if($count3>0){
        while ($rows1 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)){
            $array[$m] = $rows1;
            $m++;
        }
    } 


// HAEMRESULTS

    $sqlhaem = "Select * from HaemResults50 where SampleID = '$sid'";
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
$sqlcoag = "SELECT CoagRequests.Code, CoagResults.Result, CoagResults.Units, CoagResults.Analyser, CoagResults.NormalLow, CoagResults.NormalHigh
    FROM CoagRequests
    LEFT JOIN CoagResults ON CoagRequests.Code = CoagResults.Code where CoagRequests.SampleID = '$sid'
    GROUP BY CoagRequests.Code, CoagResults.Result, CoagResults.Units, CoagResults.Analyser, CoagResults.NormalLow, CoagResults.NormalHigh";
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
return response()->json(['error'=>'No Sample ID Found']);
}


    
$rows3='';
$rows5 = '';


    return view ('Results', ['rows'=>$rows,'array'=>$array, 'rows3'=> $rows3, 'haemarray'=>$haemarray, 'extarray'=>$extarray,'coagarray'=>$coagarray,  'rows5'=>$rows5]);    
}




public static function test($sampleid=''){
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


         $testc="Select ProfileID from ocmRequestDetails where SampleID='$sampleid'";
$r=sqlsrv_query( $conn_hq, $testc);
$testcode=[];
$a=0;
while ($trows = sqlsrv_fetch_array($r, SQLSRV_FETCH_ASSOC)){
$testcode[$a]=$trows['ProfileID'];
$a++;

}
$test=array_unique($testcode);
return $tes=implode(',', $test);
}





public function biochemistry($tab=NULL, $id=NULL) {
        $check = 0;
        // return $tab.$id;
        if($id!=""){
            return $this->sidsend2($id);
        }
        
        $rows3='';
        $rows='';
        $array='';
        $haemarray='';
        $extarray = '';
        $coagarray = '';
        $rows5 = '';
  

        return view ('Results',['array'=>$array, 'rows'=>$rows, 'rows3'=> $rows3, 'haemarray'=>$haemarray , 'extarray'=>$extarray,  'rows5'=>$rows5,'coagarray'=>$coagarray]);
}


    public function addmodal(Request $request) {
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


            $units = $request->units;
            $res = $request->resval;

            $Code = $request->code;
            $Heamcode = $request->heamcode;
            $Extcode = $request->extcode;
            $Coagcode = $request->coagcode;

            $comment = $request->comment;
            



            $getage1 = $request->age;
            $getsex = $request->sex;
            $getage = trim($getage1,"Yr");
            $biosend = '';
            $data="";
            $NormalLow = '';
            $NormalHigh = '';

            // BIORESULTS
            if($Code!= NULL && $Heamcode==NULL && $Extcode == NULL && $Coagcode == NULL) {

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
               
            }


                $sql2 = "SELECT top 1 * from bioresults where Code = '$Code'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
                $count = sqlsrv_has_rows($results);
                
                if ($count > 0) {
                    
                    
                    $sql5="update bioresults set Units='$units',Result='$res',NormalLow='$NormalLow',NormalHigh='$NormalHigh' where Code = '$Code'";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);

                    if($comment != NULL) {

                        $commupdate = "update bioresults set Comment = '$comment' where Code = '$Code'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultcom = sqlsrv_query($conn_hq, $commupdate, $params, $options);
                    }

                    
                }
                else{
                    
                    
                    $sql7 = "insert into bioresults(Code,Result,Units,NormalLow,NormalHigh) values('$Code','$res','$units','$NormalLow','$NormalHigh')";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resul = sqlsrv_query($conn_hq, $sql7, $params, $options);


                    if($comment != NULL) {

                        $commupdate = "insert into bioresults(Comment) values('$comment')";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultcom = sqlsrv_query($conn_hq, $commupdate, $params, $options);
                    }


                }
                
                
            }
        

// HEAMRESULTS
             else if($Heamcode!= NULL && $Code==NULL && $Extcode == NULL && $Coagcode == NULL) {

             


                $sql4 = "select top 1 * from HaemResults50 where Code = '$Heamcode'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $results1 = sqlsrv_query($conn_hq, $sql4, $params, $options);
                $count1 = sqlsrv_has_rows($results1);

                if ($count1 > 0) { 
                    $sql5="update HaemResults50 set Units='$units',Result='$res' where Code = '$Heamcode'";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
					
					  if($comment != NULL) {

                        $commupdate = "update HaemResults50 set Comment = '$comment' where Code = '$Heamcode'";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultcom = sqlsrv_query($conn_hq, $commupdate, $params, $options);
                    }
                }

                else{
                    $sql6 = "insert into HaemResults50(Code,Result,Units) values('$Heamcode','$res','$units')";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resu = sqlsrv_query($conn_hq, $sql6, $params, $options);
					
					 if($comment != NULL) {

                        $commupdate = "insert into HaemResults50(Comment) values('$comment')";
                        $params = array();
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultcom = sqlsrv_query($conn_hq, $commupdate, $params, $options);
                    }
                }



// EXTRESULTS
            } else if($Extcode!= NULL && $Code==NULL && $Heamcode == NULL && $Coagcode == NULL){

              
                 $res1 = $request->resval1;
                  $units1 = $request->units1;

                $sql7 = "select top 1 * from ExtResults where Analyte = '$Extcode'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $results2 = sqlsrv_query($conn_hq, $sql7, $params, $options);
                $count2 = sqlsrv_has_rows($results2);

                if ($count2 > 0) {
                   
                    $sql8="update ExtResults set units='$units1',result='$res1' where Analyte = '$Extcode'";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results2 = sqlsrv_query($conn_hq, $sql8, $params, $options);
                }
                else{
                    
                    $sql9 = "insert into ExtResults(Analyte,result,units) values('$Extcode','$res1','$units1')";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resu = sqlsrv_query($conn_hq, $sql9, $params, $options);
                }
            }


// COAGRESULTS
            else if($Coagcode!= NULL && $Code==NULL && $Extcode == NULL && $Heamcode == NULL) {
                
                
                $sql10 = "SELECT * FROM CoagTestDefinitions where  AgeToDays >= '$getage' and Code = '$Coagcode' ";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET ); 
                $results10 = sqlsrv_query($conn_hq, $sql10,$params,$options);

                $count10 = sqlsrv_has_rows($results10);

                if($count10>0){

                $rows10 = sqlsrv_fetch_array($results10, SQLSRV_FETCH_ASSOC);

                    if($getsex == 'F') {
                        
                        $NormalLow = round($rows10['FemaleLow'],1);
                        $NormalHigh = round($rows10['FemaleHigh'],1);
                   }
                   else {
                    
                    $NormalLow = round($rows10['MaleLow'],1);
                    $NormalHigh = round($rows10['MaleHigh'],1);
                }
            }
                // return $NormalLow;
                
                
                
                $sql5 = "select top 1 * from CoagResults where Code = '$Coagcode'";
                $params = array();
                $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $resultscoag = sqlsrv_query($conn_hq, $sql5, $params, $options);
                $countcoag = sqlsrv_has_rows($resultscoag);

                if ($countcoag > 0) {
           
                    $sql5="update CoagResults set Units='$units',Result='$res',NormalLow='$NormalLow',NormalHigh='$NormalHigh' where Code = '$Coagcode'";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $results2 = sqlsrv_query($conn_hq, $sql5, $params, $options);
                }
                else{
                    
                    $sql7 = "insert into CoagResults(Code,Result,Units,NormalLow,NormalHigh) values('$Coagcode','$res','$units','$NormalLow','$NormalHigh')";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resul = sqlsrv_query($conn_hq, $sql7, $params, $options);


                }

            }

        
        return response()->json(['success'=>true]);

//return view ('biochemistry',['array'=>$array, 'rows'=>$rows, 'rows3'=> $rows3, 'haemarray'=>$haemarray, 'extarray'=>$extarray,  'rows5'=>$rows5,'coagarray'=>$coagarray]);

}





   public function getid(Request $request) {
   $rows3 = '';
   $rows5 = '';
    if($request->ajax()){
        $code2=$request->code;
        $codehaem = $request->codehaem;
        $codecoag = $request->codecoag;
        $codeext = $request->codeext;

        $getage = $request->age;
        $getsex = $request->sex;
        
        $department= $request->department;         
        
        
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }



        if($code2!= NULL && $codehaem==NULL && $codeext == NULL && $codecoag==NULL) {

        
        $sql2 = "select Result, Units, Comment from bioresults where Code = '$code2'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results = sqlsrv_query($conn_hq, $sql2, $params, $options);
        $count = sqlsrv_has_rows($results);
       $rows3 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);

        }

        elseif($codehaem != NULL && $code2==NULL && $codeext == NULL && $codecoag==NULL){

            $sql3 = "select Result, Units, Comment from HaemResults50 where Code = '$codehaem'";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results1 = sqlsrv_query($conn_hq, $sql3, $params, $options);
            $count1 = sqlsrv_has_rows($results1);
            $rows3 = sqlsrv_fetch_array($results1, SQLSRV_FETCH_ASSOC);
        }

        elseif($codeext != NULL && $code2==NULL && $codehaem == NULL && $codecoag==NULL){

            $sqlext1 = "select result, units from ExtResults where Analyte = '$codeext'";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results2 = sqlsrv_query($conn_hq, $sqlext1, $params, $options);
            $count2 = sqlsrv_has_rows($results2);
            $rows5 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC);
        }

        elseif($codecoag != NULL && $code2==NULL && $codehaem == NULL && $codeext==NULL){

            $sqlcoag = "select Result, Units from CoagResults where Code = '$codecoag'";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $resultscoag = sqlsrv_query($conn_hq, $sqlcoag, $params, $options);
            $countcoag = sqlsrv_has_rows($resultscoag);
            $rows3 = sqlsrv_fetch_array($resultscoag, SQLSRV_FETCH_ASSOC);
        }
      
    }
    $array='';
    $rows='';
    $extarray = '';
    $haemarray = '';
    $coagarray = '';

   
    return view ('Results',['array'=>$array, 'rows'=>$rows, 'rows3'=> $rows3, 'haemarray'=>$haemarray, 'extarray'=>$extarray,  'rows5'=>$rows5,'coagarray'=>$coagarray]);   

   }



    public function ocmnet(){
        return view('ocmOrNet');
    }

}
