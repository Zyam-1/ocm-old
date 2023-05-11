<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;
use DB;
Use Carbon\Carbon;
use DataTables;

class bloodsciencegps extends Controller
{
    public function index(Request $request,$id=null)
    {


        
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
        if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }     

        
        $row3=[];
        $k=0;

         if ($request->ajax()) {

        $page= $request->page;
        $search= $request->search;


       if($search !=''){

        $sql2 = "SELECT * FROM gps where Code Like '%$search%' OR InUse Like '%$search%' OR Text Like '%$search%' OR Addr0 Like '%$search%' OR Addr1 Like '%$search%' OR Title Like '%$search%' OR ForeName Like '%$search%' OR SurName Like '%$search%' OR Phone Like '%$search%' OR FAX Like '%$search%' OR Practice Like '%$search%' OR PrintReport Like '%$search%' OR Healthlink Like '%$search%' OR MCNumber Like '%$search%' OR PracticeNumber Like '%$search%' OR ListOrder Like '%$search%' OR AutoCC Like '%$search%' OR Interim Like '%$search%'";

       }else{
                $sql2 = "
 DECLARE @PageNumber AS INT
            DECLARE @RowsOfPage AS INT
        DECLARE @MaxTablePage  AS FLOAT 
        SET @PageNumber=".$page."
        SET @RowsOfPage=10
        SELECT @MaxTablePage = COUNT(*) FROM Lists
        SET @MaxTablePage = CEILING(@MaxTablePage/@RowsOfPage)
       
         SELECT * FROM gps
        ORDER BY Text 
        OFFSET (@PageNumber-1)*@RowsOfPage ROWS
        FETCH NEXT @RowsOfPage ROWS ONLY
      ";
       }

        $results2 = sqlsrv_query( $conn_hq, $sql2);
      
        while($rows5 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC))
        {
            $row3[$k]=$rows5;
            $k++;
        }
           


            return Datatables::of($row3)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="/ocm/LocGPEntry/'.$row['Text'].'" title="Edit Product" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" id="'.$row['Text'].'" title="Delete Product" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
                    ->setRowId('')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

        


        $sql1 = "select Distinct* from gps  where Practice!=''";
        $results1 = sqlsrv_query( $conn_hq, $sql1);
        $row2=[];
        $i=0;
        while(   $rows = sqlsrv_fetch_array($results1, SQLSRV_FETCH_ASSOC))
        {
            $rows2[$i]=$rows['Practice'];
            $i++;
        }

      
        if($id !=''){

        $sql2 = "select * from gps where Text='$id'";
        $results3 = sqlsrv_query( $conn_hq, $sql2);
        $row3=[];
        $k=0;
        while(   $rows4 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC))
        {
            $rows3[$k]=$rows4;
            $k++;
        }
           
        }else{
            $rows3=[''];
        }

       $sql3="SELECT COUNT(Text) as TextCount  FROM gps;";
       $mysql3=sqlsrv_query($conn_hq,$sql3);
       $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
       $rows7=$rows6['TextCount'];


        return view ('gpsentry')->with('rows2',$rows2)->with('rows3',$rows3)->with('rows7',$rows7);
    }
   public function setdata(Request $req )
   {

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }   

     
        $code=$req->code;
        $print=$req->print;
        $title=$req->title;
        $forename=$req->forename;
        $surname=$req->surname;
        $phone=$req->phone;
        $number=$req->number;
        $address=$req->address;
        $address2=$req->address2;
        $fax=$req->fax;
        $healthlink=$req->healthlink;
        $display=$req->display;
        $practice_no=$req->practice_no; 
         $practice=$req->practice;
        $text=$title." ".$forename." ".$surname;

       
            $validator = Validator::make($req->all(), [      
            'code' => 'required',
            'print' => 'required',
            'title' => 'required',
            'forename' => 'required',
            'surname' => 'required',
            'phone' => 'required',
             'address' => 'required',
            'address2' => 'required',
            'fax' => 'required',

        ]);

        if ($validator->passes()) {

        $sql2="select * from gps where Text='$text'";
        $query2=sqlsrv_query($conn_hq,$sql2);
         $count2 = sqlsrv_has_rows($query2);
           if($count2 > 0){
         
        $sql="update gps set Code='$code',Addr0='$address',Addr1='address2',Title='$title',Forename='$forename',Surname='$surname',Phone='$phone',Fax='$fax',Practice='$practice',PracticeNumber='$practice_no' where Text='$text'";

           }else{
         $sql="insert into gps (Text,Code,Addr0,Addr1,InUse,Title,Forename,Surname,Phone,Fax,Practice,Printreport,PracticeNumber) values('$text','$code','$address','$address2',1,'$title','$forename','$surname','$phone','$fax
        ','$practice',1,'$practice_no')";
           }

        $results1 = sqlsrv_query( $conn_hq, $sql);

return response()->json(['success'=>'Data Saved.']); 
}else{
 return response()->json(['error'=>$validator->errors()->first()]);
}
       
   }
   public function delgpentry($id){
     $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
            
            if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
        }    

           $sql="DELETE FROM gps where Text='$id'";

        $results1 = sqlsrv_query( $conn_hq, $sql);
        return redirect('LocGPEntry');

   }
}