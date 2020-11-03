<?php

namespace App\Http\Controllers\backend\ckeditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    //
    function __construct() {
        $this->middleware('admin');
    }
    
    public function ckeditor(){
        $data['title'] = 'Wagler - Ckeditor';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/ckeditor.js');
        $data['js'] = array();
        $data['funinit'] = array(); 
         $data['header'] = array(
            'title' => 'Ckeditor',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Ckeditor' => 'Ckeditor'));
        return view('backend.pages.ckeditor.index',$data);
    }
}
