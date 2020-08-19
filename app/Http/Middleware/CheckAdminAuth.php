<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\AccessRight, App\Admin;
use Session;
use Route;
class CheckAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }*/
        $route = Route::current();
        $path = $route->uri;

        if(!Auth::guard('admin')->check())
        {  
            return redirect('admin/login');
        } 
       
       //check if user has permission to access this page.
        if(($path != 'admin/dashboard') && (Auth::guard('admin')->user()->admin_type != '0') ){
          $path = preg_replace('/\d/', '', $path);
           // echo "<pre>"; print_r($path); die;
           //paths that does not need permssions
           $allowed_path = array('admin/logout',
                               'admin/validate/groupcategory/name',
                           );
           //if requested path is not one of them that don't need permission. then check it for permission 
           if(!in_array($path,$allowed_path)) {
              
               $res = $this->checkPermission($path);
               // echo "<pre>"; print_r($res); die;
               if(!$res){
                   
                   if($request->ajax()){
                       echo json_encode('unauthorize'); die;    
                   }
                   return redirect()->back()->with("error",UNAUTHORIZE_ERR);
               } 
           }            
        } 
        return $next($request);
    }
           
    function checkPermission($path){
        //echo "<pre>";print_r($path); echo "</pre>"; die;
       //return true; //by passing route check 
        $user_rights = Auth::guard('admin')->user()->access_rights;
        $user_rights = explode(',',$user_rights);
        $rights = AccessRight::select('id','route')->whereIn('id',$user_rights)->get()->toArray();
        // foreach ($rights as $key => $right) {
        //     if(strpos($right['route'], $path) !== false) { 
        //         return true;    
        //     }
        // }
        // return false;

         foreach ($rights as $key => $right) {

            $route = explode('{', $right['route']);
             // echo "<pre>"; print_r($route);die;
            $route = preg_replace('/[^a-zA-Z]/', '', $route); 
             // echo "<pre>"; print_r($route);die;

            //echo "<pre>"; print_r($route[0]);echo "</br>";

            $newpath = explode('{', $path);
            //echo "<pre>";print_r($newpath); echo "</pre>";
            $finalpath = preg_replace('/[^a-zA-Z]/', '', $newpath); 
            //echo $finalpath[0]; echo "</br>";
            if($route[0] == $finalpath[0]){
            // if(strpos($right['route'], $path) !== false) { 
                // echo "11"; //die;
                return true;    
            }
        } 
        return false;
    }
    
}
