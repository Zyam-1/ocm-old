<?php

namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
    logout as performLogout;
}

   
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



 public function login(Request $request)
    {
        // return $request;
        $credentials = $request->only('email', 'password');

         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
     
        if ($validator->passes()) {


            $users = DB::table('users')->select('new')->where('email',$request->email)->get();

            if (Auth::attempt($credentials)) {

                $mod =\App\Http\Controllers\Controller::getroles();
                
                //$value = session('data',$mod);
                session(['data' => $mod]);

                    $controller = App::make('\App\Http\Controllers\activitylogs');

                    $data = $controller->callAction('addLogs', [0,0,0,0,0,'Login','User logged into the System.']);
                    
                    return response()->json(['success'=>'Logging you in.', 'new' => $users[0]->new]);

                } else {
                    return response()->json(['error'=>'Email or Password is incorrect']);
                }

       } 
       else {

        return response()->json(['error'=>$validator->errors()->first()]);
       
       }
       
    }

    public function logout(Request $request)
    {

       $controller = App::make('\App\Http\Controllers\activitylogs');
       $data = $controller->callAction('addLogs', [0,0,0,0,0,'Login','User logged out from the System.']);    

    $this->performLogout($request);
    return redirect()->route('login');
    }

 

}
