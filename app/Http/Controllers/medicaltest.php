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
use App;
use Auth;

class medicaltest extends Controller
{


   public function index(Request $request)
    {

        
 

         if ($request->ajax()) {
   
            $data = DB::table('TestDefinitions') 
                         ->select('TestDefinitions.id',
                            'TestDefinitions.longname',
                             DB::raw('CONCAT(TestDefinitions.units, "ml") AS units'),
                            'C.name as adultsContainer',
                            'D.name as childrenContainer',
                            'TestDefinitions.shortname',
                            'TestDefinitions.InUse',
                            'TestDefinitions.created_at', 
                            'TestDefinitions.updated_at',
                             'TestDefinitions.sampleage',
                             'TestDefinitions.volumnerequired',
                             'TestDefinitions.AgeFromDays',
                             'TestDefinitions.AgeToDays',
                                'TestDefinitions.nacode',
                            
                            'Lists.Text as SampleType',
                            'facilities.name as Hospital',
                            'A.name as created_by',
                            'B.name as updated_by')
                                ->leftjoin('containers as C', 'C.id', '=', 'TestDefinitions.adultsContainer')
                                ->leftjoin('containers as D', 'D.id', '=', 'TestDefinitions.childrenContainer')
                                ->leftjoin('Lists', 'Lists.id', '=', 'TestDefinitions.SampleType')
                                ->leftjoin('facilities', 'facilities.id', '=', 'TestDefinitions.Hospital')
                                ->leftjoin('users AS A', 'A.id', '=', 'TestDefinitions.created_by')
                                ->leftjoin('users AS B', 'B.id', '=', 'TestDefinitions.updated_by');


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <button id="'.$row->id.'" title="Edit" class="btn btn-primary update">
                                 <i class="bx bx-edit"></i>
                                </button>
                                <button type="button" title="Delete" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
                    ->editColumn('InUse', function($data){ 

                        if($data->InUse == 1) {
                            return '<button type="button" class="btn btn-success">Yes
                                </button>';
                        } else {
                            return '<button type="button" class="btn btn-danger">No
                                </button>';
                        }
                    })
                    ->editColumn('created_at', function($data){ $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y H:i a'); return $created_at; })
                    
                    ->editColumn('updated_at', function($data){ 
                        if($data->updated_at != '') {

                            $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d M Y H:i a'); return $updated_at;
                            
                        }
                     })

                    ->setRowId('id')
                    ->rawColumns(['action','InUse'])
                    ->make(true);

                    
                  
        }

  $sampleTypes = DB::table('Lists')->select('id','Text','Default')->where('ListType','STP')->where('InUse',1)->orderBy('ListOrder')->get();
  $facilities = DB::table('facilities')->select('id','name')->where('status',1)->orderBy('name')->get();
  $containers = DB::table('containers')->select('id','name')->where('status',1)->orderBy('name')->get();

          $data = [
            'sampleTypes' => $sampleTypes,
            'containers' => $containers,
            'facilities' => $facilities
          ];  
            
          return view ('medicaltests')->with('data',$data);
        
    }


     public function Test(Request $request)
    {



        if($request->id != '') {

          $data = DB::table('TestDefinitions')->where('id', $request->id)->get();
          return \Response::json($data);  
        } 
             

          
    } 



    public function syncCodes(Request $request)
    {



          $data = DB::table('TestDefinitions')->select('nacode','shortname')->where('nacode', '!=', null)->where('nacode', '!=', '')->get();



           $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

                              foreach ($data as $value) {
                                
  

                                 $tsql = "SELECT * FROM ocmMapping where SourceValue = '$value->shortname' ";
                                 $getlist = sqlsrv_query($conn_hq, $tsql);
                                  $row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);

                                       if(empty($row) == 1) {



                                            $sql1119 = "insert into ocmMapping (MappingType, TargetHospital,SourceValue, TargetValue) values ('TestCode', 'Cavan', '$value->shortname', '$value->nacode')";
                                        sqlsrv_query($conn_hq, $sql1119);
                               
                                            


                                       } else {

                                         $sql1119 = "update ocmMapping set TargetValue = '$value->nacode' where SourceValue = '".$row['SourceValue']."'";
                                        sqlsrv_query($conn_hq, $sql1119);
                           


                                       }




                              }

                              return 1;
             
                                                
          
    }  
 


    public function delete(Request $request)
    {
     $id = $request->input('id');   
// return $id;
     $log = DB::table('TestDefinitions')->select('longname')->where('id',$id)->get();
     $controller = App::make('\App\Http\Controllers\activitylogs');
     $data = $controller->callAction('addLogs', [0,0,0,0,0,'Test', 'Test "'.$log[0]->longname.'" Deleted. ']); 

     DB::table('TestDefinitions')->where('id', $id)->delete(); 
     DB::table('profiletestmapping')->where('TestDefinitionID', $id)->delete(); 
     
     DB::table('reflextestmapping')->where('TestDefinitionID1', $id)->orWhere('TestDefinitionID2',$id)->delete(); 
    }



     public function add(Request $request)
    {

        // return $request;
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
    }   

    $id=$request->id;
    if($id ==''){
       $id = DB::table('TestDefinitions')->max('id')+1;  
    }
       
        $name = $request->input('name');
        $code = $request->input('code');
        $nacode = $request->input('nacode');
        $type = $request->input('type');
        $units = $request->input('units');
        $facility = $request->input('facility');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $sampleage = $request->input('sampleage');
        $status = $request->input('status');
        $decimal = $request->input('decimal');
        $analyser = $request->input('analyser');


        $plausiblehigh = $request->input('plausiblehigh');
        $plausiblelow = $request->input('plausiblelow');
        $flagmalehigh = $request->input('flagmalehigh');
        $flagmalelow = $request->input('flagmalelow');
        $flagfemalehigh = $request->input('flagfemalehigh');
        $flagfemalelow = $request->input('flagfemalelow');
        $femalehigh = $request->input('femalehigh');
        $femalelow = $request->input('femalelow');
        $malehigh = $request->input('malehigh');
        $malelow = $request->input('malelow');
        $department = $request->input('department');
        $dodelta = $request->input('dodelta');
        $id = $request->input('id');
        $medrenal = $request->input('medrenal');
        $vr = $request->input('volumnerequired');
        $activefrom = $request->input('activefrom');
        $activeto = $request->input('activeto');
         $health = $request->input('sendforhealth');
        $printable = $request->input('printable');
        $agefrom = $request->input('agefromdays');
        $printp = $request->input('printpriority');
        $prints = $request->input('printsplit');
        
        $ageto = $request->input('aget');

        $printtable=0;
        $KnownToAnalyser=0;

        if($dodelta ==''){
            $dodelta=0;
        }
        $uid=uniqid();


         $user = auth()->user();
        
        $validator = Validator::make($request->all(), [
            'nacode' => 'required',
            'code' => 'required|unique:testdefinitions,shortname',       
            'name' => 'required|unique:testdefinitions,longname',  
            'type' => 'required',
            'facility' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'status' => 'required',
            'department'=>'required'

        ]);
     

             if ($validator->passes()) {


                if($sampleage == '') {

                    $sampleage = 0;
                }

        //   $data = DB::table('TestDefinitions')->where('shortname',$code)->get();

        //     if(count($data) > 0){

        //     $mydata=DB::table('TestDefinitions')->where('id',$id)->get();
        //     $id2=$mydata[0]->id;
        //     $longname2=$mydata[0]->longname;
        //     $shortname2=$mydata[0]->shortname;
        //     $nacode2=$mydata[0]->nacode;
        //     $type2=$mydata[0]->SampleType;
        //     $units2=$mydata[0]->units;
        //     $adultsContainer2=$mydata[0]->adultsContainer;
        //     $childrenContainer2=$mydata[0]->childrenContainer;
        //     $sampleage2=$mydata[0]->sampleage;
        //     $Hospital2=$mydata[0]->Hospital;
        //     $InUse2=$mydata[0]->InUse;
        //     $created_at2=$mydata[0]->created_at;
        //     $created_by2=$mydata[0]->created_by;
        //     $MaleLow2=$mydata[0]->MaleLow;
        //     $MaleHigh2=$mydata[0]->MaleHigh;
        //     $FemaleLow2=$mydata[0]->FemaleLow;
        //     $FemaleHigh2=$mydata[0]->FemaleHigh;
        //     $FlagMaleLow2=$mydata[0]->FlagMaleLow;
        //     $FlagMaleHigh2=$mydata[0]->FlagMaleHigh;
        //     $FlagFemaleLow2=$mydata[0]->FlagFemaleLow;
        //     $FlagFemaleHigh2=$mydata[0]->FlagFemaleHigh;
        //     $PlausibleLow2=$mydata[0]->PlausibleLow;
        //     $PlausibleHigh2=$mydata[0]->PlausibleHigh;
        //     $dodelta2=$mydata[0]->dodelta;
        //     $modified_at=Carbon::now();
        //     $modified_by=Auth::user()->id;
        //     $updated_at2=$mydata[0]->updated_at;
        //     $updated_by2=$mydata[0]->updated_by;
          

        //     DB::insert('insert into testdefinitionsarc (id, longname, shortname, nacode, SampleType, units,  adultsContainer, childrenContainer, sampleage,  Hospital, InUse, created_at, created_by,MaleLow,MaleHigh,FemaleLow,FemaleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow, FlagFemaleHigh,PlausibleLow,PlausibleHigh,dodelta,modified_at,modified_by,updated_at,updated_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
        //     [$id2, $longname2, $shortname2, $nacode2, $type2, $units2, $adultsContainer2, $childrenContainer2, $sampleage2, $Hospital2, $InUse2, $created_at2, $created_by2,$MaleLow2,$MaleHigh2,$FemaleLow2,$FemaleHigh2,$FlagMaleLow2,$FlagMaleHigh2,$FlagFemaleLow2,$FlagFemaleHigh2,$PlausibleLow2,$PlausibleHigh2,$dodelta2,$modified_at,$modified_by,$updated_at2,$updated_by2] ); 

        //     DB::update("
        //     update TestDefinitions 
        //     set 
        //    medrenal='$medrenal', longname = '$name', shortname = '$code', nacode = '$nacode', SampleType = '$type', units= '$units', adultsContainer = '$adults', childrenContainer = '$children', sampleage = '$sampleage', Hospital = '$facility', InUse = $status,  updated_at = '".date('Y-m-d H:i:s')."',MaleLow = '$malelow', MaleHigh='$malehigh', FemaleLow='$femalelow', FemaleHigh='$femalehigh' , FlagMaleLow = '$flagmalelow', FlagMaleHigh='$flagmalehigh' , FlagFemaleLow='$flagfemalelow' , FlagFemaleHigh='$flagfemalehigh',PlausibleLow='$plausiblelow' , PlausibleHigh='$plausiblehigh',dodelta='$dodelta',
        //     updated_by = '".$user['id']."'  where id =  $id 
        //     ");

           
            

        //     }else{
              
        
              
        DB::insert('insert into TestDefinitions (id,department, longname, shortname, nacode, SampleType, units,  adultsContainer, childrenContainer, sampleage,  Hospital, InUse, created_at, created_by,MaleLow,MaleHigh,FemaleLow,FemaleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow, FlagFemaleHigh,PlausibleLow,PlausibleHigh,dodelta,medrenal,ActiveFromDate,ActiveToDate,HealthLink,Printable,AgeFromDays,AgeToDays,units2,dp,PrintPriority,	PrintSplit,Analyser) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
            [$id,$department, $name, $code, $nacode, $type, $vr, $adults, $children, $sampleage, $facility, $status, date('Y-m-d H:i:s'), $user['id'] ,$malelow,$malehigh,$femalelow,  $femalehigh,$flagmalelow,$flagmalehigh,$flagfemalelow,$flagfemalehigh,$plausiblelow,$plausiblehigh,$dodelta,$medrenal,$activefrom,$activeto,$health,$printable,$agefrom,$ageto,$units,$decimal,$printp,$prints,$analyser] ); 
            // }






         $controller = App::make('\App\Http\Controllers\activitylogs');
         $data = $controller->callAction('addLogs', [0,0,0,0,0,'Test', 'New Test "'.$name.'" Added. ']); 


         $sql="Select TargetValue From ocmMapping where SourceValue='$code'";
         $query=sqlsrv_query($conn_hq,$sql);
         $count=sqlsrv_has_rows($query);
         if($count > 0){
          $rows=sqlsrv_fetch_array($query);
          $targetvalue = $rows['TargetValue'];

         if($department=='External'){
         $sql2="Select * from ".$department."Definitions where AnalyteName='$targetvalue'";
         }else{
          
        $sql2="Select * from ".$department."TestDefinitions where Code='$targetvalue'";
        
        }

        // return $sql2;
        $query2=sqlsrv_query($conn_hq,$sql2);
        $count2=sqlsrv_has_rows($query2);


  if($count2 > 0){


  if($department =='Bio'){


   $sql3="UPDATE ".$department."TestDefinitions set Code = '$targetvalue',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow',PlausibleHigh='$plausiblehigh',FlagMaleLow='$flagmalelow',FlagMaleHigh='$flagmalehigh',FlagFemaleLow='$flagfemalelow',FlagFemaleHigh='$flagfemalehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',Printable='$printtable',KnownToAnalyser='$KnownToAnalyser',dodelta='$dodelta' where Code = '$targetvalue'";
                    sqlsrv_query($conn_hq,$sql3);
  }else if($department =='Coag'){

    $sql3="UPDATE ".$department."TestDefinitions set Code = '$targetvalue',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow',PlausibleHigh='$plausiblehigh',FlagMaleLow='$flagmalelow',FlagMaleHigh='$flagmalehigh',FlagFemaleLow='$flagfemalelow',FlagFemaleHigh='$flagfemalehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',Printable='$printtable',dodelta='$dodelta' where Code = '$targetvalue'";
                    sqlsrv_query($conn_hq,$sql3);
  }else if($department =='Haem'){
            $DoRM=0;
         $sql3="UPDATE ".$department."TestDefinitions set Code = '$targetvalue',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow',PlausibleHigh='$plausiblehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',dodelta='$dodelta',AnalyteName='$targetvalue' where Code = '$targetvalue'";
                    sqlsrv_query($conn_hq,$sql3);

            } else if($department =='External'){
            $DoRM=0;
       
                $sql3="UPDATE ".$department."Definitions set SampleType='$type',units='$units',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',AnalyteName='$targetvalue' where AnalyteName = '$targetvalue'";
                    sqlsrv_query($conn_hq,$sql3);

            }
          
            else if($department =='Micro'){       
                $sql3="UPDATE ".$department."Definitions set SampleType='$type',units='$units',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',AnalyteName='$targetvalue' where AnalyteName = '$targetvalue'";
                    sqlsrv_query($conn_hq,$sql3);

            }
          

        return response()->json(['success'=>'Data Updated.']);
        
         }else{

            if($department =='Bio'){
            

         $sql3="Insert into  ".$department."TestDefinitions(Code,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,KnownToAnalyser,dodelta,uid) values('$targetvalue','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$flagmalelow','$flagmalehigh','$flagfemalelow','$flagfemalehigh','$femalelow','$femalehigh','$malelow','$malehigh','$status','$printtable','$KnownToAnalyser','$dodelta','$uid')"; 
            }else if($department =='Coag'){
                $displayable=0;
                   $sql3="Insert into  ".$department."TestDefinitions(Code,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,dodelta,displayable,uid) values('$targetvalue','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$flagmalelow','$flagmalehigh','$flagfemalelow','$flagfemalehigh','$femalelow','$femalehigh','$malelow','$malehigh','$status','$printtable','$dodelta','$displayable',$uid)"; 
            }else if($department =='Haem'){
            $DoRM=0;
             $sql3="Insert into  ".$department."TestDefinitions(Code,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,dodelta,DoRM,AnalyteName,uid) values('$targetvalue','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$femalelow','$femalehigh','$malelow','$malehigh','$status','$dodelta',$DoRM,'$targetvalue','$uid')"; 
            }
            else if($department =='External'){
            $DoRM=0;
             $sql3="Insert into  ".$department."Definitions(SampleType,units,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,AnalyteName,uid) values('$type','$units','$femalelow','$femalehigh','$malelow','$malehigh','$status','$targetvalue','$uid')"; 
            }
           
            else if($department =='Micro'){
            $DoRM=0;
             $sql3="Insert into  ".$department."Definitions(SampleType,units,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,AnalyteName) values('$type','$units','$femalelow','$femalehigh','$malelow','$malehigh','$status','$targetvalue')"; 
            }
           

           sqlsrv_query($conn_hq,$sql3);
         }


         }
        //   $sync=\App\Http\Controllers\medicaltest::syncing($code,$department);

            return response()->json(['success'=>'Data added.']);

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);

    }
    public function deletetests(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  

        $nacode = $request->input('nacode');
        $ind = $request->input('ind');



        $sql = " 
        With UpdateData  As
        (	
        SELECT *,
        row=ROW_NUMBER()  OVER (ORDER BY [Code])
        FROM BioTestDefinitions where Code='$nacode'
        )
        Delete from UpdateData where row='$ind'";
        $q=sqlsrv_query($conn_hq, $sql);
        if($q){
            return response()->json(['success'=>'Data Deleted .']);
            
                          }
                          else{
                            return response()->json(['success'=>'Data could not be deleted.']);

                          }

    }

public function updatetests(Request $request){
        // return $request;

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
        // return $request;

        $id = $request->input('id');   
        $name = $request->input('name');
        $code = $request->input('code');
        $nacode = $request->input('nacode');
        $type = $request->input('type');
        $units = $request->input('units');
        $facility = $request->input('facility');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $sampleage = $request->input('sampleage');
        $status = $request->input('status');
        $agefdays = $request->input('agefdays');
        $plausiblehigh = $request->input('plausiblehigh');
        $plausiblelow = $request->input('plausiblelow');
        $flagmalehigh = $request->input('flagmalehigh');
        $flagmalelow = $request->input('flagmalelow');
        $flagfemalehigh = $request->input('flagfemalehigh');
        $flagfemalelow = $request->input('flagfemalelow');
        $femalehigh = $request->input('femalehigh');
        $femalelow = $request->input('femalelow');
        $malehigh = $request->input('malehigh');
        $malelow = $request->input('malelow');
        $department = $request->input('department');
        $dodelta = $request->input('dodelta');
        $id = $request->input('id');
        $ind = $request->input('ind');
        $medrenal = $request->input('medrenal');
        $vr = $request->input('volumnerequired');
        $activefrom = $request->input('activefrom');
        $activeto = $request->input('activeto');
         $health = $request->input('sendforhealth');
        $printable = $request->input('printable');
        $agedays = $request->input('agefromdays');
        $aget = $request->input('aget');
        if($department =='Bio'){


        $sql3="
            With UpdateData  As
(	
SELECT *,
row=ROW_NUMBER()  OVER (ORDER BY [Code])
FROM BioTestDefinitions where Code='$nacode'
)
            
            UPDATE  UpdateData set Code = '$nacode',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow', AgeFromDays='$agedays',AgeToDays='$aget',PlausibleHigh='$plausiblehigh',FlagMaleLow='$flagmalelow',FlagMaleHigh='$flagmalehigh',FlagFemaleLow='$flagfemalelow',FlagFemaleHigh='$flagfemalehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',Printable='$printable',dodelta='$dodelta'where Code='$nacode' and row= '$ind'";
                             
            // return $q;
           }else if($department =='Coag'){
           
           
            $sql3="With UpdateData  As
            (	
            SELECT *,
            row=ROW_NUMBER()  OVER (ORDER BY [Code])
            FROM CoagTestDefinitions where Code='$nacode'
            )
            UPDATE UpdateData set Code = '$nacode',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow',PlausibleHigh='$plausiblehigh',FlagMaleLow='$flagmalelow',FlagMaleHigh='$flagmalehigh',FlagFemaleLow='$flagfemalelow',FlagFemaleHigh='$flagfemalehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',Printable='$printable',dodelta='$dodelta' where and Code='$nacode' and row='$ind'";
                          sqlsrv_query($conn_hq,$sql3);
           
                        }else if($department =='Haem'){
                     $DoRM=0;
                  $sql3="
                  With UpdateData  As
            (	
            SELECT *,
            row=ROW_NUMBER()  OVER (ORDER BY [Code])
            FROM HaemTestDefinitions where Code='$nacode'
            )
                  
                  
                  UPDATE UpdateData set Code = '$nacode',SampleType='$type',units='$units',Hospital='CAVAN',PlausibleLow='$plausiblelow',PlausibleHigh='$plausiblehigh',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',dodelta='$dodelta' where  and Code='$nacode' and row='$ind'";
                             sqlsrv_query($conn_hq,$sql3);
         
                     } else if($department =='External'){
                     $DoRM=0;
                
                        //  $sql3="UPDATE ".$department."Definitions set SampleType='$type',units='$units',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',AnalyteName='' where AnalyteName = '' and Code='$nacode'";
                            //  sqlsrv_query($conn_hq,$sql3);
         
                     }
                   
                     else if($department =='Micro'){       
                        //  $sql3="UPDATE ".$department."Definitions set SampleType='$type',units='$units',FemaleLow='$femalelow',FemaleHigh='$femalehigh',MaleLow='$malelow',MaleHigh='$malehigh',InUse='$status',AnalyteName='' where AnalyteName = '' and Code='$nacode'";
                            //  sqlsrv_query($conn_hq,$sql3);
         
                     }
                     $q= sqlsrv_query($conn_hq,$sql3);


        $q2 = "Select * from OcmMapping where SourceValue='$code' ";
        $qu= sqlsrv_query($conn_hq,$q2);
        if(sqlsrv_has_rows($qu)>0){

            $squ="Update ocmMapping set SourceValue='$code',
            TargetValue='$nacode',
            MappingType='TestCode',
            Hospital='Cavan',
where SourceValue='$code'";  
            
        }
        else{
            $squ = "insert into ocmMapping (SourceValue,TargetValue,MappingType,Hospital) values('$code','$nacode','TestCode','Cavan')";

        }
        sqlsrv_query($conn_hq,$squ);

                     if($q){
       return 1;
                     }
                     else{
       return 0;
                     }


}
      public function update(Request $request)
    {   
        
    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
        // return $request;

        $id = $request->input('id');   
        $name = $request->input('name');
        $code = $request->input('code');
        $nacode = $request->input('nacode');
        $type = $request->input('type');
        $units = $request->input('units');
        $facility = $request->input('facility');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $sampleage = $request->input('sampleage');
        $status = $request->input('status');
        $decimal = $request->input('decimal');

        $plausiblehigh = $request->input('plausiblehigh');
        $plausiblelow = $request->input('plausiblelow');
        $flagmalehigh = $request->input('flagmalehigh');
        $flagmalelow = $request->input('flagmalelow');
        $flagfemalehigh = $request->input('flagfemalehigh');
        $flagfemalelow = $request->input('flagfemalelow');
        $femalehigh = $request->input('femalehigh');
        $femalelow = $request->input('femalelow');
        $malehigh = $request->input('malehigh');
        $malelow = $request->input('malelow');
        $department = $request->input('department');
        $dodelta = $request->input('dodelta');
        $id = $request->input('id');
        $medrenal = $request->input('medrenal');
        $vr = $request->input('volumnerequired');
        $activefrom = $request->input('activefrom');
        $activeto = $request->input('activeto');
         $health = $request->input('sendforhealth');
        $printable = $request->input('printable');
        $agefrom = $request->input('agefromdays');
        // $ageto = $request->input('agetodays');
        $printp = $request->input('printpriority');
        $prints = $request->input('printsplit');

        $ageto = $request->input('aget');

        $printtable=0;
        $KnownToAnalyser=0;

        if($dodelta ==''){
            $dodelta=0;
        }
        // return $vr;

        // return $request;
         $user = auth()->user();
        
        $validator = Validator::make($request->all(), [
            'nacode' => 'required',
            'code'=> 'required|unique:testdefinitions,shortname,'.$id, 
            'name' => 'required|unique:testdefinitions,longname,'.$id,   
            'type' => 'required',
            'facility' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'status' => 'required',
           'volumnerequired'=>'required',
            'department'=>'required'

        ]);
     

             if ($validator->passes()) {


                if($sampleage == '') {

                    $sampleage = 0;
                }

                // ('insert into TestDefinitions (id,department, longname, shortname, nacode, SampleType, units,  adultsContainer, childrenContainer, sampleage,  Hospital, InUse, created_at, created_by,MaleLow,MaleHigh,FemaleLow,FemaleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow, FlagFemaleHigh,PlausibleLow,PlausibleHigh,dodelta,medrenal,ActiveFromDate,ActiveToDate,volumnerequired,HealthLink,Printable) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
                // [$id,$department, $name, $code, $nacode, $type, $units, $adults, $children, $sampleage, $facility, $status, date('Y-m-d H:i:s'), $user['id'] ,$malelow,$malehigh,$femalelow,  $femalehigh,$flagmalelow,$flagmalehigh,$flagfemalelow,$flagfemalehigh,$plausiblelow,$plausiblehigh,$dodelta,$medrenal,$activefrom,$activeto,$vr,$health,$printable] ); 
            // return $vr;
            // return $id;
          $updatequery = "update TestDefinitions 
            set 
            department='$department',
            medrenal='$medrenal',
            longname = '$name',
             shortname = '$code', 
             nacode = '$nacode', 
             SampleType = '$type', 
             units= '$units', 
             adultsContainer = '$adults', 
             childrenContainer = '$children',
              sampleage = '$sampleage',
               Hospital = '$facility', 
               InUse = $status, 
               updated_at = '" . date('Y-m-d H:i:s') . "',
               MaleLow= '$malelow',
               MaleHigh='$malehigh',
               FemaleHigh='$femalehigh',FemaleLow='$femalelow',
               FlagMaleLow='$flagmalelow', 
               FlagMaleHigh='$flagmalehigh',
               FlagFemaleLow='$flagfemalelow',
               FlagFemaleHigh='$flagfemalehigh',
               PlausibleLow='$plausiblelow',
               PlausibleHigh='$plausiblehigh',
               dodelta='$dodelta', 
               medrenal='$medrenal',
               ActiveFromDate='$activefrom',
               ActiveToDate='$activeto',
               units='$vr',
               units2='$units',
               dp='$decimal',
                HealthLink='$health',
                Printable='$printable',
                AgeFromDays='$agefrom',
                AgeToDays='$ageto',
                PrintPriority='$printp',
                PrintSplit='$prints',
            updated_by = '" . $user['id'] . "'
              where id =  $id ";
             DB::update(
            $updatequery
            );
        //     if($department =='Bio'){
            

        //         $sql3="Select * from ".$department."TestDefinitions where Code='$nacode'"; 
                
        //            }else if($department =='Coag'){
                       
        //                   $sql3="Select * from  ".$department."TestDefinitions  where Code='$nacode'"; 
        //            }else if($department =='Haem'){
               
        //             $sql3="Select * from  ".$department."TestDefinitions where Code='$nacode'"; 
        //            }
        //            else if($department =='External'){
                   
        //              $sql3="Select * from  ".$department."Definitions where AnalyteName='$nacode'"; 
        //            }
        //           else{
        //             $sql3="";
        //           }
        //     $agefdays = [];
        //     $a = 0;
        //          $sq= sqlsrv_query($conn_hq,$sql3);
                 
         
        //  if(sqlsrv_has_rows($sq)>0){

        //     while($res=sqlsrv_fetch_array($sq,SQLSRV_FETCH_ASSOC)){
                 
        //         $agefdays[$a] =$res;
        //         $agefdays[$a]+=["ocmcode"=>$code];
        //         $a++;

        //           }
        //         //   $data =  ['agefdays'=>$agefdays];
        //          //  return view('testmap', compact('agefdays'))->render();  
        //           return response()->json(['success'=>'Info updated.']);
        //         }else{
        //         return "<tr><td></td><td></td><td></td><td>No Record Found</td><td></td><td></td><td></td></tr>";
        //         }
        

            $controller = App::make('\App\Http\Controllers\activitylogs');
            $data = $controller->callAction('addLogs', [0,0,0,0,0,'Test', 'Test "'.$name.'" Updated. ']); 
             
            return response()->json(['success'=>'Info updated.']);
            
        }
       
            return response()->json(['error'=>$validator->errors()->first()]);
                
    } 



    public function inserttests(Request $request){
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
        // return $request;

        $id = $request->input('id');   
        $name = $request->input('name');
        $code = $request->input('code');
        $nacode = $request->input('nacode');
        $type = $request->input('type');
        $units = $request->input('units');
        $facility = $request->input('facility');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $sampleage = $request->input('sampleage');
        $status = $request->input('status');
     $agedays = $request->input('agefromdays');
        $agetodays = $request->input('aget');
        
        $decimal = $request->input('decimal');

        $plausiblehigh = $request->input('plausiblehigh');
        $plausiblelow = $request->input('plausiblelow');
        $flagmalehigh = $request->input('flagmalehigh');
        $flagmalelow = $request->input('flagmalelow');
        $flagfemalehigh = $request->input('flagfemalehigh');
        $flagfemalelow = $request->input('flagfemalelow');
        $femalehigh = $request->input('femalehigh');
        $femalelow = $request->input('femalelow');
        $malehigh = $request->input('malehigh');
        $malelow = $request->input('malelow');
        $department = $request->input('department');
        $dodelta = $request->input('dodelta');
        
        $printp = $request->input('printpriority');
        $prints = $request->input('printsplit');

        // $id = $request->input('id');
        $medrenal = $request->input('medrenal');
        $vr = $request->input('volumnerequired');
        $activefrom = $request->input('activefrom');
        $activeto = $request->input('activeto');
         $health = $request->input('sendforhealth');
        $printable = $request->input('printable');
        // return $department;
         if($department =='Bio'){
            

        $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,dodelta,KnownToAnalyser,AgeFromDays,AgeToDays,PrintPriority,dp,PrintSplit,HealthLink) values('$nacode','$name','$name','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$flagmalelow','$flagmalehigh','$flagfemalelow','$flagfemalehigh','$femalelow','$femalehigh','$malelow','$malehigh','1','$printable','$dodelta','0','$agedays','$agetodays','$printp','$decimal','$prints','$health')"; 
           }else if($department =='Coag'){
               $displayable=0;
                 $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,dodelta,displayable,AgeFromDays,AgeToDays,PrintPriority,dp) values('$nacode','$name','$name','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$flagmalelow','$flagmalehigh','$flagfemalelow','$flagfemalehigh','$femalelow','$femalehigh','$malelow','$malehigh','1','$printable','$dodelta','$displayable','$agedays','$agetodays','$printp','$decimal')"; 
           }else if($department =='Haem'){
           $DoRM=0;
            $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,dodelta,DoRM,AnalyteName,AgeFromDays,AgeToDays,PrintPriority) values('$nacode','$name','$name','$type','$units','CAVAN','$plausiblelow','$plausiblehigh','$femalelow','$femalehigh','$malelow','$malehigh','1','$dodelta',$DoRM,'$code','$agedays','$agetodays','$printp')"; 
           }
           else if($department =='External'){
           $DoRM=0;
             $sql3="Insert into  ".$department."Definitions(SampleType,units,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,AnalyteName,PrintPriority) values('$type','1','$femalelow','$femalehigh','$malelow','$malehigh','1','$nacode','$printp')"; 
           }
          else{
            $sql3="";
          }

          sqlsrv_query($conn_hq,$sql3);
        return response()->json(['success'=>'Data Inserted.']);
         



    }


public static function syncing($code='',$department=''){

    $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
    if(!$conn_hq)
     {
    die( print_r( sqlsrv_errors(), true));
}  
 $sync=DB::table('testdefinitions')->where('shortname',$code)->get();

$sql="Delete  from ".$department."testdefinitions where shortname='$code'";
 sqlsrv_query($conn_hq,$sql);
foreach($sync as $s){
    // echo $s->shortname;
    if($department =='Bio'){
            

        $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,KnownToAnalyser,dodelta) values('$s->Code','$s->shortname','$s->longname','$s->SampleType','$s->units','$s->Hospital','$s->PlausibleLow','$s->PlausibleHigh','$s->FlagMaleLow','$s->FlagMaleHigh','$s->FlagFemaleLow','$s->FlagFemaleHigh','$s->FemaleLow','$s->FemaleHigh','$s->MaleLow','$s->MaleHigh','$s->InUse','$s->Printable','$s->KnownToAnalyser','$s->dodelta')"; 
           }else if($department =='Coag'){
               $displayable=0;
                  $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FlagMaleLow,FlagMaleHigh,FlagFemaleLow,FlagFemaleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,Printable,dodelta,displayable) values('$s->Code','$s->shortname','$s->longname','$s->SampleType','$s->units','$s->Hospital','$s->PlausibleLow','$s->PlausibleHigh','$s->FlagMaleLow','$s->FlagMaleHigh','$s->FlagFemaleLow','$s->FlagFemaleHigh','$s->FemaleLow','$s->FemaleHigh','$s->MaleLow','$s->MaleHigh','$s->InUse','$s->Printable','$s->dodelta','$displayable')"; 
           }else if($department =='Haem'){
           $DoRM=0;
            $sql3="Insert into  ".$department."TestDefinitions(Code,shortname,longname,SampleType,units,Hospital,PlausibleLow,PlausibleHigh,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,dodelta,DoRM,AnalyteName) values('$s->Code','$s->shortname','$s->longname','$s->SampleType','$s->units','$s->Hospital','$s->PlausibleLow','$s->PlausibleHigh','$s->FemaleLow','$s->FemaleHigh','$s->MaleLow','$s->MaleHigh','$s->InUse','$s->dodelta',$DoRM,'$s->code')"; 
           }
           else if($department =='External'){
           $DoRM=0;
            $sql3="Insert into  ".$department."Definitions(SampleType,units,FemaleLow,FemaleHigh,MaleLow,MaleHigh,InUse,AnalyteName) values('$s->SampleType','$s->InUse','$s->FemaleLow','$s->FemaleHigh','$s->MaleLow','$s->MaleHigh','$s->InUse','$s->Code')"; 
           }
          else{
            $sql3="";
          }

          sqlsrv_query($conn_hq,$sql3);
         
}

}




}