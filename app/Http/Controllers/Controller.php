<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SoapClient;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


      public function sendSMS($phone,$message)
    {

        $client = new SoapClient('http://www.smsgateway.ca/sendsms.asmx?WSDL');
        $parameters = new requests;

        $parameters->CellNumber = $phone;
        $parameters->AccountKey = '43rW10So727gw8E58mRL25Glmhp2CPzY';
        $parameters->MessageBody = $message;

        $Result = $client->SendMessage($parameters);

    } 


    public static function DateTime($value)
    {
        return date('d-m-Y H:i:s', strtotime($value)) ;
    }

     public static function Date($value)
    {
        return date('d-m-Y', strtotime($value)) ;
    }

     public static function DateJS($value)
    {
        return (date('d-m-Y', strtotime($value))) ;
    }


    public static function SQLConnect()
    {


      //  SQLCMD -S WIN-VSRLG0S17CC -U CSSQL -P Custom@321 -D CavanTest   -i "C:\Users\Custom Software\Downloads\sa.sql"
        //SQLCMD -U sa -i "C:\Users\Custom Software\Downloads\sa.sql"
        $serverName = 'DESKTOP-J2CIMNN';
        $DB = 'CavanTest';
        $uid = '';
        $pwd ='';


        $connectionInfo = array( "Database"=>"CavanTest",
                                 "UID"=>$uid,
                                 "PWD"=>$pwd,
                                 "Encrypt"=>true,
                                 "TrustServerCertificate"=>true,
                                 'ReturnDatesAsStrings'=> true);



        return $conn_hq = sqlsrv_connect($serverName, $connectionInfo);


       

    
    } 


public static function SQLConnect2()
    {

        $serverName = 'DESKTOP-J2CIMNN';
        $DB = 'CavanTransfusion';
        $uid = '';
        $pwd ='';


        $connectionInfo = array( "Database"=>"CavanTransfusion",
                                 "UID"=>$uid,
                                 "PWD"=>$pwd,
                                 "Encrypt"=>true,
                                 "TrustServerCertificate"=>true,
                                 'ReturnDatesAsStrings'=> true);



        return $conn_hq = sqlsrv_connect($serverName, $connectionInfo);


       

    
    } 
    public static function getroles()
    {
        $role = auth()->user()->role; 
     $per=[];
     $mod=[];
     $val=[];
         $permissions=DB::table('rolespermissions')->select('permissions','moduleName','value')->where('role',$role)->get();
         $j=0;
        for($i=0;$i<count($permissions);$i++)
        {
            $per[$j]=$permissions[$i]->permissions;
            $mod[$j]=$permissions[$i]->moduleName;
            $val[$j]=$permissions[$i]->value;
            $j++;
        }
       $data=[
        'per'=>$per,
        'mod'=>$mod,
        'val'=>$val
       ];
       return $data;
           
    }

        

}

