<?php

namespace App\Http\Controllers\backend\stores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ManageCity;
use App\Model\StoreSeller;

class StoresController extends Controller {

    function __construct() {
        
    }

    public function managecity(Request $request) {

        if ($request->isMethod('post')) {

            $objCity = new ManageCity();
            $result = $objCity->addCity($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'City added successfully.';
                $return['redirect'] = route('manage-city');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Manage City';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js', 'plugins/validate/jquery.validate.min.js');
        $data['js'] = array('stores.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Stores.managecity()');
        $data['header'] = array(
            'title' => 'Manage City',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Manage City' => 'Manage City'));
        return view('backend.pages.stores.managecity', $data);
    }

    public function editcity(Request $request) {

        if ($request->isMethod('post')) {

            $objCity = new ManageCity();
            $result = $objCity->editCity($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'City Edited successfully.';
                $return['redirect'] = route('manage-city');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        } else {
            return redirect('manage-city');
        }
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objCity = new ManageCity();
                $list = $objCity->getdatatable();
                echo json_encode($list);
                break;

            case 'editcity':

                $objCity = new ManageCity();
                $data['viewcity'] = $objCity->viewcity($request->input('id'));
                $result = view('backend.pages.stores.editcity', $data);
                echo $result;
                break;

            case 'deletecity':

                $objCity = new ManageCity();
                $res = $objCity->deletecity($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'City deleted successfully.';
                    $return['redirect'] = route('manage-city');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
//store seller case
            case 'getdatatableseller':
                $objSeller = new StoreSeller();
                $list = $objSeller->getdatatable();
                echo json_encode($list);
                break;

            case 'editseller':
                $objCity = new ManageCity();
                $data['getCityLists'] = $objCity->getcity();
				
                $objSeller = new StoreSeller();
                $data['viewseller'] = $objSeller->getseller($request->input('id'))[0];
                $result = view('backend.pages.stores.editseller', $data);
                
                echo $result;
                break;

            case 'deleteseller':

                $objSeller = new StoreSeller();
                $res = $objSeller->deleteseller($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Seller Deleted successfully.';
                    $return['redirect'] = route('stores');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

//stores 

    public function stores(Request $request) {

		$objCity = new ManageCity();
		$getCityList = $objCity->getcity();
		
        if ($request->isMethod('post')) {
            $objSeller = new StoreSeller();
            $result = $objSeller->addseller($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Store added successfully.';
                $return['redirect'] = route('stores');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Store';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js', 'plugins/validate/jquery.validate.min.js');
        $data['js'] = array('stores.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Stores.stores()');
		$data['getCityLists'] = $getCityList;
        $data['header'] = array(
            'title' => 'Store',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Stores' => 'Stores'));
        return view('backend.pages.stores.stores', $data);
    }

    public function editseller(Request $request) {

        if ($request->isMethod('post')) {

            $objSeller = new StoreSeller();
            $result = $objSeller->editseller($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Seller Edited successfully.';
                $return['redirect'] = route('stores');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        } else {
            return redirect('stores');
        }
    }

}
