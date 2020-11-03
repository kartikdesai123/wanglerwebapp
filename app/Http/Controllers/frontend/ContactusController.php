<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contactus;

class ContactusController extends Controller {

    function __construct() {
        
    }

    public function index(Request $request) {

        if ($request->isMethod('post')) {

            if($request->input('g-recaptcha-response') == ""){
                $return['status'] = 'error';
                $return['message'] = 'Please enter valid captcha.';
                return json_encode($return);
                exit;
            }
            $objContactus = new Contactus();
            $result = $objContactus->add($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'We will shortly contact you!!!';
                $return['redirect'] = route('contact-us');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            return json_encode($return);
            exit;
        }
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['loadgooglecaptchjs'] = true;
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'contactus.js');
        $data['funinit'] = array('Contactus.init()');
        return view('frontend.pages.contactus', $data);
    }

}
