<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;

class patienthistorybt extends Controller
{


    public static function index($id) {

        $patientdetails = DB::table('patientdetails')
        ->where('patnum',$id)
        ->where('AIDR','!=','')
        ->orderBy('sampleid','desc')
        ->limit(1)
         ->get();


         $sampleids = DB::table('patientdetails')
        ->where('patnum',$id)
         ->pluck('sampleid');


         $kleihauer = DB::table('kleihauer')
        ->whereIn('sampleid',$sampleids)
        ->orderBy('DateTime','desc')
         ->get();


     $btproducts = DB::table('btproducts')
        ->join('btaddons', 'btaddons.id', '=','btproducts.pid')
    
     
        ->select('btaddons.name','btproducts.*' )
        ->whereIn('sampleid',$sampleids)
        ->get();

        $data = [

                'patientdetails' => $patientdetails,
                'sampleids' => $sampleids,
                'btproducts' => $btproducts,
                'kleihauer' => $kleihauer
            ];

        return view('patienthistorybt')->with('data',$data);
       
    }
}
