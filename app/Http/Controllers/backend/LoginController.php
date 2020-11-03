<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller {

    //
    function __construct() {
        
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'usertype' => 'admin'])) {

                $loginData = array(
                    'fname' => Auth::guard('admin')->user()->fname,
                    'lname' => Auth::guard('admin')->user()->lname,
                    'email' => Auth::guard('admin')->user()->email,
                    'usertype' => Auth::guard('admin')->user()->usertype,
                    'profileimage' => Auth::guard('admin')->user()->profileimage,
                    'id' => Auth::guard('admin')->user()->id,
                );
                Session::push('logindata', $loginData);
                $return['status'] = 'success';
                $return['message'] = 'Welldone Login successfully.';
                $return['redirect'] = route('admin-dashboard');
            } else {
                $request->session()->flash('session_error', 'Invaild Id or Password');
                $return['status'] = 'error';
                $return['message'] = 'Username or Password wrong.';
            }
            return json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler Maple Products - Login';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('validate/jquery.validate.min.js');
        $data['js'] = array('login.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Login.init()');
        return view('backend.pages.login', $data);
    }

    public function getLogout() {
        $this->resetGuard();
        return redirect()->route('admin');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
//        Auth::guard('user')->logout();
        Session::forget('logindata');
    }

    public function createPassword() {
        print_r(Hash::make('123'));
    }

}
