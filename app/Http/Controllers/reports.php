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

class reports extends Controller
{

        public function index(Request $request)
    {




        if ($request->ajax()) {

            $data =  DB::table('reports')->select(
                                'reports.id', 
                                'reports.name', 
                                'reports.report', 
                                'reports.interface', 
                                'reports.InUse',  
                                'reports.created_at', 
                                'reports.updated_at',
                                'A.name as created_by',
                                'B.name as updated_by'
                                )
                                ->leftjoin('users AS A', 'A.id', '=', 'reports.created_by')
                                ->leftjoin('users AS B', 'B.id', '=', 'reports.updated_by');
                                //->whereIn('role',[1,3]);

            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="GenerateReport/'.$row->id.'" title="Edit User" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    })

                     //  ->editColumn('created_at', function ($request) {
                       
                     //    if($request->created_at != '') {

                     //        $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->format('d M Y H:i a'); 
                     //        return $created_at;
                            
                     //    }

                     //  })

                     // ->editColumn('updated_at', function($request){ 
                     //    if($request->updated_at != '') {
                     //     $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $request->updated_at)->format('d M Y H:i a'); 
                     //        return $updated_at;
                     //     } else {

                     //        return '';
                     //     }
                     // })

                    ->setRowId('reports.id')
                    ->rawColumns(['action'])
                    ->make(true);
                  
        }

        return view ('reports');
        
    }
    public function index7data(Request $request)
    {
         $to=$request->to;
        $from=$request->from;
        $source1=$request->Source;
        $i=0;
        $result=array();
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();

        if($source1=='Ward'){
            $source='W';
        }
        if($source1=='Clinician'){
            $source='C';
        }
        if($source1=='GP'){
            $source='G';
        }
   

        $tsql = "Select distinct SourcePanelName from SourcePanels where SourcePanelType = '$source'";     
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $countgetlist=sqlsrv_has_rows($getlist);
        if($countgetlist > 0){
            while($row4 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
            {

            $temp=$row4['SourcePanelName'];
            $result[$i]['Source']=$temp; 
            $tsql7 = "Select Content from SourcePanels where SourcePanelName = '$temp' and SourcePanelType = '$source'";    
            
            $getlist7 = sqlsrv_query($conn_hq, $tsql7);

            $countgetlist5 =sqlsrv_has_rows($getlist7);
            if( $countgetlist5 > 0){
                
                while($row15 = sqlsrv_fetch_array($getlist7, SQLSRV_FETCH_ASSOC))
                {
                    $tsql5 = "Select Content from SourcePanels where SourcePanelName = '$temp' and SourcePanelType = '$source'";     
                    $getlist5 = sqlsrv_query($conn_hq, $tsql5);
                    $row7=sqlsrv_fetch_array($getlist5, SQLSRV_FETCH_ASSOC);
                    $temp2=$row7['Content'];

                    $tsql1 = "Select count(*) as total from Demographics where $source1 = '$temp2' and Demographics.RunDate between '$from' and '$to'";     
                    $getlist1 = sqlsrv_query($conn_hq, $tsql1);
                    $row8=sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC);
                    $temp3=$row8['total'];
                    $result[$i]['TotalSamples']=$temp3;

                    $tsql2 = "Select distinct Demographics.SampleID from Demographics, BioResults where $source1 = '$temp2' and Demographics.SampleID = BioResults.SampleID and Demographics.RunDate between '$from' and '$to'";     
                    $getlist2 = sqlsrv_query($conn_hq, $tsql2);
                    $row9=sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
                    //$temp4=$row9['SampleID'];
                    $count2=sqlsrv_has_rows($getlist2);
                    if($count2 > 0){
                        $result[$i]['CoagSamples']=$row9['SampleID'];
                    }
                    else{
                        
                        $result[$i]['CoagSamples']="";
                    }
                    $tsql3 = "Select distinct Demographics.SampleID from Demographics, CoagResults where $source1 = '$temp2' and Demographics.SampleID = CoagResults.SampleID and Demographics.RunDate between '$from' and '$to'";     
                    $getlist3 = sqlsrv_query($conn_hq, $tsql3);
                    $row10=sqlsrv_fetch_array($getlist3, SQLSRV_FETCH_ASSOC);
                    // $temp5=$row10['SampleID'];
                    $count3=sqlsrv_has_rows($getlist3);
                    if($count3 > 0){
                        $result[$i]['BioSamples']=$row10['SampleID'];
                    }
                    else{
                        
                        $result[$i]['BioSamples']="";
                    }
                
                    
                    $tsql4 = "Select distinct Demographics.SampleID from Demographics, HaemResults where $source1 = '$temp2' and Demographics.SampleID = HaemResults.SampleID and Demographics.RunDate between '$from' and '$to'";     
                    $getlist4 = sqlsrv_query($conn_hq, $tsql4);
                    $row11=sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC);
                    // $temp6=$row11['SampleID'];
                    $count4=sqlsrv_has_rows($getlist4);
                    if($count4 > 0){
                        $result[$i]['HaemSamples']=$row11['SampleID'];
                    }
                    else{
                        
                        $result[$i]['HaemSamples']="";
                    }
                }
                
            }
            $i=$i+1;
        }
    }
      


        return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('Source', function($row){
            return $row['Source'];
        }) 
        ->addIndexColumn()
        ->addColumn('Total Samples', function($row){
            return $row['TotalSamples'];
        }) 
        ->addIndexColumn()
        ->addColumn('Coag Samples', function($row){
            return $row['CoagSamples'];
        }) 
        ->addIndexColumn()
        ->addColumn('Bio Samples', function($row){
            return $row['BioSamples'];
        }) 
        ->addIndexColumn()
        ->addColumn('Haem Samples', function($row){
            return $row['HaemSamples'];
        }) 
        ->setRowId('Source')
        ->rawColumns(['Source', 'Total Samples', 'Coag Samples', 'Bio Samples', 'Haem Samples'])
        ->make(true);

    }
    public function getModuleList(Request $request)
    {

                  $editmode = 'no'; 

                  if($request->id > 0) {

                    $editmode = 'yes'; 

                  } 
                  if($request->report == 'Samples') {

                     $columns = \Schema::getColumnListing('OCMRequestTestsDetails');

                       $data = [
                            'table' => 'OCMRequestTestsDetails',
                            'columns' => $columns,
                            'editmode' => $editmode,
                            'rid' => $request->id

                        ];      

                  return view('layouts.modulelist', compact('data'))->render();  


                  }

                   if($request->report == 'Results') {

                     $columns = \Schema::getColumnListing('results');

                       $data = [
                            'table' => 'results',
                            'columns' => $columns,
                            'editmode' => $editmode,
                            'rid' => $request->id

                        ];      

                  return view('layouts.modulelist', compact('data'))->render();  


                  }  elseif($request->report == 'Activity Logs') {

                    $columns = \Schema::getColumnListing('ActivityLog');

                       $data = [
                            'table' => 'ActivityLog',
                            'columns' => $columns, 
                            'editmode' => $editmode,
                            'rid' => $request->id         
                        ];      

                  return view('layouts.modulelist', compact('data'))->render();  

                  }
                       
    } 


      public static function getColumnName($column='',$table='')
    {

                    if($table == 'Samples' || $table == 'OCMRequestTestsDetails') {


                        return $columns = DB::table('foreignKeys') 
                          ->where('foreignKeys.table1', 'OCMRequestTestsDetails')
                          ->where('foreignKeys.value1', $column)->get();

                      }

                      if($table == 'Activity Logs' || $table == 'ActivityLog') {


                        return $columns = DB::table('foreignKeys') 
                          ->where('foreignKeys.table1', 'ActivityLog')
                          ->where('foreignKeys.value1', $column)->get();

                      }


                      if($table == 'Results' || $table == 'results') {


                        return $columns = DB::table('foreignKeys') 
                          ->where('foreignKeys.table1', 'results')
                          ->where('foreignKeys.value1', $column)->get();

                      }


              

            //return \Response::json($columns);                          

                   
    }

      public static function GetColumnStatus($column='',$rid='')
    {

           return $columns = DB::table('reportsoptions') 
                          ->where('rid', $rid)
                          ->where('column_', $column)->get();
              

            //return \Response::json($columns);                          

                   
    }


     public  function ReportsList(Request $request)
    {               
                    
                        


                    $now = Carbon::now();
                    $date =  $now->format('Y-m-d'); 
                    $title =  $request->name;
                    $report = DB::table('reports')->where('name', $title)->get();



                  
                  if($report[0]->report == 'Results') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'results'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report[0]->id)
                    ->get();

                  }


                  if($report[0]->report == 'Activity Logs') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'ActivityLog'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report[0]->id)
                    ->get();

                  }

                  if($report[0]->report == 'Samples') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'OCMRequestTestsDetails'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report[0]->id)
                    ->get();

                  }



                  

                    
                    $reportFilterOptions = DB::table('reportFilterOptions')->where('rid', $report[0]->id)->get();

                    $data = [

                            'date1' => $date,
                            'date2' => $date,
                            'title' => $title,
                            'report' => $report,
                            'reportsOptions' => $reportsOptions,
                            'reportFilterOptions' => $reportFilterOptions
                        ];      

                  return view ('reportinterface')->with('data',$data);
          
    } 


     public static function getDates(Request $request)
    {
         $now = Carbon::now();           

        if($request->id == 'Today') {

             $date1 =  $now->format('Y-m-d');
             $date2 =  $now->format('Y-m-d');
        }

        if($request->id == 'Yesterday') {

             $date = Carbon::yesterday();
             $date1 =  $date->format('Y-m-d');
             $date2 =  $date->format('Y-m-d');
        }

        if($request->id == 'This Week') {

        $date1 = $now->startOfWeek()->format('Y-m-d');
        $date2 = $now->endOfWeek()->format('Y-m-d');

        }

        if($request->id == 'Last Week') {

        $date1 = $now->startOfWeek()->subWeek()->format('Y-m-d');
        $date2 = $now->endOfWeek()->format('Y-m-d');

        }

        if($request->id == 'This Month') {

        $date1 = $now->format('Y-m-01');
        $date2 = $now->format('Y-m-t');

        }

        if($request->id == 'Last Month') {

        $date1 = $now->subMonth()->format('Y-m-01');
        $date2 = $now->format('Y-m-t');

        }

        if($request->id == 'This Year Q1') {

        $date1 = $now->format('Y-01-01');
        $date2 = $now->format('Y-03-31');

        }

        if($request->id == 'This Year Q2') {

        $date1 = $now->format('Y-04-01');
        $date2 = $now->format('Y-06-30');

        }

        if($request->id == 'This Year Q3') {

        $date1 = $now->format('Y-07-01');
        $date2 = $now->format('Y-09-30');

        }


        if($request->id == 'This Year Q4') {

        $date1 = $now->format('Y-10-01');
        $date2 = $now->format('Y-12-31');

        }

        if($request->id == 'All of This Year') {

        $date1 = \Carbon\Carbon::now()->format('Y-01-01');
        $date2 = \Carbon\Carbon::now()->format('Y-12-31');

        }


        if($request->id == 'Last Year Q1') {

        $date1 = $now->subYear()->format('Y-01-01');
        $date2 = $now->format('Y-03-31');

        }

         if($request->id == 'Last Year Q2') {

        $date1 = $now->subYear()->format('Y-04-01');
        $date2 = $now->format('Y-06-30');

        }

         if($request->id == 'Last Year Q3') {

        $date1 = $now->subYear()->format('Y-07-01');
        $date2 = $now->format('Y-09-30');

        }

         if($request->id == 'Last Year Q4') {

        $date1 = $now->subYear()->format('Y-10-01');
        $date2 = $now->format('Y-12-31');

        }

        if($request->id == 'All of Last Year') {

        $date1 = $now->subYear()->format('Y-10-01');
        $date2 = $now->format('Y-12-31');

        }


        if($request->id == 'Custom Date') {

        $date1 = $now->format('Y-m-01');
        $date2 = $now->format('Y-m-t');

        }





         if($request->duration == 'Last Three Months') {

        $date1 = $now->startOfMonth()->subMonth(2)->format('Y-m-d');
        $date2 = \Carbon\Carbon::now()->endOfMonth()->toDateString();

        }

           return response()->json(['date1'=>$date1, 'date2'=>$date2]);
          
    } 

    public static function Reports()
    {

        return $data = DB::table('reports')->where('InUse', 1)->orderBy('name')->get();
          
    } 

     public static function Users()
    {

        return $data = DB::table('users')->orderBy('name')->get();
          
    } 

     public static function Roles()
    {

        return $data = DB::table('Lists')->where('ListType','ROL')->orderBy('Text')->get();
          
    } 

     public static function Departments()
    {

        return $data = DB::table('userdepartments')->orderBy('name')->get();
          
    } 


     public function getReport(Request $request)
    {


        $id= $request->input('id');
        $date = $request->input('date');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $group = $request->input('group');
        $user = $request->input('user');
        $role = $request->input('role');
        $department = $request->input('department');
        
        
          $validator = Validator::make($request->all(), [

            'id'  => 'required',
            'date'  => 'required',
            'date1'  => 'required',
            'date2'  => 'required',
            'group'  => 'required',
            'user'  => 'required',
            'role'  => 'required',
            'department'  => 'required'
          
          ]);


           if ($validator->passes()) { 

                $reportInfo = DB::table('reports')->where('id', $id)->get();

                if($reportInfo[0]->interface == 'Table') {

                    $report = DB::table('reportsOptions')->select('column_','columnfilter','sorting')->where('rid', $id)->get();

                    $data = [

                            'date' => $date, 
                            'reportInfo' => $reportInfo,
                            'report' => $report,
                    ];

                    return view('layouts.report', compact('data'))->render(); 

                }

                if($reportInfo[0]->interface == 'Bar Chart' || $reportInfo[0]->interface == 'Line Chart') {

                    if($reportInfo[0]->report == 'Samples') {

                    $sr = 0;
                    $sr2 = 0;

                    $begin = new DateTime( $date1 );
                    $end   = new DateTime( $date2 );  

                    for($i = $begin; $i <= $end; $i->modify('+1 day')){


                           $date = $i->format("Y-m-d"); 
                           $table = 'OCMRequestTestsDetails';
                           $data = DB::table($table)->leftjoin('OCMPhlebotomy', 'OCMPhlebotomy.PhlebotomySampleID', '=', $table.'.sampleID')->whereDate('OCMPhlebotomy.PhlebotomySampleDateTime',$date)

                           ->when($request->group == 'Users' && $request->user != 'All' , function ($query) use($request){
                                return $query->where('OCMRequestTestsDetails.sampletakenby',$request->user);
                                })

                            ->when($request->group == 'Roles' && $request->role != 'All' , function ($query) use($request){
                                $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                return $query->whereIn('OCMRequestTestsDetails.sampletakenby',$roles);
                                })

                             ->when($request->group == 'Departments' && $request->department != 'All' , function ($query) use($request){
                                $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                return $query->whereIn('OCMRequestTestsDetails.sampletakenby',$departments);
                                })

                           ->pluck($table.'.id');


                            
                        if($data) {

                           $myProfiles[] = array($date =>$data);
                           $labels[] = $i->format("Y-m-d"); 
                           $values[] = count($myProfiles[$sr++][$date]); 
                        
                           
                           } 
                            
                    } 
          
                             $data = [

                                    'date' => $date, 
                                    'reportInfo' => $reportInfo,
                                    'labels' => $labels,
                                    'values' => $values
                            ];

                            return view('layouts.report', compact('data'))->render(); 

                        }

                        if($reportInfo[0]->report == 'Results') {

                    $sr = 0;
                    $sr2 = 0;

                    $begin = new DateTime( $date1 );
                    $end   = new DateTime( $date2 );  

                    for($i = $begin; $i <= $end; $i->modify('+1 day')){

                        

                           $date = $i->format("Y-m-d"); 
                           $table = 'results';
                           
                           $data = DB::table($table)
                           ->whereDate('results.ValidateTime',$date)
                           ->whereIn('results.Flags',[null,''])

                           ->when($request->group == 'Users' && $request->user != 'All' , function ($query) use($request){
                                return $query->where('results.SignOffBy',$request->user);
                                })

                            ->when($request->group == 'Roles' && $request->role != 'All' , function ($query) use($request){
                                $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$roles);
                                })

                             ->when($request->group == 'Departments' && $request->department != 'All' , function ($query) use($request){
                                $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$departments);
                                })

                           ->pluck($table.'.id');


                           $data2 = DB::table($table)
                           ->whereDate('results.ValidateTime',$date)
                           ->whereIn('results.Flags',['H'])

                           ->when($request->group == 'Users' && $request->user != 'All' , function ($query) use($request){
                                return $query->where('results.SignOffBy',$request->user);
                                })

                            ->when($request->group == 'Roles' && $request->role != 'All' , function ($query) use($request){
                                $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$roles);
                                })

                             ->when($request->group == 'Departments' && $request->department != 'All' , function ($query) use($request){
                                $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$departments);
                                })

                           ->pluck($table.'.id');



                           $data3 = DB::table($table)
                           ->whereDate('results.ValidateTime',$date)
                           ->whereIn('results.Flags',['L'])

                           ->when($request->group == 'Users' && $request->user != 'All' , function ($query) use($request){
                                return $query->where('results.SignOffBy',$request->user);
                                })

                            ->when($request->group == 'Roles' && $request->role != 'All' , function ($query) use($request){
                                $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$roles);
                                })

                             ->when($request->group == 'Departments' && $request->department != 'All' , function ($query) use($request){
                                $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                return $query->whereIn('results.SignOffBy',$departments);
                                })

                           ->pluck($table.'.id');


                            
                        if($data) {

                           $myProfiles[] = array($date =>$data);
                           $myProfiles2[] = array($date =>$data2);
                           $myProfiles3[] = array($date =>$data3);
                           $labels[] = $i->format("Y-m-d"); 
                           $values[] = count($myProfiles[$sr][$date]); 
                           $values2[] = count($myProfiles2[$sr][$date]); 
                           $values3[] = count($myProfiles3[$sr][$date]); 
             
                            $sr = $sr+1;
                           
                           } 
                            
                    } 
          
                             $data = [

                                    'date' => $date, 
                                    'reportInfo' => $reportInfo,
                                    'labels' => $labels,
                                    'values' => $values,
                                    'values2' => $values2,
                                    'values3' => $values3

                            ];

                            return view('layouts.report', compact('data'))->render(); 

                        }

                }



                 if($reportInfo[0]->interface == 'Pie Chart') {


                 $reportpiecharts = DB::table('reportpiecharts')
                     ->where('rid', $request->id)->pluck('value'); 


                     foreach($reportpiecharts as $reportpiechart) {

                    if($reportpiechart == 'Results Count') {

                    $ids = DB::table('results')
                     ->whereBetween('ValidateTime', [$date1, $date2])->count('sampleid');

                     $labels = array();  
                    $values = array();  

                     $labels[] = 'Total Results';
                     $values[] = $ids;           
                      
                                $maindata[$reportpiechart] = [

                                            'name' => $reportpiechart,
                                            'labels' => $labels,
                                            'values' => $values
                                    ];

                             }

                    if($reportpiechart == 'Samples Count') {

                            $ids = DB::table('ocmrequesttestsdetails')
                            ->join('OCMPhlebotomy', 'OCMPhlebotomy.PhlebotomySampleID', '=', 'ocmrequesttestsdetails.sampleID')
                             ->whereBetween('OCMPhlebotomy.PhlebotomySampleDateTime', [$date1, $date2])->count('sampleid');

                             $labels = array();  
                            $values = array();  

                             $labels[] = 'Total Samples';
                             $values[] = $ids;           
                              
                                        $maindata[$reportpiechart] = [

                                                    'name' => $reportpiechart,
                                                    'labels' => $labels,
                                                    'values' => $values
                                            ];

                             }


                             if($reportpiechart == 'Profiles Count') {

                         $topprofiles = DB::table('OCMRequestDetails')
                            ->select('testprofiles.name', DB::raw('COUNT(OCMRequestDetails.id) as count'))
                            ->leftjoin('testprofiles', 'testprofiles.id', '=', 'OCMRequestDetails.TestID')
                            ->whereBetween('ExecutionDateTime', [$date1, $date2])
                            ->groupBy('TestID')
                            ->orderBy(DB::raw('COUNT(OCMRequestDetails.id)'), 'DESC')
                            ->take(10)
                            ->get();

                             $labels = array();
                             $values = array();           
                            
                             if(count($topprofiles) > 0) {

                                    foreach ($topprofiles as $key => $topprofile) {
                                            
                                          $labels[] = $topprofile->name;  
                                          $values[] = $topprofile->count;  
                                    }

                             }  

        
                                        $maindata[$reportpiechart] = [

                                                    'name' => $reportpiechart,
                                                    'labels' => $labels,
                                                    'values' => $values
                                            ];

                             }


                    if($reportpiechart == 'Tests Count') {

                         $ids = DB::table('OCMRequest')
                            ->whereBetween('ExecutionDateTime', [$date1, $date2])->pluck('ReqestID');

                         $toptests = DB::table('OCMRequestTestsDetails')
                            ->select('TestDefinitions.longname', DB::raw('COUNT(OCMRequestTestsDetails.id) as count'))
                            ->leftjoin('TestDefinitions', 'TestDefinitions.id', '=', 'OCMRequestTestsDetails.test')
                            ->whereIn('request',$ids)
                            ->groupBy('OCMRequestTestsDetails.test')
                            ->orderBy(DB::raw('COUNT(OCMRequestTestsDetails.id)'), 'DESC')
                            ->take(10)
                            ->get();

                             $labels = array();
                             $values = array();           
                            
                             if(count($toptests) > 0) {

                                    foreach ($toptests as $key => $toptest) {
                                            
                                          $labels[] = $toptest->longname;  
                                          $values[] = $toptest->count;  
                                    }

                             }  

        
                                        $maindata[$reportpiechart] = [

                                                    'name' => $reportpiechart,
                                                    'labels' => $labels,
                                                    'values' => $values
                                            ];

                             }


                        if($reportpiechart == 'Top 10 Activities') {

                         $activitylogs = DB::table('activitylog')
                             ->select('activitylog.ActionType', DB::raw('COUNT(activitylog.ActionType) as count'))
                            ->whereBetween('DateTimeOfRecord', [$date1, $date2])->take(10)
                            ->groupBy('activitylog.ActionType')
                            ->get();

                             $labels = array();
                             $values = array();           
                            
                             if(count($activitylogs) > 0) {

                                    foreach ($activitylogs as $key => $activitylog) {
                                            
                                          $labels[] = $activitylog->ActionType;  
                                          $values[] = $activitylog->count;  
                                    }

                             }  

        
                                        $maindata[$reportpiechart] = [

                                                    'name' => $reportpiechart,
                                                    'labels' => $labels,
                                                    'values' => $values
                                            ];

                             }


                              if($reportpiechart == 'Top 10 Users') {

                         $activitylogs = DB::table('activitylog')
                             ->select('users.name', DB::raw('COUNT(activitylog.UserName) as count'))
                             ->leftjoin('users', 'users.id', '=', 'activitylog.UserName')
                             ->whereBetween('DateTimeOfRecord', [$date1, $date2])->take(10)
                             ->groupBy('activitylog.UserName')
                             ->get();

                             $labels = array();
                             $values = array();           
                            
                             if(count($activitylogs) > 0) {

                                    foreach ($activitylogs as $key => $activitylog) {
                                            
                                          $labels[] = $activitylog->name;  
                                          $values[] = $activitylog->count;  
                                    }

                             }  

        
                                        $maindata[$reportpiechart] = [

                                                    'name' => $reportpiechart,
                                                    'labels' => $labels,
                                                    'values' => $values
                                            ];

                             }



                              elseif($reportpiechart == 'Flags Count') { 


                                  $labels = array();  
                                  $values = array();  

                                 $ids = DB::table('results')
                                 ->where('Flags', 'L')
                                 ->orwhere('Flags', 'H')
                                 ->whereBetween('ValidateTime', [$date1, $date2])->count('id');

                                 $labels[] = 'Critical Results';
                                 $values[] = $ids;  


                                 $ids = DB::table('results')
                                 ->where('Flags','!=', 'L')
                                 ->orwhere('Flags','!=', 'H')
                                 ->whereBetween('ValidateTime', [$date1, $date2])->count('id');

                                 $labels[] = 'Normal Results';
                                 $values[] = $ids;  

                      
                                $maindata[$reportpiechart] = [

                                            'name' => $reportpiechart,
                                            'labels' => $labels,
                                            'values' => $values
                                    ];   



                             }

                     }


                return $data = [

                            'maindata' => $maindata,
                            'date' => $date,   
                            'reportInfo' => $reportInfo
                    ]; 
                 

                    return view('layouts.report', compact('data'))->render(); 


                }


           }
         
    } 


     public function getReportResult(Request $request)
    {

        

         if ($request->ajax()) {
   
             
             $report = DB::table('reports')->where('name',$request->report)->get();

             if($report[0]->report == 'Samples') {  

                $table = 'OCMRequestTestsDetails';

                $data = DB::table($table);

              $columns = DB::table('reportsOptions')->where('rid',$report[0]->id)->pluck('column_');

              foreach($columns as $column) {
             
                  $column2 =  App\Http\Controllers\reports::GetColumnName($column ,'Samples');

                           
                           if(count($column2) ==  0) {

                               $data = $data->addSelect($table.'.'.$column);
                           }
                            else {

                                 $column_ = $column2[0]->table2UniqueName.'.'.$column2[0]->value2. ' as '.$column2[0]->value1;
                                 $data = $data->addSelect($column_);
                                 $data->leftjoin($column2[0]->table2. ' as '. $column2[0]->table2UniqueName, $column2[0]->table2UniqueName.'.id', '=', $table.'.'.$column2[0]->value1);  
                          }

                    
              }
              $data = $data->addSelect($table.'.request');
              $data = $data->addSelect($table.'.episode');
              $data = $data->addSelect('OCMPhlebotomy.PhlebotomySampleDateTime');
              $data->join('OCMPhlebotomy', 'OCMPhlebotomy.PhlebotomySampleID', '=', $table.'.sampleID');
              $data->whereBetween('OCMPhlebotomy.PhlebotomySampleDateTime', [$request->date1, $request->date2]);

              if($request->group == 'Users' && $request->user != 'All') {


                    $data->where($table.'.sampletakenby',$request->user);
                
              } 
              if($request->group == 'Roles' && $request->role != 'All') {

                    $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                    $data->whereIn($table.'.sampletakenby',$roles);
                
              } 

               if($request->group == 'Departments' && $request->department != 'All') {

                    $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                    $data->whereIn($table.'.sampletakenby',$departments);
                
              } 

             }

          if($report[0]->report == 'Activity Logs') {

                $table = 'ActivityLog';

                $data = DB::table($table);

              $columns = DB::table('reportsOptions')->where('rid',$report[0]->id)->pluck('column_');

              foreach($columns as $column) {
             
                  $column2 =  App\Http\Controllers\reports::GetColumnName($column ,'Activity Logs');

                           
                           if(count($column2) ==  0) {

                               $data = $data->addSelect($table.'.'.$column);
                           }
                            else {

                                 $column_ = $column2[0]->table2UniqueName.'.'.$column2[0]->value2. ' as '.$column2[0]->value1;
                                 $data = $data->addSelect($column_);
                                 $data->leftjoin($column2[0]->table2. ' as '. $column2[0]->table2UniqueName, $column2[0]->table2UniqueName.'.id', '=', $table.'.'.$column2[0]->value1);  
                          }
                     }

                        $data->whereBetween($table.'.DateTimeOfRecord', [$request->date1, $request->date2]);


                       if($request->group == 'Users' && $request->user != 'All') {


                        $data->where($table.'.UserName',$request->user);
                                
                              } 
                          if($request->group == 'Roles' && $request->role != 'All') {

                                    $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                    $data->whereIn($table.'.UserName',$roles);
                                
                              } 

                       if($request->group == 'Departments' && $request->department != 'All') {

                                    $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                    $data->whereIn($table.'.UserName',$departments);
                                
                          } 

             }

             if($report[0]->report == 'Results') {

                $table = 'results';

                $data = DB::table($table);

              $columns = DB::table('reportsOptions')->where('rid',$report[0]->id)->pluck('column_');

              foreach($columns as $column) {
             
                  $column2 =  App\Http\Controllers\reports::GetColumnName($column ,'Results');

                           
                           if(count($column2) ==  0) {

                               $data = $data->addSelect($table.'.'.$column);
                           }
                            else {

                                 $column_ = $column2[0]->table2UniqueName.'.'.$column2[0]->value2. ' as '.$column2[0]->value1;
                                 $data = $data->addSelect($column_);
                                 $data->leftjoin($column2[0]->table2. ' as '. $column2[0]->table2UniqueName, $column2[0]->table2UniqueName.'.id', '=', $table.'.'.$column2[0]->value1);  
                          }
                     }

                        $data->whereBetween($table.'.RunTime', [$request->date1, $request->date2]);


                       if($request->group == 'Users' && $request->user != 'All') {


                        $data->where($table.'.SignOffBy',$request->user);
                                
                              } 
                          if($request->group == 'Roles' && $request->role != 'All') {

                                    $roles = DB::table('users')->where('role',$request->role)->pluck('id');
                                    $data->whereIn($table.'.SignOffBy',$roles);
                                
                              } 

                       if($request->group == 'Departments' && $request->department != 'All') {

                                    $departments = DB::table('users')->where('department',$request->department)->pluck('id');
                                    $data->whereIn($table.'.SignOffBy',$departments);
                                
                          } 

             }

             


            return Datatables::of($data)

                    ->addIndexColumn()  

                     ->addColumn('action', function($row){
                           
                           if (isset($row->sampletakenby)) {



                           $btn = '<a target="_blank" href="../Requests/viewRequest/'.$row->request.'/'.$row->episode.'" title="View Request" class="btn btn-secondary">
                                 <i class="fas fa-eye"></i>
                                </a>';

                           } else {

                                $btn = 'sfsd';
                           }

                               
    
                            return $btn;
                    }) 

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

    }
    

    public function delete(Request $request)
    {
     $id = $request->input('id');  




     $report = DB::table('reports')->select('name')->where('id', $id)->get();

     $controller = App::make('\App\Http\Controllers\activitylogs');
     $data = $controller->callAction('addLogs', [0,0,0,0,0,'Report Generator', 'Report "'.$report[0]->name.'" Deleted. ']); 

        DB::table('reports')->where('id', $id)->delete();
        DB::table('reportsOptions')->where('rid', $id)->delete();
        DB::table('reportFilterOptions')->where('rid', $id)->delete();
        
        $modules = DB::table('modules')->select('id')->where('name', $report[0]->name)->where('report', 1)->get();
        DB::table('modules')->where('name', $report[0]->name)->where('report', 1)->delete();
        DB::table('rolespermissions')->where('module', $modules[0]->id)->delete();


    }



      public  function add(Request $request)
    {

        $rid = DB::table('reports')->max('id')+1;
        $mid = DB::table('modules')->max('ID')+1;
        $rpid = DB::table('rolespermissions')->max('id')+1;
        $name = $request->input('name');
        $report = $request->input('report');
        $interface = $request->input('interface');
        $dashboard = $request->input('dashboard'); 

        $filters = $request->input('filters');
        $dates = $request->input('dates');
        $piechart = $request->input('piechart');
        

        $columns = $request->input('columns');
        $columnfilters = $request->input('columnfilters');
        $sortings = $request->input('sortings');

        $user = auth()->user();
        

        $validator = Validator::make($request->all(), [
            'name' => 'required',      
            'report' => 'required',
            'interface' => 'required',
            'dashboard' => 'required'
        ]);
     

     if ($validator->passes()) {


        if($report == 'Samples' || $report == 'Activity Logs' || $report == 'Results') {

            if($interface == 'Table') {
            DB::table('reportsOptions')->where('rid', $rid)->delete();

             foreach($columns as $key => $column) {

             if($column != '0') {

                 DB::insert('insert into reportsOptions (rid, column_, columnfilter, sorting) values (?, ?, ?, ?)', 
                    [ $rid, $column, $columnfilters[$key], $sortings[$key] ]);

                 } 
                }  
            }

            if($interface == 'Pie Chart') {
            DB::table('reportpiecharts')->where('rid', $rid)->delete();

             
                 foreach($piechart as $key => $piechar) {

                      DB::insert('insert into reportpiecharts (rid, text, value) values (?, ?, ?)', 
                                [ $rid, $report, $piechar ]); 
                    }

            }


        }

        DB::table('reportFilterOptions')->where('rid', $rid)->delete();

        foreach($filters as $key => $filter) {

          DB::insert('insert into reportFilterOptions (rid, name, value) values (?, ?, ?)', 
                    [ $rid, 'filter', $filter ]); 
        }

        foreach($dates as $key => $date) {

          DB::insert('insert into reportFilterOptions (rid, name, value) values (?, ?, ?)', 
                    [ $rid, 'dates', $date ]); 
        }

        DB::insert('insert into reports (id, name, report, interface, dashboard, InUse, created_at, created_by) values (?, ?, ?, ?, ?, ?, ?, ?)', 
            
            [$rid, $name, $report, $interface, $dashboard, 1,  date('Y-m-d H:i:s'),  $user['id'] ]);  


        DB::insert('insert into modules (id, name, report, permissions, created_by, created_at) values (?, ?, ?, ?, ?, ?)', 
            
            [$mid, $name, 1, 'View',   $user['id'], date('Y-m-d H:i:s')]);  


        DB::insert('insert into rolespermissions (id, role, module, permissions, value, moduleName, report, created_by, created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            
            [$rpid, $user['role'], $mid, 'View',  'Yes', $name, 1, $user['id'], date('Y-m-d H:i:s')]);  


            $controller = App::make('\App\Http\Controllers\activitylogs');
            $data = $controller->callAction('addLogs', [0,0,0,0,0,'Report Generator', 'New  Report "'.$name.'" Generated. ']); 

            return response()->json(['success'=>'Report added.']);




        }
        
        return response()->json(['error'=>$validator->errors()->first()]);
                                        
    } 




      public  function update(Request $request)
    {

        $rid = $request->input('id');
        $name = $request->input('name');
        $report = $request->input('report');
        $interface = $request->input('interface');
        $dashboard = $request->input('dashboard'); 

        $filters = $request->input('filters');
        $dates = $request->input('dates');
        

        $columns = $request->input('columns');
        $columnfilters = $request->input('columnfilters');
        $sortings = $request->input('sortings');

        $user = auth()->user();
        

        $validator = Validator::make($request->all(), [
            'id' => 'required', 
            'name' => 'required|unique:reports,name,'.$rid,      
            'report' => 'required',
            'interface' => 'required',
            'dashboard' => 'required'
        ]);
     

     if ($validator->passes()) {


        if($report == 'Samples' || $report == 'Activity Logs') {

                if($interface == 'Table') {

                DB::table('reportsOptions')->where('rid', $rid)->delete();

                 foreach($columns as $key => $column) {

                     if($column != '0') {

                         DB::insert('insert into reportsOptions (rid, column_, columnfilter, sorting) values (?, ?, ?, ?)', 
                            [ $rid, $column, $columnfilters[$key], $sortings[$key] ]);

                            } 
                    }  
                }
        }

        DB::table('reportFilterOptions')->where('rid', $rid)->delete();

        foreach($filters as $key => $filter) {

          DB::insert('insert into reportFilterOptions (rid, name, value) values (?, ?, ?)', 
                    [ $rid, 'filter', $filter ]); 
        }

        foreach($dates as $key => $date) {

          DB::insert('insert into reportFilterOptions (rid, name, value) values (?, ?, ?)', 
                    [ $rid, 'dates', $date ]); 
        }

            $user = auth()->user();

            DB::update("
                update reports 
                set 
                name = '$name', 
                report = '$report', 
                interface = '$interface', 
                dashboard = '$dashboard', 
                updated_at = '".date('Y-m-d H:i:s')."',
                updated_by = '".$user['id']."'
                where id =  '$rid'
                ");


            $controller = App::make('\App\Http\Controllers\activitylogs');
            $data = $controller->callAction('addLogs', [0,0,0,0,0,'Report Generator', 'Report "'.$name.'" Updated. ']); 

            return response()->json(['success'=>'Report added.']);




        }
        
        return response()->json(['error'=>$validator->errors()->first()]);
                                        
    } 


      public function GenerateReport(Request $request)
    {             
            
             if($request->uid == '') {  
                  
                  $editmode = 'no'; 
                  $report = ''; 
                  $reportfilteroptions = ''; 
                  $reportsoptions = '';  

                  $users = DB::table('users') 
                        ->orderBy('name','asc')
                        ->get();

                  $departments = DB::table('userdepartments') 
                        ->orderBy('name','asc')
                        ->get();  

 

                  }  else {


                    $editmode = 'yes';

                    $report = DB::table('reports') 
                        ->where('id',$request->uid)
                        ->get();

                    $reportfilteroptions = DB::table('reportfilteroptions') 
                        ->where('rid',$request->uid)
                        ->get();
                        
                    $reportsoptions = DB::table('reportsoptions') 
                        ->where('rid',$request->uid)
                        ->get();        


                  }       

                  $data = [
                    'editmode' => $editmode,
                    'report' => $report,
                    'reportfilteroptions' => $reportfilteroptions,
                    'reportsoptions' => $reportsoptions          
                  ];      

                 return view ('report')->with('data',$data);
    } 

    public function sampleInfo(Request $request)
    {

        if($request->sampleid) {
                   

         $OCMPhlebotomies = DB::table('OCMPhlebotomy')
                       ->select('PhlebotomyRequestEpisodeID','PhlebotomyRequestID','PhlebotomySampleID')  
                          ->where('PhlebotomySampleID', $request->sampleid)
                          ->get(); 
        if(count($OCMPhlebotomies) > 0 ) {                         
        $sampleIDs = array();

          foreach($OCMPhlebotomies as $OCMPhlebotomy) {

                $sampleIDs[] = $OCMPhlebotomy->PhlebotomySampleID;
          }  
            
            
          $OCMRequest = DB::table('OCMRequest')
                          ->select('OCMRequest.*',
                                   'OCMRequest.id as OID',
                                    'PatientIFs.*', 
                                    'Clinics.name as clinic', 
                                    'Wards.Text as Ward', 
                                    'Clinicians.Text as Clinician',
                                    DB::raw('(SELECT COUNT(*) FROM OCMRequest WHERE OCMRequest.ReqestID = PatientIFs.id and OCMRequest.ExecutionDateTime < CURRENT_TIMESTAMP) as Visits')
                                    )  
                          ->leftjoin('PatientIFs', 'PatientIFs.id', '=', 'OCMRequest.RequestPatientID')
                          ->leftjoin('Wards', 'Wards.id', '=', 'OCMRequest.RequestWardID')
                          ->leftjoin('Clinicians', 'Clinicians.id', '=', 'OCMRequest.RequestClinicianID')
                          ->leftjoin('Clinics', 'Clinics.id', '=', 'OCMRequest.clinic')
                          ->where('ReqestID', $OCMPhlebotomies[0]->PhlebotomyRequestID)
                          ->where('RequestEpisodeID', $OCMPhlebotomies[0]->PhlebotomyRequestEpisodeID)
                          ->get();

          $DoB = Carbon::parse($OCMRequest[0]->DoB)->diff(Carbon::now())->y;                          
          $ExecutionDateTime =  $OCMRequest[0]->ExecutionDateTime; 
          $ExecutionDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $ExecutionDateTime)->format('Y-m-d H:i A');

                  
          $OCMRequestDetails = DB::table('OCMRequestDetails')
                       ->select('testprofiles.name','OCMRequestDetails.TestDescription') 
                          ->join('testprofiles', 'testprofiles.id', '=', 'OCMRequestDetails.TestID')  
                          ->where('OCMRequestDetails.RequestID', $request->rid)
                          ->where('OCMRequestDetails.RequestEpisodeID', $request->eid)->get();


         
          $results = DB::table('results')
                       ->select(
                                'results.Code',
                                'results.sampleid as PhlebotomySampleID',
                                'TestDefinitions.longname as test',
                                'Lists.Text as department',
                                'results.Code as code',
                                'results.result',
                                'results.Flags',
                                'results.Units',
                                'results.Analyser',
                                'results.NormalLow',
                                'results.NormalHigh',
                                'results.Comments'
                            )  
                          ->leftjoin('TestDefinitions', 'TestDefinitions.shortname', '=', 'results.Code')
                          ->leftjoin('Lists', 'Lists.id', '=', 'results.department')
                          ->whereIn('results.sampleid',$sampleIDs)
                          ->groupBy('results.Code')
                          ->orderBy('results.sampleid')
                          ->get(); 


        

            $data = [

                    'OCMRequest' => $OCMRequest,
                    'DoB' => $DoB,
                    'ExecutionDateTime' => $ExecutionDateTime,
                    'OCMRequestDetails' => $OCMRequestDetails,
                    'results' => $results           
                ];  
           return view('layouts.samplereport', compact('data'))->render();     
          
         } else {

              return response()->json(['error'=> 'No data found']);
         }
           

        } 
    } 



    public function ReportGenerator()
    {

                 return view ('reports');
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
        $criterianame=[];
        $aldpt=[];
        $totals=[];
        $analytename=[];
        $count2=0;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();  
        $Discipline1=$Discipline.'Results';
        $DisciplineTestDef=$Discipline.'TestDefinitions';
        $shortortest = "shortname";
         $sql2="SELECT DISTINCT($Criteria) FROM Demographics WHERE $Criteria <> '' AND SampleID IN (SELECT DISTINCT(SampleID) FROM $Discipline1 WHERE RunDate BETWEEN '$from' and '$to') ORDER BY $Criteria";

        $getlist0 = sqlsrv_query($conn_hq, $sql2);
        $count0=sqlsrv_has_rows($getlist0);

        if($count0>0){
            while($row0 = sqlsrv_fetch_array($getlist0, SQLSRV_FETCH_ASSOC))
            {
            $criterianame[] = $row0;
            }
        }
        
        if(str_contains($Discipline, "Bio") || str_contains($Discipline, "End") || str_contains($Discipline, "Imm") || str_contains($Discipline, "Coag")){
            if(str_contains($Discipline, "Coag")){
                $shortortest="TestName";
            }
            $sql ="select tb.$shortortest as shortname, tb.Code, count(tb.$shortortest) as counttestname from (select distinct bt.$shortortest, bt.Code from $DisciplineTestDef as bt, demographics as d, $Discipline1 as br where d.SampleID = br.SampleID AND bt.Code = br.code AND bt.InUse = 1 AND d.RunDate>='$from' and d.Rundate<='$to' AND d.$Criteria is not null AND bt.$shortortest is not null) as tb group by tb.$shortortest, tb.Code";
            $getlist1 = sqlsrv_query($conn_hq, $sql);
            $count1=sqlsrv_has_rows($getlist1);
            if($count1>0){
                
                while($row1 = sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC))
                {
                $aldpt[] = $row1;
                }
            }
        }
        else if(str_contains($Discipline, "Ext")){
            $sql3 ="select distinct bt.AnalyteName as shortname from ExternalDefinitions as bt, demographics as d, ExtResults as ext where d.SampleID = ext.SampleID AND bt.AnalyteName = ext.Analyte AND bt.InUse = 1 AND d.RunDate>='$from' and d.Rundate<='$to' AND d.$Criteria is not null AND bt.AnalyteName is not null";
            $getlist3 = sqlsrv_query($conn_hq, $sql3);
            $count3=sqlsrv_has_rows($getlist3);
            if($count3>0){
                
                while($row3 = sqlsrv_fetch_array($getlist3, SQLSRV_FETCH_ASSOC))
                {
                $aldpt[] = $row3;
                }
            }
        }
        else if(str_contains($Discipline, "Haem")){
            $aldpt[]['shortname'] = "WBC";
            $aldpt[]['shortname'] = "RetA";
            $aldpt[]['shortname'] = "ESR";
            $aldpt[]['shortname'] = "tRA";
            $aldpt[]['shortname'] = "Malaria";
            $aldpt[]['shortname'] = "Monospot";
            $aldpt[]['shortname'] = "Sickledex";
            $aldpt[]['shortname'] = "tASOT";

            $sql4 ="DROP TABLE [CustomTable]";
            $getlist4 = sqlsrv_query($conn_hq, $sql4);
          
            $sql5 ="SELECT DISTINCT D.$Criteria as choice,
            CASE WBC WHEN '' THEN 0 ELSE COUNT (WBC) END WBC,
            CASE RetA WHEN '' THEN 0 ELSE COUNT (RetA) END RetA,
            CASE ESR WHEN '' THEN 0 ELSE COUNT (ESR) END ESR,
            CASE tRA WHEN '' THEN 0 ELSE COUNT (tRA) END tRA,
            CASE Malaria WHEN '' THEN 0 ELSE COUNT (Malaria) END Malaria,
            CASE Monospot WHEN '' THEN 0 ELSE COUNT (Monospot) END Monospot,
            CASE Sickledex WHEN '' THEN 0 ELSE COUNT (Sickledex) END Sickledex,
            CASE tASOT WHEN '' THEN 0 ELSE COUNT (tASOT) END tASOT
            INTO CustomTable
            FROM HaemResults R, Demographics D WHERE
            D.SampleID = R.SampleID
            AND D.Rundate BETWEEN '$from' AND '$to'
            GROUP BY D.$Criteria, WBC, RetA, ESR, tRA, Malaria, Monospot, Sickledex, tASOT
            ORDER BY  D.$Criteria";
            $getlist5 = sqlsrv_query($conn_hq, $sql5);

            $sql6 = "SELECT choice, 
            SUM(WBC) WBC,  
            SUM(RetA) RetA,  
            SUM(ESR) ESR,  
            sum(tRA) tRA,  
            SUM(Malaria) Malaria,  
            SUM(Monospot) Monospot,  
            SUM(Sickledex) Sickledex,  
            SUM(tASOT) tASOT  
            FROM CustomTable group by choice";
            $getlist6 = sqlsrv_query($conn_hq, $sql6);
            $count6=sqlsrv_has_rows($getlist6);
            if($count6>0){
                while($row6 = sqlsrv_fetch_array($getlist6, SQLSRV_FETCH_ASSOC)){
                $criterianame[][$Criteria] = $row6['choice'];
                $totals[]= $row6['WBC'];
                $totals[] = $row6['RetA'];
                $totals[] = $row6['ESR'];
                $totals[] = $row6['tRA'];
                $totals[] = $row6['Malaria'];
                $totals[] = $row6['Monospot'];
                $totals[] = $row6['Sickledex'];
                $totals[] = $row6['tASOT'];
                }
            }
        }

        if(str_contains($Discipline, "Bio") || str_contains($Discipline, "End") || str_contains($Discipline, "Imm") || str_contains($Discipline, "Coag")){
            
            for ($i=0; $i < count($criterianame); $i++) { 
                $val = $criterianame[$i][$Criteria];
                    for ($j=0; $j < count($aldpt); $j++) { 
                    $val2 = $aldpt[$j]['Code'];
                    $sql7 = "SELECT COUNT($Discipline1.Code) AS Tot, Code FROM Demographics, $Discipline1 WHERE $Criteria = '$val' AND Code = '$val2' AND Demographics.RunDate BETWEEN '$from' AND '$to' AND Demographics.SampleID = $Discipline1.SampleID GROUP BY Code";
                    $getlist7 = sqlsrv_query($conn_hq, $sql7);
                    $count7=sqlsrv_has_rows($getlist7);
                    if($count7>0){
                        $row7 = sqlsrv_fetch_array($getlist7, SQLSRV_FETCH_ASSOC);
                        $totals[] = $row7['Tot'];
                    } else {
                        $totals[] = '-';
                    }
                }
            }
           
        } else if(str_contains($Discipline, "Ext")){
            for ($i=0; $i < count($criterianame); $i++) { 
                $val = $criterianame[$i][$Criteria];
                $sql8 = "SELECT COUNT(ExtResults.Analyte) As Tot   
                FROM Demographics, ExtResults WHERE   
                $Criteria = '$val'   
                AND Demographics.RunDate BETWEEN '$from' and '$to'   
                AND Demographics.SampleID = ExtResults.SampleID"; 
                //  AND ExtResults.Analyte ;
                $getlist8 = sqlsrv_query($conn_hq, $sql8);
                $count8=sqlsrv_has_rows($getlist8);
                if($count8>0){
                    while($row8 = sqlsrv_fetch_array($getlist8, SQLSRV_FETCH_ASSOC))
                    {
                    $totals[] = $row8['Tot'];
                    }
                }
            }
        }
        // return count($criterianame);
        // return ($aldpt);
        // return ($totals);
        
        $data=[
            'criterianame'=>$criterianame,
            'aldpt'=>$aldpt,
            'totals'=>$totals,
        ];

        return $data;
    }

}