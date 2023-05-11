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

class bl1200mapping extends Controller
{



    public function index(Request $request)
    {


           

        
         if ($request->ajax()) {

                 if(!empty($request->facility))
                 
                  {


                    $data = DB::table('bl1200testmapping') 
                    ->select('bl1200testmapping.id',
                      'bl1200testmapping.BL1200code',
                      
                       'bl1200testmapping.created_at', 
                       'bl1200testmapping.updated_at',
                       
                       'facilities.name','bl1200.text','bl1200.code',
                      
                       'A.name as created_by',
                       'B.name as updated_by')
                           ->leftjoin('users AS A', 'A.id', '=', 'bl1200testmapping.created_by')
                           ->leftjoin('users AS B', 'B.id', '=', 'bl1200testmapping.updated_by')
                           ->leftjoin('facilities', 'facilities.id', '=', 'bl1200testmapping.FacilityID')
                           ->leftjoin('bl1200', 'bl1200.id', '=', 'bl1200testmapping.bl1200Code')
                         ->where('bl1200testmapping.FacilityID',$request->facility);

                   } else {


                    $data = DB::table('bl1200testmapping') 
                    ->select('bl1200testmapping.id',
                    'bl1200testmapping.BL1200code',
                      
                       'bl1200testmapping.created_at', 
                       'bl1200testmapping.updated_at',
                       
                       'facilities.name','bl1200.text','bl1200.code',
                      
                      
                       'A.name as created_by',
                       'B.name as updated_by')
                           ->leftjoin('users AS A', 'A.id', '=', 'bl1200testmapping.created_by')
                           ->leftjoin('users AS B', 'B.id', '=', 'bl1200testmapping.updated_by')
                           ->leftjoin('facilities', 'facilities.id', '=', 'bl1200testmapping.FacilityID')
                           
                           ->leftjoin('bl1200', 'bl1200.id', '=', 'bl1200testmapping.bl1200Code')
                          ->limit(0)
                          ->get();


                   }
                         
            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <button type="button" id="'.$row->id.'" title="Delete" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 

                    ->editColumn('created_at', function($data){
                      if($data->created_at != '') {

                        $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y H:i a'); return $created_at;
                        
                    }
                     })
                   ->editColumn('updated_at', function($data){ 
                        if($data->updated_at != '') {

                            $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d M Y H:i a'); return $updated_at;
                            
                        }
                     })

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

        $profiles = DB::table('facilities')->select('id','name')->orderBy('name')->get();

          $data = [
            'profiles' => $profiles
          ];  
            
          return view ('bl1200mapping')->with('data',$data);
        
    }





    public function index0(Request $request)
    {
           




            
         if ($request->ajax()) {

               
                    if(!empty($request->facility))
                 
                  {

                 $tests = DB::table('bl1200testmapping')->select('bl1200code')->where('FacilityID',$request->facility)->get(); 
                 $testsList = array();
                 foreach($tests as $test) {

                    $testsList[] = $test->bl1200code;

                 }  

                $data = DB::table('bl1200') 
                         ->select('bl1200.id',
                           'bl1200.text',
                           'bl1200.code',
                           
                            'bl1200.created_at', 
                            'bl1200.updated_at',
                           
                            'A.name as created_by',
                            'B.name as updated_by')
                                ->leftjoin('users AS A', 'A.id', '=', 'bl1200.created_by')
                                ->leftjoin('users AS B', 'B.id', '=', 'bl1200.updated_by')
                              
                                ->whereNotIn('bl1200.id', $testsList);

                  }  else {

                  $data = DB::table('bl1200') 
                    ->select('bl1200.id',
                      'bl1200.text',
                      'bl1200.code',
                      
                       'bl1200.created_at', 
                       'bl1200.updated_at',
                      
                       'A.name as created_by',
                       'B.name as updated_by')
                           ->leftjoin('users AS A', 'A.id', '=', 'bl1200.created_by')
                           ->leftjoin('users AS B', 'B.id', '=', 'bl1200.updated_by')
                          ->limit(0)
                          ->get();


                  }            
            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <button type="button" id="'.$row->id.'"  title="Add" class="add btn btn-warning"><i class="bx bx-plus"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
              
                    ->editColumn('created_at', function($data){
                      
                      
                     
                      if($data->created_at != '') {

                        $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y H:i a'); return $created_at;
                        
                    }
                    
                    })
                    
                    ->editColumn('updated_at', function($data){ 
                        if($data->updated_at != '') {

                            $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d M Y H:i a'); return $updated_at;
                            
                        }
                     })

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);
                    
                  
        }

            
          return view ('bl1200Mapping');
        
    }





     public function Map(Request $request)
    {

        if($request->id != '') {

          $data = DB::table('bl1200testmapping')->where('id', $request->id)->get();
          return \Response::json($data);  
        } 
             

          
    }  
 


    public function delete(Request $request)
    {
     $id = $request->input('id');   

     return DB::table('bl1200testmapping')->where('id', $id)->delete(); 

    }



     public function add(Request $request)
    {
        $id = DB::table('bl1200testmapping')->max('ID')+1;
        $profile = $request->input('facility');
        $test = $request->input('test');


         $user = auth()->user();
        
        $validator = Validator::make($request->all(), [      
            'facility' => 'required|unique:bl1200testmapping,FacilityID,NULL,id,BL1200Code,'.$test,
            'test' => 'required'
        ]);
     

         if ($validator->passes()) {


        DB::insert('insert into bl1200testmapping (id, FacilityID, BL1200Code, created_at, created_by) values (?, ?, ?, ?, ?)', 
            [$id, $profile, $test, date('Y-m-d H:i:s'), $user['id'] ] );  


         $Profile = DB::table('facilities')->select('name')->where('id',$profile)->get();
         $Test = DB::table('bl1200')->select('text')->where('id',$test)->get();


            return response()->json(['success'=>'Data added.']);

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);

    }





}