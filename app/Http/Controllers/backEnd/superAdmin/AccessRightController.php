<?php
namespace App\Http\Controllers\backEnd\superAdmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\ManagementSection, App\Admin, App\AccessRight;  
use DB; 

class AccessRightController extends Controller
{
    public function index(Request $request,$user_id = null)
    {	
        /*if(Session::has('organicAdminSession'))
        {  
            return redirect('/admin');
        }*/
        $user = Admin::select('id','access_rights')->where('id',$user_id)->first();
        $available_rights = array();
        if(!empty($user)) {
            //get all the access rights of user available checked
            $available_rights = explode(',', $user->access_rights);
        }else{
            return redirect('admin/')->with('error', UNAUTHORIZE_ERR);
        }
        $access_rights    = AccessRight::accessRightList();
         //dd($access_rights);
        $page = 'sub_admin';
        return view('backEnd/superAdmin/subAdmin/access_rights', compact('page','user_id','access_rights','available_rights'));
    }

    public function update(Request $request){

        if($request->isMethod('post')){
            $data = $request->input();
            // dd('enter');
            $access_str = AccessRight::getAccessRightString($data);
            // echo "<pre>"; print_r($access_str); die;
            if($access_str==''){
                $access_str ='';
            }
            $user = Admin::where('id',$data['user_id'])
                        ->where('admin_type','1')
                        ->first();
            if(!empty($user)) {
                $user->access_rights = $access_str;
                if($user->save()) {
                    // return redirect('admin/sub-admins')->with("success",'Sub admin access rights assigned successfully');
                    return redirect()->back()->with("success",'Sub admin access rights assigned successfully');
                }else{
                    return redirect()->back()->with("error","Some Error occured! Please try again later");
                }
            }else{
                return redirect('admin/')->with('error', UNAUTHORIZE_ERR);
            }
        }
    }
}

