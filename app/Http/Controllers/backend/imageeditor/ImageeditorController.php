<?php

namespace App\Http\Controllers\backend\imageeditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageeditorController extends Controller
{
    //
    function __construct() {
        
    }
    
    public function imageeditor(){
        $data['title'] = 'Wagler - Image Editor';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/cropper.min.css');
        $data['pluginjs'] = array('plugins/cropper.min.js','pages/page-croper.js');
        $data['js'] = array();
        $data['funinit'] = array(); 
         $data['header'] = array(
            'title' => 'Image Editor',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Image Editor' => 'Image Editor'));
        return view('backend.pages.imageeditor.index',$data);
    }
}
