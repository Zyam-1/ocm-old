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

class subuserdepartments extends Controller
{

   
     public function index(Request $request)
    {



            $user = auth()->user();
            $userID = $user['id'];

         if ($request->ajax()) {

   
            $data = DB::table('usersubdepartments') 
                         ->select(

                            'usersubdepartments.id',
                            'userdepartments.name as department',
                            'usersubdepartments.name',
                            'usersubdepartments.description',
                            'usersubdepartments.InUse',
                            'usersubdepartments.created_at',
                            'usersubdepartments.updated_at',
                            'A.name as created_by',
                            'B.name as updated_by'

                            )
                         ->leftjoin('userdepartments', 'userdepartments.id', '=', 'usersubdepartments.department')
                         ->leftjoin('users AS A', 'A.id', '=', 'usersubdepartments.created_by')
                         ->leftjoin('users AS B', 'B.id', '=', 'usersubdepartments.updated_by');
                         


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

        $userdepartments = DB::table('userdepartments')->where('InUse',1)->orderBy('name')->get();
        



          $data = [
            'userdepartments' => $userdepartments
          ];  
            
          return view ('subuserdepartments')->with('data',$data);
        
    }



     public function SubDepartment(Request $request)
    {



        if($request->id != '') {

          $data = DB::table('usersubdepartments')->where('id', $request->id)->get();
          return \Response::json($data);  
        } 
             

          
    } 



      public function delete(Request $request)
    {
     $id = $request->input('id'); 


     $log = DB::table('usersubdepartments')->select('name')->where('id',$id)->get();
     $controller = App::make('\App\Http\Controllers\activitylogs');
     $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'User Sub Department "'.$log[0]->name.'" Deleted.']); 


     DB::table('usersubdepartments')->where('id', $id)->delete(); 


    }



     public function add(Request $request)
    {
        $id = DB::table('usersubdepartments')->max('id')+1;
        $name = $request->input('name');
        $description = $request->input('description');
        $department = $request->input('department');
        $InUse = $request->input('InUse');

         $user = auth()->user();
        
            $validator = Validator::make($request->all(), [  
                'name' => 'required|unique:usersubdepartments,name,NULL,id,department,'.$department,  
                'department' => 'required',
                'InUse' => 'required'
            ]);
     

         if ($validator->passes()) {



        DB::insert('insert into usersubdepartments (id, name, description, department, InUse,  created_at, created_by) values (?, ?, ?, ?, ?, ?, ?)', 
            [$id, $name, $description, $department, $InUse, date('Y-m-d H:i:s'), $user['id'] ] );  

             $controller = App::make('\App\Http\Controllers\activitylogs');
             $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'New User Sub Department "'.$name.'" Added.']); 

            return response()->json(['success'=>'Data added.']);

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);

    }


      public function update(Request $request)
    {
        $id = $request->input('id');   
        $name = $request->input('name');         
        $description = $request->input('description');
        $department = $request->input('department');
        $InUse = $request->input('InUse');


         $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|unique:usersubdepartments,name,'.$id, 
            'name' => 'required|unique:usersubdepartments,name,'.$id.',id,department,'.$department,     
            'department' => 'required',
            'InUse' => 'required'
        ]);

        if ($validator->passes()) {




            DB::update("
            update usersubdepartments 
            set 
            name = '$name', description = '$description', department = '$department',
            InUse = '$InUse', updated_at = '".date('Y-m-d H:i:s')."',  
            updated_by = '".$user['id']."'  where id =  '$id' 
            ");


            $controller = App::make('\App\Http\Controllers\activitylogs');
             $data = $controller->callAction('addLogs', [0,0,0,0,0,'User Departments', 'User Sub Department "'.$name.'" Updated.']); 
            
            return response()->json(['success'=>'Info updated.']);
            
        }

            return response()->json(['error'=>$validator->errors()->first()]);
                
    } 


 
    

}