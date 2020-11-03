<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pages;

class About_UsController extends Controller {

    function __construct() {
        
    }

    public function index(Request $request, $id) {
        
        $objpages = new Pages();
        $data['pages'] =  $objpages->getPages($request, $id);
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler About Us';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        return view('frontend.pages.aboutus', $data);
    }

}
