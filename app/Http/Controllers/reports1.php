<?php

namespace App\Http\Controllers;
use App;  
use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;
use Auth;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;  
use PDF;
use DateTime;
use DateInterval;
use Image;

class reports1 extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function abnormals()
    {
        $analyte=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();   

        $sql1="select distinct longname, PrintPriority from BioTestDefinitions order by PrintPriority";
        $getexec= sqlsrv_query($conn_hq, $sql1);
        while($row1 = sqlsrv_fetch_array($getexec, SQLSRV_FETCH_ASSOC))
        {
         $analyte[]=$row1['longname'];
        }
        return view('abnormals')->with('analyte', $analyte);
    }
    public function getabnormalflags(Request $request){
        $from = $request->from;
        $to = $request->to;
        $analytename=$request->analytename;
        $malelow=0;
        $malehigh=0;
        $femalelow=0;
        $femalelhigh=0;
        $both=0;
        $both2=0;
        $flagmalelow=0;
        $flagmalehigh=0;
        $flagfemalelow=0;
        $flagfemalelhigh=0;
        $flagboth=0;
        $flagboth2=0;

        $tlow = 0;
        $tHigh = 0;

        $allbiodef=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();   

        $sql1="select * from BioTestDefinitions where longname = '$analytename'";
        $getexec= sqlsrv_query($conn_hq, $sql1);
        $row1 = sqlsrv_fetch_array($getexec, SQLSRV_FETCH_ASSOC);
        $l=[];
        $malelow = $row1['MaleLow'];
        $malehigh = $row1['MaleHigh'];
        $femalelow = $row1['FemaleLow'];
        $femalehigh = $row1['FemaleHigh'];

        $flagmalelow = $row1['FlagMaleLow'];
        $flagmalehigh = $row1['FlagMaleHigh'];
        $flagfemalelow = $row1['FlagFemaleLow'];
        $flagfemalehigh = $row1['FlagFemaleHigh'];

        $l[] = $malelow;
        $l[] = $malehigh;
        $l[] = $femalelow;
        $l[] = $femalehigh;

        $l[] = $flagmalelow;
        $l[] = $flagmalehigh;
        $l[] = $flagfemalelow;
        $l[] = $flagfemalehigh;

        if($malehigh > $femalehigh){
            $both = $malehigh;
        } else {
            $both = $malelow;
        }
        $l[] = $both;
        if($malelow < $femalelow){
            $both = $malelow;
        } else {
            $both = $femalelow;
        }
        $l[] = $both2;

        if($flagmalehigh > $flagfemalehigh){
            $flagboth = $flagmalehigh;
        } else {
            $flagboth = $flagmalelow;
        }

        $l[] = $flagboth;

        if($flagmalelow < $flagfemalelow){
            $flagboth = $flagmalelow;
        } else {
            $flagboth = $flagfemalelow;
        }

        $l[] = $flagboth2;
        $tlow = 0;
        $thigh = 0;
        
        $code='';
        $dp='';
        $sql2="Select Code, DP from BioTestDefinitions where LongName = '$analytename'";
        $getexec2= sqlsrv_query($conn_hq, $sql2);
        $row2 = sqlsrv_fetch_array($getexec2, SQLSRV_FETCH_ASSOC);
        $code = $row2['Code'];
        $dp = $row2['DP'];

        $sql3="DROP TABLE NoCharResults";
        $getexec3= sqlsrv_query($conn_hq, $sql3);

        $sql4="SELECT B.RunTime, B.Result, B.SampleID, D.Age, D.Chart INTO NoCharResults from BioResults as B, Demographics as D WHERE D.SampleID = B.SampleID and (B.RunDate between '$from' and '$to') and Code = '$code' and Result like '%[0-9]%' and Result <> '' and Result not like '%[^0-9. ]%' order by B.RunTime";
        $getexec4= sqlsrv_query($conn_hq, $sql4);

        $sql5="select * from NoCharResults where cast(Result as Float) < '$tlow' or cast(Result as Float) > '$thigh'";
        $getexec5= sqlsrv_query($conn_hq, $sql5);
        
        $data = [
            'malehigh'=>$malehigh,
            'malelow'=>$malelow,
            'femalehigh'=>$femalehigh,
            'femalelow'=>$femalelow,
            'flagmalehigh'=>$flagmalehigh,
            'flagmalelow'=>$flagmalelow,
            'flagfemalehigh'=>$flagfemalehigh,
            'flagfemalelow'=>$flagfemalelow,
        ];

        return $data;
    }
    public function GetAbnormals($request)
    {
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();   
        if ($req->ajax()) {  
        $todate=$request->todate;
        $fromdate=$request->fromdate;
          $tsql2="select BioTestDefinitions.MaleLow,BioTestDefinitions.MaleHigh,BioTestDefinitions.FemaleLow,BioTestDefinitions.FemaleHigh,
          BioTestDefinitions.FlagMaleLow,BioTestDefinitions.FlagMaleHigh,BioTestDefinitions.FlagFemaleHigh,BioTestDefinitions.FlagFemaleLow from BioTestDefinitions join
          BioResults on BioResults.code=BioTestDefinitions.Code  where BioResults.RunDate>='$fromdate' and BioResults.RunDate<='$todate'";
          $getlist2= sqlsrv_query($conn_hq, $tsql2);
          while($row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC))
          {
           $result2[]=$row2;
          }
          $tsql = " select demographics.Chart as chart,demographics.SampleID as sampleid,demographics.RunDate as rundate,demographics.age as age,BioResults.result as result from demographics join 
        BioResults on demographics.SampleID=BioResults.sampleid where BioResults.RunDate<='$todate' and BioResults.RunDate>='$fromdate'";
          $getlist = sqlsrv_query($conn_hq, $tsql);
           while($row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
           {
            $result[]=$row;
           }
       
          return Datatables::of($result) 
           ->make(true);
        }

 return $results2;
       
    }
    
    // public function codetextview()
    // {
       
    //     return view("codetext");
    // }
    public function codetextDATA(Request $request,$listtype=Null,$id=Null)
    {
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     
        if(!$conn_hq) {
            die( print_r( sqlsrv_errors(), true));
                }  
                $data=[];
                $i=0;
        
        
        
         
        
            if ($request->ajax()) {
        
        
             $page= $request->page;
             $listcode= $request->listcode;
             $search= $request->search;
        if($search !=''){
          $sql=" SELECT * FROM Lists where ListType='$listcode' AND  (Code Like '%$search%' OR Text Like '%$search%')";
        
        }else{
        
           $sql="
         DECLARE @PageNumber AS INT
                    DECLARE @RowsOfPage AS INT
                DECLARE @MaxTablePage  AS FLOAT 
                SET @PageNumber=".$page."
                SET @RowsOfPage=10       
                 SELECT * FROM Lists where ListType='$listcode'
                ORDER BY Code 
                OFFSET (@PageNumber-1)*@RowsOfPage ROWS 
                FETCH NEXT @RowsOfPage ROWS ONLY 
              ";
        
        }
        
        
        
              
          
        
        
           $mysql=sqlsrv_query($conn_hq,$sql);
         while($row= sqlsrv_fetch_array($mysql, SQLSRV_FETCH_ASSOC)){
              $data[$i]=$row;
              $i++;
           }
        
        
        
        
        
                    return Datatables::of($data)
        
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
             
                                   $btn = '
                                        <div class="btn-group" role="group">
                                        <a href="/ocm_old/Lists/'.utf8_encode($row['ListType']).'/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                         <i class="bx bx-edit"></i>
                                        </a>
                                        <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                        </button>
                                         </div>
                                          ';
            
                                    return $btn;
                            }) 
          
        
                            ->setRowId('id')
                            ->rawColumns(['action'])
                            ->make(true);
        
                            
                          
                }
        
                if($id !=''){
        
                $sql2="Select * from Lists where Code='$id'";
               $mysql2=sqlsrv_query($conn_hq,$sql2);
                $count3 = sqlsrv_has_rows($mysql2);
        
                $mydata2=[];
                $j=0;
        
                    if($count3 > 0){
        
                    while($rows5 = sqlsrv_fetch_array($mysql2, SQLSRV_FETCH_ASSOC) ){
                       $mydata2[$j] = $rows5;
                       $j++;
                    }
                } else{
                    $mydata2=[''];
                }
        
                }else{
                    $mydata2=[''];
                }
        
               $sql3="SELECT COUNT(Code) as CodeCount  FROM Lists where ListType='$listtype'";
               $mysql3=sqlsrv_query($conn_hq,$sql3);
               $rows6 = sqlsrv_fetch_array($mysql3, SQLSRV_FETCH_ASSOC);
               $rows7=$rows6['CodeCount'];
        
        
               // $list=[
               // 'listtype'=>$listtype
               // ];
        
        
            return view('codetext')->with('mydata2',$mydata2)->with('rows7',$rows7)->with('listtype',$listtype);
    }
    
    public function codetextDATAdisplay(Request $req)
    {
        $Code=req->Code;
        $Text=req->Text;
        $result=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select Code, Text from lists where Code='$Code' and Text='$Text'";
        $getlist = sqlsrv_query($conn_hq, $tsql); 
        while($row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
        {
            $result[]=$row;
        }
        return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('Code', function($row){
            return $row['Code'];
        }) 
        ->addIndexColumn()
        ->addColumn('Text', function($row){
            return $row['Text'];
        }) 
        ->addIndexColumn()
                            ->addColumn('action', function($row){
             
                                   $btn = '
                                        <div class="btn-group" role="group">
                                        <a href="/ocm_old/Lists/'.utf8_encode($row['ListType']).'/'.utf8_encode($row['Code']).'" title="Edit Product" class="btn btn-primary">
                                         <i class="bx bx-edit"></i>
                                        </a>
                                        <button type="button" title="Delete Product" id="'.utf8_encode($row['Code']).'" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                        </button>
                                         </div>
                                          ';
            
                                    return $btn;
                            }) 
        ->setRowId('Code')
        ->rawColumns(['Code', 'Text'])
        ->make(true);
        
    }
    public function index()
    {
        $data=[];
        return view("24hoururine")->with('data',$data);
    }
    public function Search(Request $req){
        $sampleid=$req->Sample;
        $DOB='';
        $Patname='';
        $Chart='';
        $RunDate='';
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $urea='';
        $Creatinine='';
        $Sodium='';
        $Potassium='';
        $Chloride='';
        $Calcium='';
        $Phosphorus='';
        $Magnesium='';
        $TProt='';
        $Nitrogen='';
        $tsql = "select Dob, PatName, Chart, RunDate from demographics where SampleID='$sampleid'";
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);
        $tsql2 = "select distinct(BioTestDefinitions.shortname),biotestdefinitions.code,BioResults.result from BioTestDefinitions join BioResults on BioResults.code=BioTestDefinitions.code where  BioResults.sampleid='$sampleid'";
        $getlist1 = sqlsrv_query($conn_hq, $tsql2);
        while($row2 = sqlsrv_fetch_array($getlist1, SQLSRV_FETCH_ASSOC))
        {
          $result=$row2['shortname'];
          if ($result=='UREA') {
            $urea=$row2['result'];
          }
          if ($result=='CL-C') {
            $Chloride=$row2['result'];
          }
          if ($result=='Creatinine.') {
            $Creatinine=$row2['result'];
          }
          if ($result=='K-C') {
            $Potassium=$row2['result'];
          }
          if ($result=='NA-C') {
            $Sodium=$row2['result'];
          }
        }

        if($DOB!="")
        {
            $DOB=$row['Dob'];
        }
        if($Patname!="")
        {
            $Patname=$row['PatName'];
        }
        if($Chart!="")
        {
            $Chart=$row['Chart'];
        }
        if($RunDate!="")
        {
            $RunDate=$row['RunDate'];
        }
        
        $data=[
            'Dob'=>$DOB, 
            'PatName'=>$Patname, 
            'Chart'=>$Chart,
            'RunDate'=>$RunDate,
            'urea'=>$urea,
            'creatinine'=>$Creatinine,
            'sodium'=>$Sodium,
            'potassium'=>$Potassium,
            'chloride'=>$Chloride,
            'phosphorus'=>$Phosphorus,
            'magnesium'=>$Magnesium,
            'tprot'=>$TProt,
            'nitrogen'=>$Nitrogen,
            'calcium'=>$Calcium
        ];
        return $data;
    }
    public function dailyreportindex()
    {
        return view("dailyreport");
    }
    public function dailyreportdata(Request $req)
    {
        $date=$req->date;
        $result=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();    
        $tsql = "select SampleID,PatName,Chart,GP,Ward from demographics where DateTimeDemographics>= '$date 00:00:00' and DateTimeDemographics<='$date 23:59:59'";
        $getlist = sqlsrv_query($conn_hq, $tsql); 
        while($row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
        {
            $result[]=$row;
        }
        // return $result;
        return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('sampleid', function($row){
            return $row['SampleID'];
        }) 
        ->addIndexColumn()
        ->addColumn('name', function($row){
            return $row['PatName'];
        }) 
        ->addIndexColumn()
        ->addColumn('chart', function($row){
            return $row['Chart'];
        }) 
        ->addIndexColumn()
        ->addColumn('gp', function($row){
            return $row['GP'];
        }) 
        ->addIndexColumn()
        ->addColumn('ward', function($row){
            return $row['Ward'];
        }) 
        ->setRowId('sampleid')
        ->rawColumns(['sampleid', 'name', 'chart', 'gp', 'ward'])
        ->make(true);
    }
    public function creatinineindex()
    {  
        return view("creatinineclearance");
    }
    public function outstandingindex()
    {
        return view("outstanding");
    }
    
    public function glucosetolerance()
    {
       return view('glucosetolerancetest');
    }

    public function glucosetolerancedata(Request $request)
    {
        $result=[];
        $datefrom=$request->datefrom;
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql4="select SampleID,RunDate from demographics where RunDate like '%$datefrom%'";
        $getlist4 = sqlsrv_query($conn_hq, $tsql4);
         while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
         {
            $result[]=$row4;
         }
         return DataTables::of($result) 
         ->addIndexColumn()
         ->addColumn('SampleID', function($row){
             return $row['SampleID'];
         }) 
         ->addIndexColumn()
         ->addColumn('Date', function($row){
            $dob=$row['RunDate'];
            return $btn = "<button class='btn btn-primary dob' id='$dob' data=".$row['RunDate']." type='button'>$dob</button>";
         }) 
         ->setRowId('SampleID')
         ->rawColumns(['SampleID', 'Date'])
         ->make(true);
    }
    public function glucosetolerancedatabutton(Request $request)
    {
        $SCreaCode='';
        $UCreaCode=[];
        $UProCode=[];
        $result=[];
        $datefrom=$request->datefrom;
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
  
        $tsql4="SELECT D1.SampleID, D1.PatName, B1.RunDate FROM Demographics AS D1, BioResults AS B1 WHERE D1.SampleID = B1.SampleID AND B1.RunDate like '%$datefrom%'";
        $getlist4 = sqlsrv_query($conn_hq, $tsql4);
         while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
         {
          
            $result[]=$row4;
         }

        
        return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('Run#', function($row){
            return $row['SampleID'];
        }) 
        ->addIndexColumn()
        ->addColumn('Date/Time', function($row){
            return $row['RunDate'];
        }) 
        ->addIndexColumn()
        ->addColumn('Serum', function($row) use($request){
          
            $datefrom=$request->datefrom;
           
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
            $tsql = "Select Contents from Options where Description = 'BioCodeForCreat'";     
            $getlist = sqlsrv_query($conn_hq, $tsql);
            $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);
            $SCreaCode=$row1['Contents'];
            $sid= $row['SampleID'];
            $tsql5 = "SELECT Code from BioResults where SampleID='$sid' and RunDate like '%$datefrom%' AND Code ='$SCreaCode'";

            $getlist5 = sqlsrv_query($conn_hq, $tsql5);
            if($getlist5 !== false){
            
                $count5=sqlsrv_has_rows($getlist5);

            $btn = "<button class='btn btn-primary getsid' id='$sid' data='$SCreaCode'>$sid</button>";
            if($count5 > 0){
               // $row5 = sqlsrv_fetch_array($getlist5, SQLSRV_FETCH_ASSOC);
               
                return $btn;
            }else{
                return '-';
            } 
            }
        })  ->addIndexColumn()
        ->addColumn('Urine', function($row) use($request){
           
            $datefrom=$request->datefrom;
        
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
            $tsql2 = "Select Contents from Options where Description = 'BioCodeForUCreat'";     
            $getlist2 = sqlsrv_query($conn_hq, $tsql2);
            $row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
            $UCreaCode=$row2['Contents'];
            $tsql3 = "Select Contents from Options where Description = 'BioCodeForUProt'";     
            $getlist3 = sqlsrv_query($conn_hq, $tsql3);
            $row3 = sqlsrv_fetch_array($getlist3, SQLSRV_FETCH_ASSOC);
            $UProCode=$row3['Contents'];


            $sid= $row['SampleID'];
              $tsql5 = "SELECT Code from BioResults where SampleID='$sid' and RunDate like '%$datefrom%' AND ( Code ='$UCreaCode' OR Code='$UProCode')";
            
            $getlist5 = sqlsrv_query($conn_hq, $tsql5);
            if($getlist5 !== false){
                $count5=sqlsrv_has_rows($getlist5);
                $btn = "<button class='btn btn-primary getsid1' id='$sid'  data='$UCreaCode' data2='$UProCode'>$sid</button>";
                if($count5 > 0){
                    return $btn;
                }else{
                    return '-';
                } 
            }


            
        }) 
        ->setRowId('Run#')
        ->rawColumns(['Run#', 'Date/Time', 'Serum','Urine'])
        ->make(true);
    }
    public function glucosetolerancedatabutton1(Request $request)
    {
        $data=[];
        $id=$request->id;
        $SCreaCode=$request->SCreaCode;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select Chart,DoB,Age,Sex,Addr0,Addr1,ward,GP from demographics WHERE SampleID='$id'";     
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);

        $tsql2 = "select * from bioresults where SampleID = '$id' and Code = '$SCreaCode'";     
        $getlist2 = sqlsrv_query($conn_hq, $tsql2);
        $row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
        $lsc =$row2['result'];

        $data=[
            'Chart'=>$row1['Chart'], 
            'DoB'=>$row1['DoB'], 
            'Age'=>$row1['Age'],
            'Sex'=>$row1['Sex'],
            'Addr0'=>$row1['Addr0'],
            'Addr1'=>$row1['Addr1'],
            'ward'=>$row1['ward'],
            'GP'=>$row1['GP']
          ];
        return $data;
    }
    public function glucosetolerancedatabutton2(Request $request)
    {
        $data=[];
        $id=$request->id;
        $UCreaCode=$request->UCreaCode;
        $UProCode=$request->UProCode;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select Chart,DoB,Age,Sex,Addr0,Addr1,ward,GP from demographics WHERE SampleID='$id'";     
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);

        $data=[
            'Chart'=>$row1['Chart'], 
            'DoB'=>$row1['DoB'], 
            'Age'=>$row1['Age'],
            'Sex'=>$row1['Sex'],
            'Addr0'=>$row1['Addr0'],
            'Addr1'=>$row1['Addr1'],
            'ward'=>$row1['ward'],
            'GP'=>$row1['GP']
          ];
        return $data;
    }
    
    public function printresults()
    {
       return view('printresults');
    }
    public function validqc()
    {
        return view('validqc');
    }
    public function haemcontrols()
    {
        

        $conn_hq5 = \App\Http\Controllers\Controller::SQLConnect();
        $sqlHC="select SampleID from haemcontrols order by SampleID DESC";
        $Hcont = sqlsrv_query($conn_hq5,$sqlHC);
        $arr1=[];
        // $row2 = sqlsrv_fetch_array($Hcont, SQLSRV_FETCH_ASSOC);
        while($row2 = sqlsrv_fetch_array($Hcont, SQLSRV_FETCH_ASSOC)){

            $arr1[]=$row2['SampleID'];
        }
        
        return view('haemcontrols')->with('arr1',$arr1);
        
    }
        public function haemData(Request $request){
            $id = $request->id;
        $conn_hq6 = \App\Http\Controllers\Controller::SQLConnect();
        $sqlHd="select * from haemcontrols where SampleID =$id";
        $Hcont1 = sqlsrv_query($conn_hq6,$sqlHd);
        $arr2=[];

        while($row3 = sqlsrv_fetch_array($Hcont1, SQLSRV_FETCH_ASSOC)){

         $arr2[]=$row3;
        }

        return DataTables::of($arr2) 
        ->setRowId('SampleID')
   
        ->make(true);
        }
    public function highmeanlow()
    {
        return view('highmeanlow');
    }
    
    public function index7data(Request $request)
    {
        return $request->from;
    }
    public function index7()
    {
        return view('screen4');
    }
    public function index8()
    {
        return view('screen5');
    }
    public function index9()
    {
        return view('screen6');
    }
    public function index10()
    {
        return view('screen7');
    }
    
    public function selectparameter()
    {
        return view('selectparameter');
    }
    public function creatinineclearancedatabutton(Request $request)
    {
        $data=[];
        $id=$request->id;
        $SCreaCode=$request->SCreaCode;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select RunDate, SampleID,PatName, Chart,DoB from demographics WHERE SampleID='$id'";     
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);

        $tsql2 = "select * from bioresults where SampleID = '$id' and Code = '$SCreaCode'";     
        $getlist2 = sqlsrv_query($conn_hq, $tsql2);
        $row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
        $lsc =$row2['result'];

        $data=[
            'RunDate'=>$row1['RunDate'], 
            'SID'=>$row1['SampleID'], 
            'Name'=>$row1['PatName'],
            'Chart'=>$row1['Chart'],
            'DoB'=>$row1['DoB'],
            'lsc'=>$lsc
        ];
        return $data;
    }
    public function creatinineclearancedatabutton2(Request $request)
    {
        $data=[];
        $id=$request->id;
        $UCreaCode=$request->UCreaCode;
        $UProCode=$request->UProCode;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select RunDate, SampleID,PatName, Chart,DoB from demographics WHERE SampleID='$id'";     
        $getlist = sqlsrv_query($conn_hq, $tsql);
        $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);

        $tsql2 = "select * from bioresults where SampleID = '$id' and Code = '$UCreaCode'";     
        $getlist2 = sqlsrv_query($conn_hq, $tsql2);
        $row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
        $luc=$row2['result'];

        $tsql3 = "select * from bioresults where SampleID = '$id' and Code = '$UProCode'";     
        $getlist3 = sqlsrv_query($conn_hq, $tsql3);
        $row3 = sqlsrv_fetch_array($getlist3, SQLSRV_FETCH_ASSOC);
        $lup=$row3['result'];

        $tsql4 = "Select Result from BioResults where SampleID = '$id' and Code = 'TUV'";     
        $getlist4 = sqlsrv_query($conn_hq, $tsql4);
        $row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC);
        $tVolume =$row4['result'];

        $data=[
            'RunDate'=>$row1['RunDate'], 
            'SID'=>$row1['SampleID'], 
            'Name'=>$row1['PatName'],
            'Chart'=>$row1['Chart'],
            'DoB'=>$row1['DoB'],
            'luc'=>$luc,
            'lup'=>$lup,
            'tVolume'=>$tVolume
        ];
        return $data;
    }
    public function creatinineclearancedata(Request $request)
    {
        $SCreaCode='';
        $UCreaCode=[];
        $UProCode=[];
        $result=[];
        $to=$request->to;
        $from=$request->from;
        $patname=$request->patname;
         $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
  
        $tsql4="SELECT D1.SampleID, D1.PatName, B1.RunDate FROM Demographics AS D1, BioResults AS B1 WHERE D1.PatName LIKE '%$patname%' AND D1.SampleID = B1.SampleID AND B1.RunDate BETWEEN '$from' AND '$to'";
        $getlist4 = sqlsrv_query($conn_hq, $tsql4);
         while($row4 = sqlsrv_fetch_array($getlist4, SQLSRV_FETCH_ASSOC))
         {
          
            $result[]=$row4;
         }

        
        return DataTables::of($result) 
        ->addIndexColumn()
        ->addColumn('Patient Name', function($row){
            return $row['PatName'];
        }) 
        ->addIndexColumn()
        ->addColumn('Run Date', function($row){
            return $row['RunDate'];
        }) 
        ->addIndexColumn()
        ->addColumn('Serum #', function($row) use($request){
            $to=$request->to;
            $from=$request->from;
            $patname=$request->patname;
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
            $tsql = "Select Contents from Options where Description = 'BioCodeForCreat'";     
            $getlist = sqlsrv_query($conn_hq, $tsql);
            $row1 = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC);
            $SCreaCode=$row1['Contents'];
            $sid= $row['SampleID'];
            $tsql5 = "SELECT Code from BioResults where SampleID='$sid' and RunDate BETWEEN '$from' AND '$to' AND Code ='$SCreaCode'";

            $getlist5 = sqlsrv_query($conn_hq, $tsql5);
            if($getlist5 !== false){
            
                $count5=sqlsrv_has_rows($getlist5);

            $btn = "<button class='btn btn-primary getsid' id='$sid' data='$SCreaCode'>$sid</button>";
            if($count5 > 0){
               // $row5 = sqlsrv_fetch_array($getlist5, SQLSRV_FETCH_ASSOC);
               
                return $btn;
            }else{
                return '-';
            } 
            }
        })  ->addIndexColumn()
        ->addColumn('Urine #', function($row) use($request){
            $to=$request->to;
            $from=$request->from;
            $patname=$request->patname;
            $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
            $tsql2 = "Select Contents from Options where Description = 'BioCodeForUCreat'";     
            $getlist2 = sqlsrv_query($conn_hq, $tsql2);
            $row2 = sqlsrv_fetch_array($getlist2, SQLSRV_FETCH_ASSOC);
            $UCreaCode=$row2['Contents'];
            $tsql3 = "Select Contents from Options where Description = 'BioCodeForUProt'";     
            $getlist3 = sqlsrv_query($conn_hq, $tsql3);
            $row3 = sqlsrv_fetch_array($getlist3, SQLSRV_FETCH_ASSOC);
            $UProCode=$row3['Contents'];


            $sid= $row['SampleID'];
              $tsql5 = "SELECT Code from BioResults where SampleID='$sid' and RunDate BETWEEN '$from' AND '$to' AND ( Code ='$UCreaCode' OR Code='$UProCode')";
            
            $getlist5 = sqlsrv_query($conn_hq, $tsql5);
            if($getlist5 !== false){
                $count5=sqlsrv_has_rows($getlist5);
                $btn = "<button class='btn btn-primary getsid1' id='$sid'  data='$UCreaCode' data2='$UProCode'>$sid</button>";
                if($count5 > 0){
                    return $btn;
                }else{
                    return '-';
                } 
            }


            
        }) 
        ->setRowId('Patient Name')
        ->rawColumns(['Patient Name', 'Run Date', 'Serum #','Urine #'])
        ->make(true);
    }
    public function ExtTotalsData(Request $request)
    {
        $sourcearr=[];
        $to=$request->to;
        $from=$request->from;
        $Source=$request->Source;
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();
        $tsql = "select demographics.$Source as source, count(Biomnisrequests.SampleID) as ID, count(Biomnisrequests.TestName) as tname,  count(Biomnisrequests.SampleType) as sampletype,  count(ExtResults.Analyte) as Analyte from Biomnisrequests join demographics on demographics.SampleID=Biomnisrequests.SampleID LEFT JOIN ExtResults on ExtResults.SampleID=demographics.SampleID where Biomnisrequests.SampleDateTime>='$from' and Biomnisrequests.SampleDateTime<='$to' group by demographics.$Source";
        $getlist = sqlsrv_query($conn_hq, $tsql);
         while($row = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC))
         {
            $sourcearr[]=$row;
         }
         
         return DataTables::of($sourcearr) 
        ->addIndexColumn()
        ->addColumn('Source', function($row){
            return $row['source'];
        }) 
        ->addIndexColumn()
        ->addColumn('Samples', function($row){
            return $row['ID'];
        }) 
        ->addIndexColumn()
        ->addColumn('Tests', function($row){
            return $row['tname'];
        }) 
        ->addIndexColumn()
        ->addColumn('T/S', function($row){
            if($row['tname']!=0)
            {
            return $row['ID']/ $row['tname'];
            }
            return 0;
        }) 
        ->addIndexColumn()
        ->addColumn('Analyte', function($row){
            return $row['Analyte'];
        }) 
        ->addIndexColumn()
        ->addColumn('Total', function($row){
            $s=(int)$row['source'];
            $t=(int)$row['ID'];
            $v=(int)$row['tname'];
            $w=0;
            if($row['tname']!=0)
            {
            $w=(int) $row['ID']/$row['tname'];
            }
            $x=(int)$row['Analyte'];
            return $s+$t+$v+$w+$x;
        }) 

        ->setRowId('Source')
        ->rawColumns(['Source', 'Samples', 'Tests', 'T/S', 'Analyte', 'Total'])
        ->make(true);
    }

      public function collectedreports(){
        $clin=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     

        $sql = "select distinct Clinician from demographics";
        $haem = sqlsrv_query($conn_hq, $sql);
        while($row = sqlsrv_fetch_array($haem, SQLSRV_FETCH_ASSOC))
        {
            $clin[] = $row['Clinician'];
        }
        return view('collectedreports')->with('clin',$clin);
    }
    public function collectedreportsdata(Request $request){
        $from=$request->from;
        $to=$request->to;
        $clinician=$request->clinician;

        $demo=[];
        $conn_hq = \App\Http\Controllers\Controller::SQLConnect();     

        $sql = "select SampleID, Chart, RunDate, PatName, DoB from demographics where RunDate>='$from' and RunDate<='$to' and Clinician='$clinician'";
        $haem = sqlsrv_query($conn_hq, $sql);
        while($row = sqlsrv_fetch_array($haem, SQLSRV_FETCH_ASSOC))
        {
            $demo[] = $row;
        }

        print_r($demo);

        return DataTables::of($demo) 
        ->addIndexColumn()
        ->addColumn('Source', function($row){
            return $row['source'];
        }) 
        ->setRowId('Source')
        ->rawColumns(['Source', 'Samples', 'Tests', 'T/S', 'Analyte', 'Total'])
        ->make(true);
    }

    
}
