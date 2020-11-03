<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Gallay;

class GallayController extends Controller
{
    function __construct() {
       
    }

    public function index(){
        
        $objGallay = new Gallay();
        $data['gallery'] = $objGallay->getGallery();
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        return view('frontend.pages.gallay',$data);
    }
}
