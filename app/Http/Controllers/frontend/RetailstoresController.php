<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ManageCity;
use App\Model\StoreSeller;

class RetailstoresController extends Controller
{
    function __construct() {
       
    }

    public function index(){
        
        $objCity = new ManageCity();
        $data['city'] = $objCity->getcity();
		
		$objSeller = new StoreSeller();
        $data['viewsellers'] = $objSeller->viewAllSeller();
		
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('wheretobuy.js');
        $data['funinit'] = array('Wheretobuy.init()'); 
        return view('frontend.pages.wheretobuy',$data);
    }
    
    public function ajaxAction(Request $request){
        
        $action = $request->input('action');
        switch($action){
            
            case 'getstore':
                $objStore = new StoreSeller();
                $result = $objStore->viewseller($request->input('id'));
                return json_encode($result);
                break;
        }
    }
}
