<?php

namespace App\Http\Controllers\backend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct() {
//         parent::__construct();
        $this->middleware('admin');
    }
    
    public function dashboard(){
        $data['title'] = 'Wagler- Dashboard';
        
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => 'Home'));
        return view('backend.pages.dashboard.dashboard',$data);
    }
}
