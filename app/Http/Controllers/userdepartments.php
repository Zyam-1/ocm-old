<?php
  
namespace App\Http\Controllers;

use App;  
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use DB;
use Auth;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class userdepartments extends Controller
{

   
     public function index(Request $request)
    {



            $user = auth()->user();
            $userID = $user['id'];

         if ($request->ajax()) {

   
            $data = DB::table('userdepartments') 
                         ->select(

                            'userdepartments.id',
                            'userdepartments.name',
                            'userdepartments.description',
                            'userdepartments.InUse',
                            'userdepartments.created_at',
                            'userdepartments.updated_at',
                            'A.name as created_by',
                            'B.name as updated_by'

                            )
                         ->leftjoin('users AS A', 'A.id', '=', 'userdepartments.created_by')
                         ->leftjoin('users AS B', 'B.id', '=', 'userdepartments.updated_by');
                         


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
                    ->rawColumns(['action','InUse','fvrt'])
                    ->make(true);

                    
                  
        }

        $Lists = DB::table('Lists')->select('id','text','Default')->where('ListType','DPT')->where('InUse',1)->orderBy('ListOrder')->get();
        $SHL = DB::table('Lists')->select('id','text','Default')->where('ListType','SHL')->where('InUse',1)->orderBy('ListOrder')->get();
        $DGN = DB::table('Lists')->select('id','text','Default')->where('ListType','DGN')->where('InUse',1)->orderBy('ListOrder')->get();

          $data = [
            'Lists' => $Lists,
            'SHL' => $SHL,
            'DGN' => $DGN
          ];  
            
          return view ('userdepartments')->with('data',$data);
        
    }



     public function Department(Request $request)
    {



        if($request->id != '') {

          $data = DB::table('userdepartments')->where('id', $request->id)->get();
          return \Response::json($data);  
        } 
             

          
    } 



      public function delete(Request $request)
    {
     $id = $request->input('id'); 


     $log = DB::table('userdepartments')->select('name')->where('id',$id)->get();
     $controller = App::make('\App\Http\Controllers\activitylogs');
     $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'User Department "'.$log[0]->name.'" Deleted.']); 


     DB::table('userdepartments')->where('id', $id)->delete(); 


    }



     public function add(Request $request)
    {
        $id = DB::table('userdepartments')->max('id')+1;
        $name = $request->input('name');
        $description = $request->input('description');
        $InUse = $request->input('InUse');

         $user = auth()->user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:userdepartments,name',      
            'InUse' => 'required'
        ]);
     

             if ($validator->passes()) {



        DB::insert('insert into userdepartments (id, name, description, InUse,  created_at, created_by) values (?, ?, ?, ?, ?, ?)', 
            [$id, $name, $description, $InUse, date('Y-m-d H:i:s'), $user['id'] ] );  

             $controller = App::make('\App\Http\Controllers\activitylogs');
             $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'New User Department "'.$name.'" Added.']); 

            return response()->json(['success'=>'Data added.']);

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);

    }


      public function update(Request $request)
    {
        $id = $request->input('id');   
        $name = $request->input('name');         
        $description = $request->input('description');
        $InUse = $request->input('InUse');


         $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|unique:userdepartments,name,'.$id,     
            'InUse' => 'required'
        ]);

        if ($validator->passes()) {




            DB::update("
            update userdepartments 
            set 
            name = '$name', description = '$description',
            InUse = '$InUse', updated_at = '".date('Y-m-d H:i:s')."',  
            updated_by = '".$user['id']."'  where id =  '$id' 
            ");


            $controller = App::make('\App\Http\Controllers\activitylogs');
             $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'User Department "'.$name.'" Updated.']); 
            
            return response()->json(['success'=>'Info updated.']);
            
        }

            return response()->json(['error'=>$validator->errors()->first()]);
                
    } 


 
    

}