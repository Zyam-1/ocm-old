<?php
  
namespace App\Http\Controllers;
  
use DataTables;
use Validator;
use DB;
use Auth;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class patientsaudit extends Controller
{


     public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = DB::table('patientifsaudit')->select(
                                'patientifsaudit.*'
            );
                               

            return Datatables::of($data)

                    ->addIndexColumn()
                  
                    ->setRowId('Chart')
                    ->rawColumns(['action'])
                    ->make(true);
                  
        }

        return view ('patientsaudit');
        
    }



   

     

}