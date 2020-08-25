<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mail;

class Admin extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $table = 'admins'; 
 
    protected $fillable = [
        'first_name', 'last_name','user_name','admin_type','email','password','image','contact','address','access_rights','security_code','status','admin_type','deleted_at','created_at','updated_at'
    ];

    
    public static function getUserImg($admin_id = null){

        $admin_img = DefaultUserPath;
        if(!empty($admin_id)){
   	        $img = Admin::where('id',$admin_id)->value('image');
        	if(!empty($img)){ 
         	   $admin_img = AdminProfileImgath.'/'.$img;
	        } 
	    }
        return $admin_img;
    }

     public static function set_password_email($sub_admin_id){

        $admin_detail = Admin::select('*')->where('id',$sub_admin_id)->first();
        if(empty($admin_detail)) {
            return redirect()->back()->with('error','This email does not exist');
        }else{
            $admin_id = $admin_detail->id;
        }
        
        $admin_set_password = Admin::find($sub_admin_id);
        $random_no          = rand(111111,999999);
        $security_code      = base64_encode(convert_uuencode($random_no));
        $email              = $admin_detail->email;
        $name               = ucfirst($admin_detail->first_name);
        
        $admin_set_password->security_code = $security_code;
    
        $company_name = PROJECT_NAME;

        if($admin_set_password->save()){
         //dd($email);
            $set_password_url = url('/admin/set-password'.'/'.base64_encode(convert_uuencode($admin_id)).'/'.$security_code);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {   
                Mail::send('emails.sub_admin_welcome', ['name'=>$name,'set_password_url'=>$set_password_url], function($message) use ($email,$company_name)
                {
                    $message->to($email,$company_name)->subject('Set your password');
                });
                return 'true';   
            }else{
                return 'false';
            } 
        }else{
            return 'false'; 
        }
    }  


    

}
