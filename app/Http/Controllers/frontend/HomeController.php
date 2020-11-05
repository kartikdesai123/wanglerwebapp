<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Silder;
use App\Model\Product;
use App\Model\News;
use App\Model\Pages;
use App\Model\Users;
use App\Model\StoreHours;

class HomeController extends Controller
{
    //
    function __construct() {
        
    }
    
	public static function getcolor(){
		$userDetails = new Users();
        $getdetails = $userDetails->getcolor();
		return $getdetails[0];
		
	}
        
	 public static function getRecords(){
            $query = StoreHours::get();
            return $query[0];
        }
    public function index(){
        
        $objslider = new Silder();
        $data['slider'] =  $objslider->getSlider();
        $objproduct = new Product();
        $data['product'] =  $objproduct->getfeatureProduct();
        $objnews = new News();
        $data['announcement'] =  $objnews->getNewsList();
        $objpages = new Pages();
        $data['pages'] =  $objpages->getPageList();
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        return view('frontend.pages.home',$data);
    }
}
