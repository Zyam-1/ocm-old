<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App;

class business extends Controller
{


    public static function businessinfo()
    {
        
        return $data = DB::table('business')->select('currency','file','name')->get();

    }

    public  function business()
    {
         

         $business = DB::table('business')->where('id', '1')->get();
         $countries = DB::table('Lists')->select('Text')->where('ListType', 'Countries')->where('InUse', 1)->orderBy('Text')->get();
         $counties = DB::table('Lists')->select('Text')->where('ListType', 'Counties')->where('InUse', 1)->orderBy('Text')->get();
         $towns = DB::table('Lists')->select('Text')->where('ListType', 'Towns')->where('InUse', 1)->orderBy('Text')->get();


          $data = [
                    'business' => $business,
                    'countries' => $countries,
                    'counties' => $counties,
                    'towns' => $towns
          ]; 


        return view ('business')->with('data',$data);
    }

     public function updateBusinessInfo(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $fax = $request->input('fax');
        $vat = $request->input('vat');
        $website = $request->input('website');
        $destinationPath = public_path('images');
        $file = $request->file('file');

        if($file != '') {

         $extension = $request->file->getClientOriginalExtension();
         
             
        if($request->file('file')->getSize() > 4000000) {

            return response()->json(['error'=> 'Image size should be less than 4mb']);
     
        }
        

       
        $filename = uniqid().'.'.$extension;
        $file->move($destinationPath,$filename);
        $filename = ", file = '$filename'";
        } else {
            $filename = '';
        }  


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
     
        if ($validator->passes()) {
            
        DB::update("
            update business 
            set 
            name = '$name', email = '$email', phone = '$phone', fax = '$fax', vat = '$vat', website = '$website' $filename 
            ");


           $controller = App::make('\App\Http\Controllers\activitylogs');
           $data = $controller->callAction('addLogs', [0,0,0,0,0,'Business','Business Porfile Updated']); 


            return response()->json(['success'=>'Business info updated']);
            

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);
    }

     public function updateBusinessAddress(Request $request)
    {


        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $zip = $request->input('zip');
        
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);
     
        if ($validator->passes()) {
            
        DB::update("
            update business 
            set 
            address = '$address', city = '$city', state  = '$state', country = '$country', zip = '$zip'
            ");


         $controller = App::make('\App\Http\Controllers\activitylogs');
           $data = $controller->callAction('addLogs', [0,0,0,0,0,'Business','Business Address Updated']); 



            return response()->json(['success'=>'Business address updated.']);
            

        }
        
        return response()->json(['error'=>$validator->errors()->first()]);
    }





    // public function cleanDatabase(Request $request)
    // {
 

    //     DB::table('activitylog')->delete(); 
    //     DB::table('results')->delete(); 
    //     DB::table('OCMPhlebotomy')->delete(); 
    //     DB::table('OCMRequest')->delete(); 
    //     DB::table('OCMRequestDetails')->delete(); 
    //     DB::table('OCMRequestQuestionsDetails')->delete(); 
    //     DB::table('OCMRequestTestsDetails')->delete(); 
    //     DB::table('observations')->delete(); 
    //     DB::table('signoffsmessages')->delete(); 
    //     //DB::table('requestreports')->delete(); 
    //     // DB::table('reports')->delete(); 
    //     // DB::table('reportsOptions')->delete(); 
    //     // DB::table('reportFilterOptions')->delete(); 
    //     // DB::table('reportpiecharts')->delete(); 
        

    //         $connectionInfo_hq = array("Database"=>"CavanTest", "Uid"=>"LabUser", "PWD"=>"DfySiywtgtw$1>)*",'ReturnDatesAsStrings'=> true);
    //         $conn_hq = sqlsrv_connect('CHLAB02', $connectionInfo_hq);

    //         // $connectionInfo_hq = array("Database"=>"Cavan", "Uid"=>"LabUser", "PWD"=>"DfySiywtgtw$1>)*",'ReturnDatesAsStrings'=> true);
    //         // $conn_hq = sqlsrv_connect('78.46.156.93, 1433', $connectionInfo_hq);

    //         $tsql = "delete from ocmRequestDetails";
    //         sqlsrv_query($conn_hq, $tsql);

    //         $tsql = "delete from ocmRequest";
    //         sqlsrv_query($conn_hq, $tsql);

    //         $tsql = "delete from ocmDemographic";
    //         sqlsrv_query($conn_hq, $tsql);




    //     return response()->json(['success'=>'Database Cleaned.']);
            

    // }        


}
