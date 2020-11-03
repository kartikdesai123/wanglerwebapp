<?php

namespace App\Http\Controllers\backend\adminsetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users;

class AdminsettingController extends Controller
{
    function __construct() {
        $this->middleware('admin');
    }
    
    public function profile(Request $request){
        $session = $request->session()->all();
        $userId = $session['logindata'][0]['id'];
        $userDetails = new Users();
        $data['getdetails'] = $userDetails->getuserdetails($userId);
        if($request->isMethod('post')) {
            $useredit = new Users();
            $result = $useredit->edituserdetails($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Your Profile Updated';
                $return['redirect'] = route('admin-dashboard');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'This email is already registerd!';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler- My Profile';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/toastr/toastr.min.js','plugins/validate/jquery.validate.min.js');
        $data['js'] = array('comman_function.js','ajaxfileupload.js','jquery.form.min.js','profile.js');
        $data['funinit'] = array("Profile.init()"); 
        $data['header'] = array(
            'title' => 'My Profile',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'My Profile' => 'My Profile'));
        return view('backend.pages.adminsetting.profile',$data);
    }
    
	public function colorChange(Request $request){
        $session = $request->session()->all();
        $userId = $session['logindata'][0]['id'];
        $userDetails = new Users();
        $data['getdetails'] = $userDetails->getuserdetails($userId);
        if($request->isMethod('post')) {
            $useredit = new Users();
            $result = $useredit->colorchange($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Your color Updated';
                $return['redirect'] = route('admin-dashboard');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'This email is already registerd!';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler- Edit Color';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/toastr/toastr.min.js','plugins/validate/jquery.validate.min.js');
        $data['js'] = array('comman_function.js','ajaxfileupload.js','jquery.form.min.js','profile.js');
        $data['funinit'] = array("Profile.init()"); 
        $data['header'] = array(
            'title' => 'Edit Color',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Edit Color' => 'Edit Color'));
        return view('backend.pages.adminsetting.color-change',$data);
    }
	
    public function changepassword(Request $request){
        $data['title'] = 'Wagler- Change Password';
        $session = $request->session()->all();
        $data['userId'] = $session['logindata'][0]['id'];
        if($request->isMethod('post')) {
            $useredit = new Users();
            $result = $useredit->changepassword($request);
            if ($result == 'changed') {
                $return['status'] = 'success';
                $return['message'] = 'Password changed successfully';
                $return['redirect'] = route('logout');
            }  
            if ($result == 'wrong') {
                $return['status'] = 'error';
                $return['message'] = 'Something goes to wrong';
            }
            if ($result == 'notmatch') { 
                $return['status'] = 'error';
                $return['message'] = 'Old Password not matched';
            }
            echo json_encode($return);
            exit;
        }
        
        
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/toastr/toastr.min.js','plugins/validate/jquery.validate.min.js');
        $data['js'] = array('comman_function.js','ajaxfileupload.js','jquery.form.min.js','profile.js');
        $data['funinit'] = array("Profile.changepassword()"); 
        $data['header'] = array(
            'title' => 'Change Password',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Change Password' => 'Change Password'));
        return view('backend.pages.adminsetting.changepassword',$data);
    }
}
