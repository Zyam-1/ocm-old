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

class customers extends Controller
{


    public function index(Request $request)
    {

        
         if ($request->ajax()) {
   
            $data = DB::table('customers');


            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '
                                <div class="btn-group" role="group">
                                <a href="Customer/'.$row->uid.'" title="Edit Customer" class="btn btn-primary">
                                 <i class="bx bx-edit"></i>
                                </a>
                                <button type="button" title="Delete Customer" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
                                </button>
                                 </div>
                                  ';
    
                            return $btn;
                    }) 
                    ->editColumn('created_at', function($data){ $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y H:i a'); return $created_at; })
                    ->editColumn('updated_at', function($data){ $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d M Y H:i a'); return $updated_at; })

                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

        return view('customers');
        
    }


     public function Customer(Request $request)
    {

        $now = Carbon::now();
        $today =  $now->format('Y-m-01'); 
        
        $customer = '';
        $customeraccounts = '';
        $sales = '';

        $countries = DB::table('countries')->select('name','id')->get();

        if($request->uid != '') {

          $customer = DB::table('customers')->where('uid', $request->uid)->get();
          $customeraccounts = DB::table('customer_accounts')
                                ->select('customer_accounts.uid','customer_accounts.name','customer_accounts.country','customer_accounts.state','customer_accounts.city','customer_accounts.zip','customer_accounts.address','sales.total','sales.date')
                                ->join('sales', 'sales.customer_account', '=', 'customer_accounts.uid')
                                ->where('sales.type', 'Opening Balance')
                                ->where('customer_accounts.customer', $request->uid)
                                ->get();
    
        } 
            
          $data = [
                    'date' => $today,
                    'customer' => $customer,
                    'customeraccounts' => $customeraccounts,
                    'countries' => $countries
          ];  

          return view ('customer')->with('data',$data);
    }  
 


    public function delete(Request $request)
    {
     $id = $request->input('id');   
     $uid =  DB::table('customers')->select('uid')->where('id', $id)->get(); 
     $uid = $uid[0]->uid;
     DB::table('customers')->where('uid', $uid)->delete(); 
     DB::table('customer_accounts')->where('customer', $uid)->delete(); 
     DB::table('sales')->where('customer', $uid)->delete();   
    }



     public function add(Request $request)
    {
        $id = DB::table('customers')->max('id')+1;
        $uid = uniqid();
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $alternative_phone = $request->input('alternative_phone');

        
         $accountname = $request->input('accountname');
         $opening_balances = $request->input('opening_balance');
         $country = $request->input('country');
         $state = $request->input('state');
         $city = $request->input('city');
         $zip = $request->input('zip');
         $address = $request->input('address');

         $user = auth()->user();
        

        $validator = Validator::make($request->all(), [
            'name' => 'required',      
            'phone' => 'required|unique:customers,phone',
            'email' => 'required',
            "opening_balance.*"  => "required",
            "country.*"  => "required",
            "state.*"  => "required",
        ]);
     

             if ($validator->passes()) {

             foreach($opening_balances as $key => $opening_balance)
            {

            $aid = DB::table('customer_accounts')->max('id')+1; 
            $auid = uniqid();

                  DB::insert('insert into customer_accounts (id, name,  uid, customer, country, state, city, zip, address, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$aid, $accountname[$key],  $auid, $uid, $country[$key], $state[$key],  $city[$key],  $zip[$key],  $address[$key],  date('Y-m-d H:i:s'), date('Y-m-d H:i:s')] );

            $sid = DB::table('sales')->max('id')+1;       
                  DB::insert('insert into sales (id, uid, customer, customer_account, type, amount, total, status, date, created_at, updated_at, created_by) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$sid, uniqid(), $uid, $auid, 'Opening Balance', $opening_balances[$key], $opening_balances[$key], 'unPaid', date('Y-m-d'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),  $user['id'] ] );      
            

             } 


        DB::insert('insert into customers (id, uid, name, phone, alternative_phone, email, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', 
            [$id, $uid, $name, $phone, $alternative_phone, $email,  date('Y-m-d H:i:s'), date('Y-m-d H:i:s')] );      

            return response()->json(['success'=>'Data added.']);


        }
        
        return response()->json(['error'=>$validator->errors()->first()]);

    }


      public function update(Request $request)
    {
        $uid = $request->input('uid'); 
        $id = DB::table('customers')->select('id')->where('uid',$uid)->get();
        $id = $id[0]->id;
        
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $alternative_phone = $request->input('alternative_phone');

        
         $aid = $request->input('aid');
         $accountname = $request->input('accountname');
         $opening_balances = $request->input('opening_balance');
         $country = $request->input('country');
         $state = $request->input('state');
         $city = $request->input('city');
         $zip = $request->input('zip');
         $address = $request->input('address');

         $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'name' => 'required',
            'phone'=> 'required|unique:customers,phone,'.$id,
            'email' => 'required',
            "opening_balance.*"  => "required",
            "country.*"  => "required",
            "state.*"  => "required",
        ]);

        if ($validator->passes()) {



             foreach($opening_balances as $key => $opening_balance)
            {

              $exist = DB::table('customer_accounts')->select('uid')->where('uid',$aid[$key])->get();  

            if(count($exist) > 0) {

            DB::update("
            update customer_accounts 
            set 
            country = '".$country[$key]."', 
            state = '".$state[$key]."', 
            city = '".$city[$key]."', 
            zip = '".$zip[$key]."', 
            address = '".$address[$key]."', 
            updated_at = '".date('Y-m-d H:i:s')."'

              where uid =  '".$aid[$key]."' 
            ");


            DB::update("
            update sales 
            set 
            amount = '".$opening_balances[$key]."', 
            total = '".$opening_balances[$key]."', 
            date = '".date('Y-m-d')."',  
            updated_at = '".date('Y-m-d H:i:s')."',
            updated_by = '". $user['id'] ."'

              where customer_account =  '".$aid[$key]."'  and type = 'Opening Balance'
            ");
            
            } else {

                $aid = DB::table('customer_accounts')->max('id')+1; 
                $auid = uniqid();

                DB::insert('insert into customer_accounts (id, name,  uid, customer, country, state, city, zip, address, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$aid, $accountname[$key],  $auid, $uid, $country[$key], $state[$key],  $city[$key],  $zip[$key],  $address[$key],  date('Y-m-d H:i:s'), date('Y-m-d H:i:s')] );

            $sid = DB::table('sales')->max('id')+1;       
                  DB::insert('insert into sales (id, uid, customer, customer_account, type, amount, total, status, date, created_at, updated_at, created_by) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$sid, uniqid(), $uid, $auid, 'Opening Balance', $opening_balances[$key], $opening_balances[$key], 'unPaid', date('Y-m-d'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),  $user['id'] ] );  
            }

        
             } 

            
            DB::update("
            update customers 
            set 
            name = '$name', phone = '$phone', email = '$email', alternative_phone = '$alternative_phone', updated_at = '".date('Y-m-d H:i:s')."'  where uid =  '$uid' 
            ");
            
            return response()->json(['success'=>'Info updated.']);
            
        }

            return response()->json(['error'=>$validator->errors()->first()]);
                
    } 


     public function indexCustomerBalances(Request $request)
    {
       
        $now = Carbon::now();
        $date =  $now->format('Y-m');
        $month =  $now->format('M/Y');
        $customers = DB::table('customers')->select('name','uid')->get(); 
        $customer_account = '';

       if ($request->ajax()) {
        
              if(!empty($request->month))
                  {
                    $date = $request->month;
                    $month = Carbon::parse($date)->format('M/Y');
                   } 

              if(!empty($request->customer_account))
                  {
                    $customer_account = " and customer_account = '".$request->customer_account."'";
                    
                   } 

            $data = DB::table('customers')
                        ->select(
                            'customers.uid',
                            'customers.name',
                            DB::raw('
                                SUBSTRING("'.$month.'", 1, 10) as month'),
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Opening Balance" and SUBSTRING(date, 1, 7) <= "'.$date.'" ),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                -
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                as total
                                '),
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) = "'.$date.'"), 0) 
                                as invoices
                                '), 
                            DB::raw('
                                
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Opening Balance" and SUBSTRING(date, 1, 7) <= "'.$date.'" ),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                -
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) = "'.$date.'"), 0)
                                as receivable
                                '), 
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 7) = "'.$date.'"), 0) 
                                as received
                                '), 
                            DB::raw('
                                  IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Opening Balance" and SUBSTRING(date, 1, 7) <= "'.$date.'" ),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                -
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 7) < "'.$date.'"),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 7) = "'.$date.'"), 0)
                                - 
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 7) = "'.$date.'"), 0) 
                                as closing
                                '), 
                                       
                            )
                        ->join('sales', 'sales.customer', '=', 'customers.uid')
                        ->join('customer_accounts', 'sales.customer_account', '=', 'customer_accounts.uid')
                         ->when(!empty($request->customer) , function ($query) use($request){
                                return $query->where('sales.customer',$request->customer);
                                })
                        ->groupBy('customers.uid');


            return Datatables::of($data)

                    ->addIndexColumn()

                     ->editColumn('total', function($row){ 

                        return business::businessinfo()[0]->currency.$row->total;

                      })

                     ->editColumn('invoices', function($row){ 

                        return business::businessinfo()[0]->currency.$row->invoices;

                      })

                     ->editColumn('receivable', function($row){ 

                        return business::businessinfo()[0]->currency.$row->receivable;

                      })

                     ->editColumn('received', function($row){ 

                        return business::businessinfo()[0]->currency.$row->received;

                      })

                     ->editColumn('closing', function($row){ 

                        return business::businessinfo()[0]->currency.$row->closing;

                      })

                    ->setRowId('uid')
                    ->rawColumns(['action'])
                    ->make(true);

                    
                  
        }

                 $data = [
                    'month' => $date,
                    'customers' => $customers
          ];


        return view ('customerbalances')->with('data',$data);
                
    } 



        public function indexCustomerStatement()
    {
        $now = Carbon::now();
        $date =  $now->format('Y-m');
        $customers = DB::table('customers')->select('name','uid')->get(); 
        $business = DB::table('business')->select('file')->get();

                 $data = [
                    'date' => $date,
                    'customers' => $customers,
                    'business' => $business
          ];


        return view ('customerstatement')->with('data',$data);
                
    }



        public function getCustomerStatement(Request $request)
    {
        

        $daterange = $request->input('daterange');
        $customer = $request->input('customer');
        $customer_account = $request->input('customer_account');


        $validator = Validator::make($request->all(), [
            'daterange' => 'required',      
            'customer' => 'required'
        ]);


        if ($validator->passes()) {

        $daterange = str_replace(' ','',$daterange);
        $daterange = explode('-',$daterange);
        $from = $daterange[0];
        $from = Carbon::createFromFormat('Y/m/d', $from)->format('Y-m-d');
        $to = $daterange[1];
        $to = Carbon::createFromFormat('Y/m/d', $to)->format('Y-m-d');

        $datefrom = Carbon::createFromFormat('Y-m-d', $from)->format('d M Y');
        $dateto = Carbon::createFromFormat('Y-m-d', $to)->format('d M Y');

        $business = DB::table('business')->get();
        $customer_info = DB::table('customers')->where('uid',$customer)->get(); 
        
            if($customer_account != '') {

                 $customer_account_info = DB::table('customer_accounts')
                                            ->select('customer_accounts.*','countries.name as country','states.name as state',)
                                            ->join('countries', 'countries.id', '=', 'customer_accounts.country')
                                            ->join('states', 'states.id', '=', 'customer_accounts.state')
                                            ->where('uid',$customer_account)
                                            ->get(); 

            } else {

                 $name = 'All';   
                 $customer_account_info = DB::table('customer_accounts')
                                            ->select('customer_accounts.*',
                                            DB::raw('SUBSTRING("'.$name.'", 1, 10) as name'),
                                                'countries.name as country','states.name as state',)
                                            ->join('countries', 'countries.id', '=', 'customer_accounts.country')
                                            ->join('states', 'states.id', '=', 'customer_accounts.state')
                                            ->where('customer_accounts.customer',$customer)
                                            ->where('customer_accounts.name','Primary Account')
                                            ->get(); 
            }


           if(!empty($request->customer_account))
                  {
                    $customer_account = " and customer_account = '".$request->customer_account."'";
                    
                   } 
                   
            $customerbalance = DB::table('customers')
                        ->select(
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Opening Balance" ),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 10) < "'.$from.'"),0) 
                                -
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 10) < "'.$from.'"),0) 
                                as total
                                '),
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 10) between "'.$from.'" and  "'.$to.'"), 0) 
                                as invoices
                                '), 
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 10) between "'.$from.'" and  "'.$to.'"), 0) 
                                as received
                                ')
                                       
                            )
                        ->join('sales', 'sales.customer', '=', 'customers.uid')
                        ->join('customer_accounts', 'sales.customer_account', '=', 'customer_accounts.uid')
                        ->where('customers.uid',$customer)
                        ->groupBy('customers.uid')->get();


                 $activities = DB::table('sales')
                        ->select('sales.date','sales.type','customer_accounts.name','sales.total','sales.uid','sales.invoice_id')
                        ->join('customer_accounts', 'sales.customer_account', '=', 'customer_accounts.uid')
                        ->where('sales.customer',$customer)
                        ->where('sales.type','!=','Opening Balance')
                        ->where('sales.date','>=',$from)
                        ->where('sales.date','<=',$to)
                         ->when(!empty($request->customer_account) , function ($query) use($request){
                                return $query->where('sales.customer_account',$request->customer_account);
                                })
                        ->get();
                               

                 $closingbalance = $customerbalance[0]->total+$customerbalance[0]->invoices-$customerbalance[0]->received;      

                 $data = [
                    'datefrom' => $datefrom,
                    'dateto' => $dateto,
                    'customer' => $customer_info,
                    'customer_account' => $customer_account_info,
                    'customerbalance' => $customerbalance,
                    'closingbalance' => $closingbalance,
                    'business' => $business,
                    'activities' => $activities
          ];

          return \Response::json($data);
        }

          return response()->json(['error'=>$validator->errors()->first()]);  
        
                
        } 


        public function downloadCustomerStatement(Request $request) {

                $from =  $request->datefrom;
                $to =  $request->dateto;
                $datefrom = Carbon::createFromFormat('Y-m-d', $from)->format('d M Y');
                $dateto = Carbon::createFromFormat('Y-m-d', $to)->format('d M Y');

                $customer =  $request->customer;
                $customer_account =  $request->customer_account;
                $business = DB::table('business')->get();

            
                $business = DB::table('business')->get();
                $customer_info = DB::table('customers')->where('uid',$customer)->get(); 
        
            if($customer_account != 'All') {

                 $customer_account_info = DB::table('customer_accounts')
                                            ->select('customer_accounts.*','countries.name as country','states.name as state',)
                                            ->join('countries', 'countries.id', '=', 'customer_accounts.country')
                                            ->join('states', 'states.id', '=', 'customer_accounts.state')
                                            ->where('uid',$customer_account)
                                            ->get(); 

            } else {

                 $name = 'All';   
                 $customer_account_info = DB::table('customer_accounts')
                                            ->select('customer_accounts.*',
                                                DB::raw('SUBSTRING("'.$name.'", 1, 10) as name'),
                                                'countries.name as country','states.name as state',)
                                            ->join('countries', 'countries.id', '=', 'customer_accounts.country')
                                            ->join('states', 'states.id', '=', 'customer_accounts.state')
                                            ->where('customer_accounts.customer',$customer)
                                            ->where('customer_accounts.name','Primary Account')
                                            ->get(); 
            }


           if($customer_account != 'All')
                  {
                    $customer_account = " and customer_account = '".$request->customer_account."'";
                    
                   } else {

                    $customer_account = '';

                   }
                   
            $customerbalance = DB::table('customers')
                        ->select(
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Opening Balance" ),0) 
                                +
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 10) < "'.$from.'"),0) 
                                -
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 10) < "'.$from.'"),0) 
                                as total
                                '),
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Invoice" and SUBSTRING(date, 1, 10) between "'.$from.'" and  "'.$to.'"), 0) 
                                as invoices
                                '), 
                            DB::raw('
                                IFNULL((select sum(total) from sales where customer = customers.uid '.$customer_account.' and type = "Payment" and SUBSTRING(date, 1, 10) between "'.$from.'" and  "'.$to.'"), 0) 
                                as received
                                ')
                                       
                            )
                        ->join('sales', 'sales.customer', '=', 'customers.uid')
                        ->join('customer_accounts', 'sales.customer_account', '=', 'customer_accounts.uid')
                        ->where('customers.uid',$customer)
                        ->groupBy('customers.uid')->get();


                    $activities = DB::table('sales')
                        ->select('sales.date','sales.type','customer_accounts.name','sales.total','sales.uid','sales.invoice_id')
                        ->join('customer_accounts', 'sales.customer_account', '=', 'customer_accounts.uid')
                        ->where('sales.customer',$customer)
                        ->where('sales.type','!=','Opening Balance')
                        ->where('sales.date','>=',$from)
                        ->where('sales.date','<=',$to)
                         ->when(!empty($customer_account) , function ($query) use($request){
                                return $query->where('sales.customer_account',$request->customer_account);
                                })
                        ->get();
                               

                 $closingbalance = $customerbalance[0]->total+$customerbalance[0]->invoices-$customerbalance[0]->received;      

                 $data = [
                    'datefrom' => $datefrom,
                    'dateto' => $dateto,
                    'customer' => $customer_info,
                    'customer_account' => $customer_account_info,
                    'customerbalance' => $customerbalance,
                    'closingbalance' => $closingbalance,
                    'business' => $business,
                    'activities' => $activities,
                    ];



                view ('customerstatementdownload')->with('data',$data);
                $pdf = PDF::loadView('customerstatementdownload',array('data' =>$data)); 
        return  $pdf->download('Customer Statement - '.$customer_info[0]->name.' - '.$customer_account_info[0]->name.'.pdf');
        

        }



}