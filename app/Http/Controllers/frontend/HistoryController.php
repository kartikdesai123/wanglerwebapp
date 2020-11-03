<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    function __construct() {
       
    }

    public function index(){
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        return view('frontend.pages.history',$data);
    }
}
