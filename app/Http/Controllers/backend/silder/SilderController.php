<?php

namespace App\Http\Controllers\backend\silder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Silder;
use App\Model\Product;

class SilderController extends Controller {

    function __construct() {
        
    }

    public function index(Request $request) {
        
        if ($request->isMethod('post')) {
            $objSilder = new Silder();
            $res = $objSilder->add($request);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'Silder added successfully.';
                $return['redirect'] = route('silder');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objProduct = new Product();
        $data['productlist'] = $objProduct->productlist();
        $data['title'] = 'Wagler - Slider';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('silder.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Silder.init()');
        $data['header'] = array(
            'title' => 'Silder',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Silder' => 'Silder'));
        return view('backend.pages.silder.index', $data);
    }

    public function editsilder(Request $request) {

        if ($request->isMethod('post')) {

            $objSilder = new Silder();
            $data = $objSilder->editsilder($request);
            if ($data) {
                $return['status'] = 'success';
                $return['message'] = 'Silder Edited successfully.';
                $return['redirect'] = route('silder');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        } else {
            return redirect('silder');
        }
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objSilderlist = new Silder();
                $list = $objSilderlist->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteSilder':
                $objSilder = new Silder();

                $res = $objSilder->deleteSilder($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Slider Deleted successfully.';
                    $return['redirect'] = route('silder');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;

            case 'editsilder':
                
                $objSilder = new Silder();
                $data['viewsilder'] = $objSilder->viewsilder($request->input('id'));
                $result = view('backend.pages.silder.editsilder', $data);
                echo $result;
                break;

            case 'chnagestatus':

                $objSilder = new Silder();
                $result = $objSilder->chnagestatus($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Silder status changed successfully.';
                    $return['redirect'] = route('silder');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
