<?php
  
namespace App\Http\Controllers;
  
use App;  
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use Mail;
use PDF;
use DateTime;

class clinicianlist extends Controller
{
    public function locwardlist(){
        return view('newward');
    }
    public function clinicianlist(Request $request, $id=null){
      $rows3="";
       $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     
      
    
        $clinic = [];
        $i=0;  
        if ($request->ajax()) {
           
           $pageno=$request->page;
           $search=$request->search;

if($search !=''){

        $sql2 = "SELECT * FROM Clinicians where Title Like '%$search%' OR ForeName Like '%$search%' OR SurName Like '%$search%' OR InUse Like '%$search%' OR Text Like '%$search%' OR HospitalCode Like '%$search%' OR Code Like '%$search%' OR Ward Like '%$search%' OR ListOrder Like '%$search%' ";


}else{

  
        $sql2 = "DECLARE @PageNumber AS INT
        DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$pageno."
        SET @RowsOfPage=10
        SELECT * FROM Clinicians
        ORDER BY Code 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS
        FETCH NEXT @RowsOfPage ROWS ONLY";

}

            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results2 = sqlsrv_query( $conn_hq, $sql2, $params, $options);
            $count2 = sqlsrv_num_rows($results2);
    
            while($rows2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)){
                $clinic[$i] = $rows2;
                $i++;
            }

            return Datatables::of($clinic)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                            <div class="btn-group" role="group">
                            <a href="/ocm/CliniciansUpdate/'.$row['Text'].'" title="Edit Clinician" class="btn btn-primary">
                                <i class="bx bx-edit"></i>
                            </a>
                            <button type="button" title="Delete Clinician" id="'.$row['Text'].'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                            </button>
                                </div>
                                ';

                        return $btn;
                    }) 

                    ->setRowId('')
                    ->rawColumns(['action'])
                    ->make(true);
                  
        }
        if($id!="")
        {

        
        $sql12="select DISTINCT * from Clinicians where Text='$id'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results12 = sqlsrv_query( $conn_hq, $sql12, $params, $options);
        $count12 = sqlsrv_num_rows($results12);

        $rows3 = sqlsrv_fetch_array($results12, SQLSRV_FETCH_ASSOC);
     }

  $sql3="SELECT COUNT(Text) as TextCount  FROM Clinicians;";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['TextCount'];

        return view('clinicianlist')->with('rows3',$rows3)->with('rows7',$rows7);
    }  
    public function deleteClinician($id=null){
        
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     

        $sql11 = "delete from clinicians where Text = '$id'";
        $results = sqlsrv_query( $conn_hq, $sql11);

        return redirect('Clinicians');
    }  

    public function indexClinician(Request $request, $id=null){
        
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

        $code = $request->code;
        $defaultward = $request->defaultward;
        $hospital = $request->hospital;
        $title = $request->title;
        $forename = $request->forename;
        $surname = $request->surname;
        $text = $title." ".$forename." ".$surname;


        $validator = Validator::make($request->all(), [      
            'code' => 'required',
            'defaultward' => 'required',
            'hospital' => 'required',
            'title' => 'required',
            'forename' => 'required',
            'surname' => 'required'

        ]);

        // $itemsdisplay = $request->itemsdisplay;

        if ($validator->passes()) {

        if($id == null){
           $sql3 = "select * from clinicians where Text = '$text'";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results3 = sqlsrv_query( $conn_hq, $sql3, $params, $options);
            $count3 = sqlsrv_num_rows($results3);
            if($count3 > 0){
                $sql5 = "update clinicians set HospitalCode = '$hospital', Code = '$code', Ward = '$defaultward', Title = '$title', ForeName = '$forename', SurName = '$surname', Text = '$text' where Text = '$text'";
                $results5 = sqlsrv_query( $conn_hq, $sql5);

            } else  {
                $sql = "insert into clinicians(Text, InUse, HospitalCode, Code, Ward, Title, ForeName, SurName) values('$text', 1, '$hospital', '$code', '$defaultward', '$title', '$forename', '$surname')";
                $results = sqlsrv_query( $conn_hq, $sql);
                $count = sqlsrv_num_rows($results);
            }

        } else {
            $sql1 = "update clinicians set HospitalCode = '$hospital', Code = '$code', Ward = '$defaultward', Title = '$title', ForeName = '$forename', SurName = '$surname', Text = '$text' where Text = '$id'";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $results1 = sqlsrv_query( $conn_hq, $sql1, $params, $options);
            $count1 = sqlsrv_num_rows($results1);

        }
return response()->json(['success'=>'Data Saved Successfully.']); 
  }else{
return response()->json(['error'=>$validator->errors()->first()]);
  }

    
    }

    public function indexWard(Request $request){

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     

        $code = $request->code;
        // $fax = $request->fax;
        $ward = $request->ward;
        // $printer = $request->printer;
        // $itemsdisplay = $request->itemsdisplay;
        // $textWard = $request->textWard;

        $sql1 = "insert into wards(text, code) values('$ward', '$code')";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $results1 = sqlsrv_query( $conn_hq, $sql1, $params, $options);
        $count1 = sqlsrv_num_rows($results1);
        
        return response()->json(['success'=>true]);
    }
}
