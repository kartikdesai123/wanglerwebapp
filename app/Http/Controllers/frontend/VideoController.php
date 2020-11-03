<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Video;

class VideoController extends Controller {

    function __construct() {
        
    }
    
    public function index() {
        
        $objVideo = new Video();
        $data['video'] = $objVideo->getVideo();
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        return view('frontend.pages.video', $data);
    }

}
