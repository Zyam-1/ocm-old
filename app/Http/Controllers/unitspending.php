<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;
use DB;
Use Carbon\Carbon;

class unitspending extends Controller
{
    public function index(Request $req)
    {
        $rowsNew="";
        $rowsNew2="";

        $id = $req->isbt128;

        $conn_hq = \App\Http\Controllers\Controller::SQLConnect2();
     
         $sql="select *from product where ISBT128='$id'";
         $results0 = sqlsrv_query( $conn_hq,$sql);
         $count=sqlsrv_has_rows($results0);
       if($count > 0){
        $rowsNew = sqlsrv_fetch_array($results0, SQLSRV_FETCH_ASSOC);
        $barcode=$rowsNew['BarCode'];

        $sql2="select *from productlist where BarCode='$barcode'";
        $results2 = sqlsrv_query( $conn_hq, $sql2);
        $rowsNew2 = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC);


       }
     $data = [
            'rowsNew'=>$rowsNew,
            'rowsNew2'=>$rowsNew2
        ];



        return response()->json($data);
    }
    public function updateEvent(Request $req){
        $isbt = $req->isbt128;
        $sampleid2 = $req->sampleid2;

     $conn_hq = \App\Http\Controllers\Controller::SQLConnect2();

        $sql1 = "select * from PatientDetails where SampleID = '$sampleid2'";
        $results1 = sqlsrv_query( $conn_hq, $sql1);
        $rows1 = sqlsrv_fetch_array($results1, SQLSRV_FETCH_ASSOC);
        $patnum = $rows1['patnum'];
        $patname = $rows1['name'];

     
        $sql3="select * from product where ISBT128='$isbt' AND Event = 'C'";
        $results3 = sqlsrv_query( $conn_hq, $sql3);
        $rows2 = sqlsrv_fetch_array($results3, SQLSRV_FETCH_ASSOC);
        $operator = $rows2['Operator'];
        $datetime = $rows2['DateTime'];
        $grouprh = $rows2['GroupRH'];
        $supplier = $rows2['Supplier'];
        $dateexpiry = $rows2['DateExpiry'];
        $barcode = $rows2['BarCode'];
        $checked = $rows2['Checked'];
        $notes = $rows2['Notes'];
        $eventstart = $rows2['EventStart'];
        $eventend = $rows2['EventEnd'];
        $orderNumber = $rows2['OrderNumber'];
        $screen = $rows2['Screen'];
        $reason = $rows2['Reason'];
        $crt= $rows2['crt'];
        $cco= $rows2['cco'];
        $cen= $rows2['cen'];
        $crtr= $rows2['crtr'];
        $ccor= $rows2['ccor'];
        $cenr= $rows2['cenr'];


       $sql5="insert into Product(Event, PatID, PatName, Operator, DateTime, GroupRH, Supplier, DateExpiry, LabNumber, crt, cco, cen, crtr, ccor, cenr, BarCode, Checked, Notes, EventStart, EventEnd, OrderNumber, Screen, Reason, ISBT128) values('I', '$patnum', '$patname', '$operator', '$datetime', '$grouprh', '$supplier', '$dateexpiry', '$sampleid2', '$crt', '$cco',  '$cen', '$crtr', '$ccor', '$cenr', '$barcode', '$checked', '$notes', '$eventstart', '$eventend', '$orderNumber', '$screen', '$reason', '$isbt')";

        $results5 = sqlsrv_query( $conn_hq, $sql5);
        $rows5 = sqlsrv_fetch_array($results5, SQLSRV_FETCH_ASSOC);


        $sql6="delete from Latest where ISBT128 = '$isbt'";
        $results6 = sqlsrv_query( $conn_hq, $sql6);
        $row6 = sqlsrv_fetch_array($results6, SQLSRV_FETCH_ASSOC);

        return response()->json(['success'=>true]);
    }

    public function updatePending(Request $req){
        $isbt = $req->isbt128;

        $sql2 = "update Product set Event = 'P' where ISBT128='$isbt' AND Event = 'C'";
        $results2 = sqlsrv_query( $conn_hq, $sql2);

        return response()->json(['success'=>true]);
    }
}