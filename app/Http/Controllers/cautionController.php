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
class cautionController extends Controller
{
    
            function cautionScan(Request $request){
            
                 $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

           
                $requestid=[];
                $carr=[];
                $data=[];
                $checkedtrans=[];
                $a=0;
                $b=0;

                $sql2="select * from ocmRequestDetails where DepartmentID = 'BT'  and transA is null and (status ='Process' or status is null) order by sampleid desc";
                $results1 = sqlsrv_query( $conn_hq, $sql2); 
                while ($rows2 = sqlsrv_fetch_array($results1, SQLSRV_FETCH_ASSOC)) {
                    $requestid[$a] = $rows2['RequestID'];
                    $data[$a] = $rows2;
                    $checkedtrans[$a]=0;
                    $a++;
                }

                // return $data;

                for ($i=0; $i < count($requestid); $i++) { 
                    $sql1="select Chart,PatName from ocmRequest where RequestID = '$requestid[$i]'";
                    $results0 = sqlsrv_query( $conn_hq, $sql1); 
                    while ($rows1 = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC)) {
                        $carr[$b] = $rows1;
                        $b++;
                    }                
                }

                $requestid2=[];
                $carr2=[];
                $data2=[];
                $a=0;
                $b=0;

                $sql3="select * from ocmRequestDetails where status != 'Issued' and transA = 1 and DepartmentID = 'BT' order by SampleDate desc";
                $results2 = sqlsrv_query( $conn_hq, $sql3); 
                while ($rows3 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)) {
                    $requestid2[$a] = $rows3['RequestID'];
                    $data2[$a] = $rows3;
                    $a++;
                }

                for ($i=0; $i < count($requestid2); $i++) { 
                    $sql4="select Chart,PatName from ocmRequest where RequestID = '$requestid2[$i]'";
                    $results3 = sqlsrv_query( $conn_hq, $sql4); 
                    while ($rows4 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC)) {
                        $carr2[$b] = $rows4;
                        $b++;
                    }                
                }
               
            return view('BTBS.cautiontestsystem', ['data'=>$data,'carr'=>$carr, 'data2'=>$data2, 'carr2'=>$carr2]);
        }
        
        public function passSample(Request $request){

             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    





            $getOcmReqDArray=[];
            $conn_hq2 = \App\Http\Controllers\Controller::SQLConnect2();

            if(!$conn_hq2) {
                  die( print_r( sqlsrv_errors(), true));
            }

           

            $i=0;
            $j=0;
            $requestid3 = "";
            $chart = "";
            $getSampleid = $request->archeckedSamples;

            $currentDate = date("Y-m-d H:i:s");

            foreach($getSampleid as $sa){
                $sql2 = "select * from ocmRequestDetails where SampleID = '$sa'";
                $results = sqlsrv_query($conn_hq, $sql2);
                $count0 = sqlsrv_has_rows($results);
                if($count0 > 0){
                    $rows2 = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
                    $requestid3 = $rows2['RequestID'];
                    $recevieddate = \Carbon\Carbon::parse($rows2['recevieddate']);
                }

                $sql3 = "select * from ocmRequest where RequestID = '$requestid3'";
                $results1 = sqlsrv_query($conn_hq, $sql3);
                $rows3 = sqlsrv_fetch_array($results1, SQLSRV_FETCH_ASSOC);
                $count1 = sqlsrv_has_rows($results1);
                if($count1 > 0){
                    $chart = $rows3['Chart'];
                    $ward = $rows3['Ward'];
                    $clinician = $rows3['Clinician'];
                    $addr0 = $rows3['Addr0'];
                    $addr1 = $rows3['Addr1'];
                    $addr2 = $rows3['Addr2'];
                    $addr3 = $rows3['Addr3'];
                    $hospital = $rows3['Hospital'];
                    $sampledate = $rows3['SampleDate'];
                    $gp = $rows3['GP'];
                    $rooh = $rows3['RooH'];
                    $aande = $rows3['AandE'];
                }

                $sql4 = "select * from PatientIFs where Chart = '$chart'";
                $results2 = sqlsrv_query($conn_hq, $sql4);
                $rows4 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC);
                $count2 = sqlsrv_has_rows($results2);

                if($count2 > 0){
                    $PatName = $rows4['PatName'];
                    $sex = $rows4['Sex'];
                    $dob = $rows4['DoB'];
                    $getdobyear1 = explode('-', $dob);
                    $patsurname = $rows4['PatSurName'];
                    $patforename = $rows4['PatForeName'];
                    $getcurrentYear = date("Y");
                    $age1 = $getcurrentYear - $getdobyear1[0];
                    $age = $age1.$sex;
                }

                $sql5 = "insert into PatientDetails(patnum, name, ward, clinician, addr1, addr2, addr3, addr4, sex, age, hold, dat0, dat1, dat2, dat3, dat4, dat5, dat6, dat7, dat8, dat9, SampleDate, DateTime, DateReceived, PatSurName, PatForeName, SampleID, labnumber,  Hospital, GP, RooH, AandE, autolog, DoB) values('$chart', '$PatName', '$ward', '$clinician', '$addr0', '$addr1', '$addr2', '$addr3', '$sex', '$age', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$sampledate',  '$currentDate', '$recevieddate', '$patsurname', '$patforename', '$sa', '$sa', '$hospital', '$gp', '$rooh', '$aande', 0, '$dob')";
                $results3 = sqlsrv_query($conn_hq2, $sql5);
                $rows5 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC);


                $sql6 = "update ocmRequestDetails set trans = 1, status = 'Process' where SampleID = '$sa'";
                sqlsrv_query( $conn_hq, $sql6);
            }
            return response()->json(['success'=>true]);
        }

        public function passSampleRequested(Request $request){
            
             $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    


            $getid = $request->archeckedSamples2;

            foreach ($getid as $id) {
                $sql6 = "update ocmRequestDetails set status = 'Process' where ID = '$id'";
                sqlsrv_query( $conn_hq, $sql6);
            }

            return response()->json(['success'=>true]);
        }

        public function getview(){
            return view('BTBS.cautiontestsystem');
        }
        public function autogenerate($id = Null){


            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     

            $sql="Select * from  BioTestDefinitions";
            $query=sqlsrv_query($conn_hq,$sql);
            $count2 = sqlsrv_has_rows($query);
            
            $mydata=[];
            $i=0;

            if($count2 > 0){

            while($rows4 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC) ){
               $mydata[$i] = $rows4;
               $i++;
            }

            }
            $mydata2=[];
            $j=0;

          if($id != ''){

             $sql2="Select * from  AutoComments where Parameter='$id' ";
            $query2=sqlsrv_query($conn_hq,$sql2);
            $count3 = sqlsrv_has_rows($query2);
            


            if($count3 > 0){

            while($rows5 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC) ){
               $mydata2[$j] = $rows5;
               $j++;
            }

            }else{
            $mydata2=[''];
        
          }
            $sql2="Select * from  BioTestDefinitions where Code='$id'";
            $query2=sqlsrv_query($conn_hq,$sql2);
            $count3 = sqlsrv_has_rows($query2);
            
            $mydata3=[];
            $k=0;

            if($count3 > 0){

            while($rows5 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC) ){
               $mydata3[$k] = $rows5;
               $k++;
            }

            }

         
          }else{
            $mydata2=[''];
            $mydata3=[''];
        
          }


  

            
    
    return view('autogenerate')->with('mydata',$mydata)->with('mydata2',$mydata2)->with('mydata3',$mydata3);
}
public function locwardlist(Request $req, $id=NULL){

    $wards = [];
    $data = 0;
    $rowsedit = "";
    
    
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    


           if ($req->ajax()) {

              $pageno = $req->page;
              $search= $req->search;
               if($search !=''){
                      

        $sql2 = "SELECT * FROM Wards where (Code Like '%$search%' OR Text Like '%$search%'  OR InUse Like '%$search%' OR HospitalCode Like '%$search%' OR FAX Like '%$search%' OR ListOrder Like '%$search%' OR PrinterAddress Like '%$search%'  OR Location Like '%$search%')";
            $query2=sqlsrv_query($conn_hq,$sql2);
            $count = sqlsrv_has_rows($query2);

               }

        else{
     
     $sql2 = " DECLARE @PageNumber AS INT DECLARE @RowsOfPage AS INT DECLARE @MaxTablePage AS FLOAT SET @PageNumber=".$pageno." SET @RowsOfPage=10 
            SELECT * FROM Wards ORDER BY Text OFFSET (@PageNumber-1)*@RowsOfPage ROWS FETCH NEXT @RowsOfPage ROWS ONLY";

               }
           
 


            $query2=sqlsrv_query($conn_hq,$sql2);
            // $count = sqlsrv_has_rows($query2);

            // if ($count > 0){
                while($rows = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)){
                    $wards[$data] = $rows;
                    $data++;
                }
                return Datatables::of($wards)
                ->addIndexColumn()
                ->addColumn('action', function($row){
 
                       $btn = '
                            <div class="btn-group" role="group">
                            <a title="Edit Product"  class="btn btn-primary"  href="/ocm/LocWardList/'.$row['Text'].'"  >
                             <i class="bx bx-edit"></i>
                            </a>
                            <a  type="button"  id="'.$row['Text'].'" title="Delete Product" class="delete btn btn-dark"><i class="bx bx-x-circle" ></i>
                            </a>
                             </div>
                              ';

                        return $btn;
                }) 

                ->setRowId('')
                ->rawColumns(['action'])
                ->make(true);
                // return response()->json($rows);
            // }
        }



        if($id!=NULL){

             $sqledit = "SELECT * from Wards where Text = '$id'";
            $query3=sqlsrv_query($conn_hq,$sqledit);
            $count3 = sqlsrv_has_rows($query3);

            if($count3>0){
            $rowsedit = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC);
            }
        }


  $sql3="SELECT COUNT(Text) as TextCount  FROM Wards;";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['TextCount'];



    return view('newward' )->with('rowsedit', $rowsedit)->with('rows7', $rows7);
}

public function indexWard(Request $req, $id = NULL){

    

    $code= $req->code;
    $fax= $req->fax;
    $ward= $req->ward;
    $printer= $req->printer;
    $textWard= $req->textWard;

    $ward1 = $req->ward1;



    $wards = [];
    $data = 0;

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

           $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'fax' => 'required',
        'ward' => 'required',
        'printer' => 'required',
  

        ]);


           
            
            $sqlcheck = "Select * from Wards where Text = '$ward1'";
            $querycheck=sqlsrv_query($conn_hq,$sqlcheck);
            $countcheck = sqlsrv_has_rows($querycheck);

              if ($validator->passes()) {

            if($countcheck > 0){

            $rowsedit = sqlsrv_fetch_array($querycheck, SQLSRV_FETCH_ASSOC);
            $textcheck = $rowsedit['Text'];
            

            $sql="UPDATE Wards set Code = '$code',Text = '$ward',FAX = '$fax',PrinterAddress='$printer' where Text = '$ward1'";
            $query=sqlsrv_query($conn_hq,$sql);
              return response()->json(['success'=>'Data Updated Successfully']);

            }


            else{

                

             $sql="INSERT INTO Wards (Code,Text,FAX,InUse,PrinterAddress) values('$code','$ward','$fax',1,'$printer')";
            $query=sqlsrv_query($conn_hq,$sql);
              return response()->json(['success'=>'Data Saved Successfully']);
            }



       }  else {
    return response()->json(['error'=>$validator->errors()->first()]);
}
         

}





public function LocWardListdel(Request $req){


   
    $ward= $req->wardtext;

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }


        $sqldel = "DELETE from Wards where Text = '$ward'";
        $query=sqlsrv_query($conn_hq,$sqldel);

        // if($query){

        //     return response()->json(['success'=>true]);
        // }

}
public function autogenedel($id){
 
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }

        $sqldel = "DELETE from AutoComments where ListOrder = '$id'";
        $query=sqlsrv_query($conn_hq,$sqldel);
        // return redirect('AutoGenerate/{id?}');
}
public function testsequence(){
    return view('testsequence');
}
public function rerundays(){
    return view('rerundays');
}
public function sethil(){
    return view('sethil');
}
public function splits(){
    return view('splits');
}
public function unitspresicion(){
    return view('unitspresicion');
}
public function autovalidation(){
    return view('autovalidation');
}
public function newresults(){
    return view('newresults');
}


}
