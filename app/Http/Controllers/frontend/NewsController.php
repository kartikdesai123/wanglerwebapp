<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\News;

class NewsController extends Controller
{
    function __construct() {
       
    }

    public function index(){
        
        $objNews = new News();
        $data['news'] = $objNews->getNewsList();
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        return view('frontend.pages.news',$data);
    }
    
    public function newsdetails(Request $request, $id){
        
        $objNews = new News();
        $data['news'] = $objNews->getNews($request, $id);
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        return view('frontend.pages.newsdetails',$data);
    }
}
