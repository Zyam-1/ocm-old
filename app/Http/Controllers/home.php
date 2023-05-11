<?php
     
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
Use Carbon\Carbon;
use DateTime;

class home extends Controller
{
    
     public function updateThemeInfo(Request $request)
    {

          if($request->limit == 'all') {

            $sql = DB::update("update users  set 

                            colorscheme = '".substr($request->colorscheme, 1)."',
                            font = '".$request->font."',
                            font_link = '".$request->font_link."',
                            font_weight = '".$request->font_weight."',
                            resolution = '".$request->resolution."' ");   

             return response()->json(['success'=>'Changes applied to all users.']);


          } else {

            $user = auth()->user();
            $sql = DB::update("update users  set 

                            colorscheme = '".substr($request->colorscheme, 1)."',
                            font = '".$request->font."',
                            font_link = '".$request->font_link."',
                            font_weight = '".$request->font_weight."',
                            resolution = '".$request->resolution."'

                            where id = '".$user->id."' "); 

              return response()->json(['success'=>'Changes applied successfully.']);                                  

          }
          

           

    }

    public function getDepartmentStates(Request $request)
    {
        
            $user = auth()->user();

             $Self_Created = '';

             $BTSelf_Created = '';
            
            
            if($request->data > 0) {


                   $criticalResults = DB::table('signoffsmessages')
                                    ->where('userID',$user->id)

                                    ->where('datetimeread','=',null)->count();

                   $btRequestsThisWeek = DB::table('OCMRequest')
                                      ->when(!empty($BTSelf_Created) , function ($query) use($user){
                                                    
                                            return $query->where('RequestCreatedBy',$user->id);

                                        })
                                      ->whereBetween('ExecutionDateTime', 
                                            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                                        ) 
                                      ->where('RequestWardID', $request->data)
                                      ->where('RequestType', 'BTRequest')
                                      ->count();


                   $requestsThisWeek = DB::table('OCMRequest')
                                      ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                            return $query->where('RequestCreatedBy',$user->id);

                                        })
                                      ->whereBetween('ExecutionDateTime', 
                                            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                                        ) 
                                      ->where('RequestWardID', $request->data)
                                      ->where('RequestType', 'Request')
                                      ->count();

                    $pendingRequestsThisWeek = DB::table('OCMRequest')
                                      ->where('RequestState', '=', 'In Progress')
                                      ->where('RequestWardID', $request->data)
                                      ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                            return $query->where('RequestCreatedBy',$user->id);

                                        })
                                      ->count();
                    
                 $ReqestIDs = DB::table('OCMRequest')
                                      ->where('RequestWardID', $request->data)
                                      ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                              return $query->where('RequestCreatedBy',$user->id);

                                        })
                                      ->pluck('ReqestID');

                    $unreadResults = DB::table('results')
                          ->whereIn('request',$ReqestIDs)  
                          ->where('SignOffBy',null)
                          ->count();  
                                             



                         $data = [

                                 'btRequestsThisWeek' => $btRequestsThisWeek,
                                 'requestsThisWeek' => $requestsThisWeek,
                                 'pendingRequestsThisWeek' => $pendingRequestsThisWeek,
                                 'unreadResults' => $unreadResults,
                                 'messages' => $criticalResults
                         ];

                         return \Response::json($data);                         



            }


    }   


    public function index(Request $req)
    {
   
      $data = $req->session()->get('data');
     
      $user = auth()->user();

        $Self_Created = '';

        $BTSelf_Created = '';

      $RequestWardIDs = \DB::table('ocmrequest')
        ->select('RequestWardID', \DB::raw("COUNT('RequestWardID') AS post_count"))
        ->orderBy('post_count', 'desc')
        ->groupBy('RequestWardID')
        ->take(5)
        ->get();

        $RequestWardIDsArray = [];

        foreach($RequestWardIDs as $RequestWardID) {

                $RequestWardIDsArray[] = $RequestWardID->RequestWardID;
        }

        $wards = DB::table('wards')
                          ->whereIn('id',$RequestWardIDsArray)->select('Text','id')->get();

       
          $RequestWardIDs2 = DB::table('ocmrequest')
                          // ->where('RequestCreatedBy',$user->id)
                          ->groupBy('RequestWardID')->pluck('RequestWardID'); 

          $allwards = DB::table('wards')
                          ->whereIn('id',$RequestWardIDs2)->orderBy('Text')->select('Text','id')->get();
                                                            

        $criticalResults = DB::table('signoffsmessages')
                            ->where('userID',$user->id)
                            ->where('datetimeread','=',null)->count();

       $btRequestsThisWeek = DB::table('OCMRequest')
                                       ->whereBetween('ExecutionDateTime', 
                                            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                                        )  
                                      ->when(!empty($BTSelf_Created) , function ($query) use($user){
                                                    
                                            return $query->where('RequestCreatedBy',$user->id);

                                        })
                                      ->where('RequestType', 'BTRequest')
                                      ->count();


      $requestsThisWeek = DB::table('OCMRequest')
                          
                           ->whereBetween('ExecutionDateTime', 
                                            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                                        )  
                           ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                  return $query->where('RequestCreatedBy',$user->id);

                            })
                          ->where('RequestType', 'Request')
                          ->count();

        $pendingRequestsThisWeek = DB::table('OCMRequest')
                          ->where('RequestState', '=', 'In Progress')
                          
                          ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                  return $query->where('RequestCreatedBy',$user->id);

                            })

                          ->count();
        
         $ReqestIDs = DB::table('OCMRequest')
                          ->where('RequestState', 'Results Ready')
                          ->where('RequestType', 'Request')
                          ->when(!empty($Self_Created) , function ($query) use($user){
                                                    
                                  return $query->where('RequestCreatedBy',$user->id);

                            })

                          ->pluck('ReqestID');


       $unreadResults1 = DB::table('results')
                          ->where('SignOffBy',null)
                         
                          ->whereIn('request',$ReqestIDs)
                  
                          ->count();  


         $unreadResults2 = DB::table('results')
                          ->where('SignOffBy',"")
                          ->whereIn('request',$ReqestIDs)
                          
                          ->count();   

        $unreadResults =  $unreadResults1+$unreadResults2;                                                                        


                   



                    $now = Carbon::now();
                    $date =  $now->format('d-m-Y'); 
                    $reports = DB::table('reports')->where('dashboard', 1)->get();

                    if(count($reports) > 0) {

                        foreach($reports as $key => $report) {


                            if($report->report == 'Results') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'results'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report->id)
                    ->get();

                  }


                  if($report->report == 'Activity Logs') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'ActivityLog'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report->id)
                    ->get();

                  }

                  if($report->report == 'Samples') {

                     $reportsOptions = DB::table('reportsOptions')->select('reportsOptions.column_','reportsOptions.columnfilter','reportsOptions.sorting','foreignKeys.table2UniqueName as table2','foreignKeys.value2')
                    ->leftJoin('foreignKeys', function($join)
                         {
                             $join->on('foreignKeys.value1', '=', 'reportsOptions.column_');
                             $join->on('foreignKeys.table1', '=', DB::raw("'OCMRequestTestsDetails'"));
                         })
                    ->orderBy('reportsOptions.id')
                    ->where('reportsoptions.rid', $report->id)
                    ->get();

                  }
         

                    
                    $reportFilterOptions = DB::table('reportFilterOptions')->where('rid', $report->id)->get();

                    $reports[$key] = [

                            'date1' => $date,
                            'date2' => $date,
                            'id' => $report->id,
                            'title' => $report->name,
                            'interface' => $report->interface,
                            'report' => $report->report,
                            'reportsOptions' => $reportsOptions,
                            'reportFilterOptions' => $reportFilterOptions
                        ];

                        }

                    }

                  
        

                    $data = [

                            'wards' => $wards,
                            'allwards' => $allwards,
                            'criticalResults' => $criticalResults,
                            'btRequestsThisWeek' => $btRequestsThisWeek,
                            'requestsThisWeek' => $requestsThisWeek,
                            'pendingRequestsThisWeek' => $pendingRequestsThisWeek,
                            'unreadResults' => $unreadResults,
                            'reports' => $reports
                        ]; 



    
                    return view ('home')->with('data',$data);
    }

    public function dashboardInfo(Request $request)
    {


        $user = auth()->user();
        $now = Carbon::now();

        if($request->duration == 'This Week') {

        $weekStartDate = $now->startOfWeek()->format('d-m-Y');
        $weekEndDate = $now->endOfWeek()->format('d-m-Y');

        }

        if($request->duration == 'Last Week') {

        $weekStartDate = $now->startOfWeek()->subWeek()->format('d-m-Y');
        $weekEndDate = $now->endOfWeek()->format('d-m-Y');

        }

        if($request->duration == 'This Month') {

        $weekStartDate = $now->format('Y-m-1');
        $weekEndDate = $now->format('Y-m-t');

        }

        if($request->duration == 'Last Month') {

        $weekStartDate = $now->subMonth()->format('Y-m-1');
        $weekEndDate = $now->format('Y-m-t');

        }

         if($request->duration == 'Last Three Months') {

        $weekStartDate = $now->startOfMonth()->subMonth(2)->format('d-m-Y');
        $weekEndDate = \Carbon\Carbon::now()->endOfMonth()->toDateString();

        }

              
        


        if($request->duration == 'This Year' || $request->duration == 'Last Year') {

        
         if($request->duration == 'This Year') { 


        $weekStartDate = \Carbon\Carbon::now()->format('Y-01-01');
        $weekEndDate = \Carbon\Carbon::now()->format('Y-12-31');

         } elseif($request->duration == 'Last Year') {


        $weekStartDate = \Carbon\Carbon::now()->subYear()->format('Y-01-01');
        $weekEndDate = \Carbon\Carbon::now()->format('Y-12-31');
         
         }    

        $begin = new DateTime( $weekStartDate );
        $end   = new DateTime( $weekEndDate );


         $sr = 0;
         $sr2 = 0;
        for($i = $begin; $i <= $end; $i->modify('+1 Month')){


               $dateM = $i->format("m"); 
               $dateY = $i->format("Y"); 
               $data = DB::table('OCMRequestDetails')
               ->whereMonth('ExecutionDateTime',$dateM)
               ->whereYear('ExecutionDateTime',$dateY)
               ->pluck('id');
               
               if($data){

               $myProfiles[] = array($dateM =>$data);
               $labels[] = $i->format("M Y"); 
               $values[] = count($myProfiles[$sr++][$dateM]); 
               
               } 

               $data2 = DB::table('OCMRequest')
               ->whereMonth('ExecutionDateTime',$dateM)
               ->whereYear('ExecutionDateTime',$dateY)->pluck('id');
               
               if($data2) {

               $myRequests[] = array($dateM =>$data); 
               $labels2[] = $i->format("d-m-Y"); 
               $values2[] = count($myRequests[$sr2++][$dateM]); 
               
               } 

                
        } 



        } else {


        $begin = new DateTime( $weekStartDate );
        $end   = new DateTime( $weekEndDate );    


        $sr = 0;
        $sr2 = 0;
        for($i = $begin; $i <= $end; $i->modify('+1 day')){


               $date = $i->format("d-m-Y"); 
               $data = DB::table('OCMRequestDetails')
               ->whereDate('ExecutionDateTime',$date)->pluck('id');
               
               if($data) {

               $myProfiles[] = array($date =>$data);
               $labels[] = $i->format("d-m-Y"); 
               $values[] = count($myProfiles[$sr++][$date]); 
               
               } 

               $data2 = DB::table('OCMRequest')
               ->whereDate('RequestCreatedDateTime',$date)->pluck('id');
               
               if($data2) {

               $myRequests[] = array($date =>$data); 
               $labels2[] = $i->format("d-m-Y"); 
               $values2[] = count($myRequests[$sr2++][$date]); 
               
               } 
                
        }      

        }
                                        
         $profiles = [

                'labels' => $labels,
                'values' => $values,
                'sum' => array_sum($values),
                'duration' => $request->duration
         ];


          $myRequests = [

                'labels' => $labels2,
                'values' => $values2,
                'duration' => $request->duration,
                'sum' => array_sum($values2)
         ];




        $topprofiles = DB::table('OCMRequestDetails')
        ->select('testprofiles.name', DB::raw('COUNT(OCMRequestDetails.id) as count'))
        ->leftjoin('testprofiles', 'testprofiles.id', '=', 'OCMRequestDetails.TestID')
        ->whereBetween('ExecutionDateTime', [$weekStartDate, $weekEndDate])
        ->groupBy('TestID')
        ->orderBy(DB::raw('COUNT(OCMRequestDetails.id)'), 'DESC')
        ->take(5)
        ->get();

         $labels = array();
         $values = array();           
        
         if(count($topprofiles) > 0) {

                foreach ($topprofiles as $key => $topprofile) {
                        
                      $labels[] = $topprofile->name;  
                      $values[] = $topprofile->count;  
                }

         }   



        $topprofiles = [

                'labels' => $labels,
                'values' => $values,
                'duration' => $request->duration
         ];



        $ids = DB::table('OCMRequest')
         ->whereBetween('ExecutionDateTime', [$weekStartDate, $weekEndDate])->pluck('ReqestID');

         $toptests = DB::table('OCMRequestTestsDetails')
        ->select('TestDefinitions.longname', DB::raw('COUNT(OCMRequestTestsDetails.id) as count'))
        ->leftjoin('TestDefinitions', 'TestDefinitions.id', '=', 'OCMRequestTestsDetails.test')
        ->whereIn('request',$ids)
        ->groupBy('OCMRequestTestsDetails.test')
        ->orderBy(DB::raw('COUNT(OCMRequestTestsDetails.id)'), 'DESC')
        ->take(5)
        ->get();

         $labels = array();
         $values = array();           
        
         if(count($toptests) > 0) {

                foreach ($toptests as $key => $toptest) {
                        
                      $labels[] = $toptest->longname;  
                      $values[] = $toptest->count;  
                }

         }   



        $toptests = [

                'labels' => $labels,
                'values' => $values,
                'duration' => $request->duration
         ];





         $data = [

                 'myRequests' => $myRequests,
                 'profiles' => $profiles,
                 'topprofiles' => $topprofiles,
                 'toptests' => $toptests
         ];

         return \Response::json($data);


    }

   


}