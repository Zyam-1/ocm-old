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

class bl1200code extends Controller
{


    public function index(Request $request)
    {



         if ($request->ajax()) {
            $data = DB::table('bl1200') ->select('id','code','text','updated_at','updated_by','created_at','created_by')->get();
                     


            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '
                    <div class="btn-group" role="group">
                    <button id="'.$row->id.'" title="Edit Clinician" class="update btn btn-primary">
                        <i class="bx bx-edit"></i>
                    </button>
                    <button type="button" title="Delete Clinician" id="'.$row->id.'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                    </button>
                        </div>
                        ';

                return $btn;
            }) 

            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);
          
}

        
            
          return view('bl1200');
        
    }


     public function getbl1200(Request $request)
    {

        if($request->id != '') {

          $data = DB::table('bl1200')->where('id', $request->id)->get();
          return \Response::json($data);  
        } 
          
    }  
 


    public function delete(Request $req)
    {
     $id= $req->id;
     DB::table('bl1200')->where('id', $id)->delete(); 
     return response()->json(['success'=>'Data Deleted.']);

    }

     public function add(Request $request)
    {
        $code = $request->code;
        $text = $request->text;
      

         $user = auth()->user();
        
   
     

            


        DB::insert('insert into bl1200(code,text, created_at, created_by) values (?, ?, ?, ?)', 
            [$code ,$text, date('Y-m-d H:i:s'), $user['id'] ] );  


            
    
             return response()->json(['success'=>'Data added.']);

       

    }


      public function update(Request $request)
    {
      
         $id = $request->id;   
        $code = $request->code;
        $text = $request->text;
         $user = auth()->user(); 
         DB::update("
            update bl1200
            set 
            code = '$code', 
            text= '$text', 
            updated_at = '".date('Y-m-d H:i:s')."',  
            updated_by = '".$user['id']."' 
             where id =  '$id' 
            ");
            return response()->json(['success'=>'Info updated.']);
                
    } 




}
