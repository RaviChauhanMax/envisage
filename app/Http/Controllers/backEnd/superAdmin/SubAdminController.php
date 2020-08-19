<?php
namespace App\Http\Controllers\backEnd\superAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session; 
use DB, Auth, Hash; 
use App\Admin;
use Carbon\Carbon;
use TCPDF;
use Excel;

class SubAdminController extends Controller
{
    public function index(Request $request){
        //$data = $request->all();
        $sub_admins    = Admin::select('*')->where('deleted_at',null)->where('admin_type','1')->get()->toArray();
        // echo'<pre>'; print_r($sub_admins);die;
        $page = 'sub_admin';
        return view('backEnd.superAdmin.subAdmin.index', compact('sub_admins','page'));      
    }

	public function add(Request $request) { 

        if($request->isMethod('post')) {
            
            $data = $request->input();
            // echo "<pre>"; print_r($data); die;
            $admin             = new Admin;
            $admin->user_name = $data['user_name'];
            $admin->first_name = $data['first_name'];
            $admin->last_name  = $data['last_name'];
            $admin->email      = $data['email'];
            $admin->address    = $data['address'];
            $admin->contact    = $data['contact'];
            $admin->admin_type = '1';
            $admin->password   = '' ;
            if(!empty($_FILES['image']['name']))
            {
                $tmp_image  =   $_FILES['image']['tmp_name'];
                $image_info =   pathinfo($_FILES['image']['name']);
                $ext        =   strtolower($image_info['extension']);
                $random_no  =   rand('11111','99999');
                $new_name   =   time().$random_no.'.'.$ext; 
               
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
                {
                    $destination = base_path().'/'.AdminProfileBasePath; 
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $destination.'/'.$new_name))
                    {
                        if(!empty($admin->image)){
                            if(file_exists($destination.'/'.$new_name))
                            {
                                // File::delete($destination.'/'.$admin->image);
                                unlink($destination.'/'.$admin->image);
                            }
                        }
                        $admin->image = $new_name;
                    }
                }
            }

            if($admin->save()) {
               return redirect('admin/sub-admins')->with('success', 'Sub Admin added successfully');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }
        $page = 'sub_admin';

        return view('backEnd.superAdmin.subAdmin.form', compact('page'));
    }
            
    public function edit(Request $request, $sub_admin_id) {   
        
        if($request->isMethod('post')) {
             // echo '<pre>'; print_r($sub_admin_id); die;
            $data = $request->input();
            $admin = Admin::find($sub_admin_id);
           
            if(!empty($admin)) {
   
                $user_old_image   = $admin->image;
                
                $admin->first_name = $data['first_name'];
                $admin->last_name  = $data['last_name'];
                $admin->email      = $data['email'];
                $admin->address    = $data['address'];
                $admin->contact      = $data['contact'];
                $admin->admin_type = '1';
                // dd($_FILES['image']);
                if(!empty($_FILES['image']['name']))
                {   
                    $tmp_image  =   $_FILES['image']['tmp_name'];
                    $image_info =   pathinfo($_FILES['image']['name']);
                    $ext        =   strtolower($image_info['extension']);
                    $random_no  =   rand('11111','99999');
                    $new_name   =   time().$random_no.'.'.$ext; 
                   
                    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
                    {
                        $destination = base_path().'/'.AdminProfileBasePath; 
                        if(move_uploaded_file($_FILES['image']['tmp_name'], $destination.'/'.$new_name))
                        {
                            if(!empty($admin->image)){
                                if(file_exists($destination.'/'.$new_name))
                                {
                                    unlink($destination.'/'.$admin->image);
                                    // File::delete($destination.'/'.$admin->image);
                                }
                            }
                            $admin->image = $new_name;
                        }
                    }
                }
                if($admin->save()) {  
                    
                    return redirect()->back()->with('success','Sub Admin Updated successfully'); 
                }else {
                    return redirect()->back()->with('error','Sub Admin could not be Updated.'); 
                }  
            }else {
                return redirect('admin/sub-admins')->with('error','Sorry, Sub Admin does not exists');
            }
        }
    
        $sub_admin = Admin::select('id','user_name','first_name','last_name','address','contact','email')
                    ->where('id',$sub_admin_id)
                    ->first();
                    //echo '<pre>'; print_r($user); die;
        $page = 'sub_admin';
        return view('backEnd.superAdmin.subAdmin.form', compact('sub_admin','page','sub_admin_id'));
    }

    public function delete($sub_admin_id) {   

        $updated = Admin::where('id', $sub_admin_id)->delete();

        if(!empty($updated)) { 
            
            return redirect('admin/sub-admins')->with('success','Sub Admin deleted Successfully'); 
        } else {
            return redirect('admin/sub-admins')->with('error',COMMON_ERROR); 
        }
    }

    public function admin_validate_email(Request $request){

        $data = $request->all();
        $exists = Admin::where('email',$data['email'])->where('deleted_at',null)->count();
        if($exists > 0){
            $res = 'false';
        }else{
            $res = 'true';
        }  
        return $res;  
    }

    public function admin_validate_contact(Request $request){

        $data = $request->all();
        
        if(!empty($data['sub_admin_id'])){
            $exists = Admin::where('phone',$data['phone'])
                                 ->where('id','<>',$data['sub_admin_id'])
                                 ->whereNull('deleted_at')
                                 ->count();
        }else{
            $exists = Admin::where('phone',$data['phone'])->where('deleted_at',null)->count();
        }
        if($exists > 0){
            $res = 'false';
        }else{
            $res = 'true';
        }  
        return $res;  
    }

    public function send_credentials($sub_admin_id){
    
        if(!empty($sub_admin_id)){
            //admin will send the credential email to sub admin
            $mail = Admin::set_password_email($sub_admin_id);
            if($mail){
                return redirect()->back()->with('success','Set password link has been sent to this email'); 
            }else{
                return redirect()->back()->with('error',COMMON_ERROR);
            }
        }
    }

    public function set_password_form(Request$request, $user_id=null, $security_code=null){
       
        if($request->isMethod('post')){
            $data = $request->input();
            if(empty($data['password']))
            {
                return redirect()->back()->with('error','Please Enter Password');
            }
            else if($data['password'] != $data['confirm_password'])
            {
                return redirect()->back()->with('error','Password & confirm password does not matched');
            }
            $decoded_user_id = convert_uudecode(base64_decode($user_id));
            $sub_admin = Admin::where('id',$decoded_user_id)
                            ->where('security_code',$security_code)
                            ->first();
            $sub_admin->security_code = '';

            $phpGeneratedHash       = bcrypt($data['password']);
            $finalNodeGeneratedHash = str_replace("$2y$", "$2a$", $phpGeneratedHash);
            $sub_admin->password    = $finalNodeGeneratedHash;
            if($sub_admin->save())  {   
                return redirect('admin/login')->with('success', 'You have successfully set the password');
            }else{ 
                return redirect('/')->with('error',COMMON_ERROR);          
            }
        }

        $decoded_user_id = convert_uudecode(base64_decode($user_id));
        $admin_detail = Admin::select('email')->where('id',$decoded_user_id)->where('security_code',$security_code)->first();
        if(!empty($admin_detail)){
            return view('backEnd.set_password',compact('admin_detail','user_id','security_code'));
            
        } else{
            return redirect('/')->with('error','This link has been already used');
        }
    }

    public function validate_email(Request $request){

        $data = $request->all();
    
        if($data['sub_admin_id']==null){
            $check_email = Admin::where('email',$data['email'])
                                ->whereNull('deleted_at')
                                ->count(); 
        }else{
            $check_email = Admin::where('email',$data['email'])
                                ->where('id','<>',$data['sub_admin_id'])
                                ->whereNull('deleted_at')
                                ->count();
        }
        if ($check_email > 0) {
            return 'false';
        }else{
            return 'true';
        }
    }

    public function validate_contact(Request $request){

        $data = $request->all();
    
        if($data['sub_admin_id']==null){
            $check_email = Admin::where('contact',$data['contact'])
                                ->whereNull('deleted_at')
                                ->count(); 
        }else{
            $check_email = Admin::where('contact',$data['contact'])
                                ->where('id','<>',$data['sub_admin_id'])
                                ->whereNull('deleted_at')
                                ->count();
        }
        if ($check_email > 0) {
            return 'false';
        }else{
            return 'true';
        }
    }
}
