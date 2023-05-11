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
    public function indexWard(Request $request){
        $code = $request->code;
        $fax = $request->fax;
        $ward = $request->ward;
        $printer = $request->printer;
        $itemsdisplay = $request->itemsdisplay;
        $textWard = $request->textWard;
        
        return $textWard;
    }
}