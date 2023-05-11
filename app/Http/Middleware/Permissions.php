<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // function getData($module,$permission) {
    //     $data = Session::get('data');
    //     $per=$data['per'];
    //     $val=$data['val'];
    //     $mod=$data['mod'];
    //     // $user = new users();

    //     $key = array_keys($mod,$module);
    //     for($i=0;$i<count($key);$i++)
    //     {
    //         if($mod[$key[$i]]==$module && $per[$key[$i]]==$permission && $val[$key[$i]]=="Yes")
    //         {
    //             return true;
    //         } 
    //         else{
    //             return false;
    //         }
    //     }
    // }

    public function handle(Request $request, Closure $next)
    {
        
     
        
        $module = \Request::route()->getName();
        $data = Session::get('data');
        $per=$data['per'];
        $mod=$data['mod'];
        // $user = new users();

        $key = array_keys($mod,$module);
        for($i=0;$i<count($key);$i++)
        {
            if($mod[$key[$i]]==$module && $per[$key[$i]]=="yes")
            {
                return $next($request);
            } 
          
        }
        return redirect('home');
      
       
    }
}
