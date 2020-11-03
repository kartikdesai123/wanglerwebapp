<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pages;

class PagesController extends Controller {

    function __construct() {
        
    }

    public function index() {
        $data['title'] = 'Wagler - Pages';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('pages.js');
        $data['funinit'] = array('Pages.init()');
        $data['header'] = array(
            'title' => 'Pages',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Pages' => 'Pages'));
        return view('backend.pages.staticpages.index', $data);
    }

    public function addpages(Request $request) {

        if ($request->isMethod('post')) {

            $objPages = new Pages();
            $res = $objPages->addpages($request);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'Pages Added successfully.';
                $return['redirect'] = route('pages');
            }
            else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Add New Pages';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/ckeditor.js');
        $data['js'] = array('pages.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Pages.add()');
        $data['header'] = array(
            'title' => 'Add New Pages',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Add New Pages' => 'Add New Pages'));
        return view('backend.pages.staticpages.addpages', $data);
    }

    public function editpages(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objPages = new Pages();
            $res = $objPages->editpages($request, $id);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'Pages Edited successfully.';
                $return['redirect'] = route('pages');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objPages = new Pages();
        $data['result'] = $objPages->getPages($request, $id);
        $data['title'] = 'Wagler - Edit Pages';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/ckeditor.js');
        $data['js'] = array('pages.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Pages.edit()');
        $data['header'] = array(
            'title' => 'Edit Pages',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Edit Pages' => 'Edit Pages'));
        return view('backend.pages.staticpages.editpages', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objPages = new Pages();
                $list = $objPages->getdatatable();
                echo json_encode($list);
                break;
            
            case 'getpage':
                $objPages = new Pages();
                $list = $objPages->getPageList();
                return $list;
                break;

            case 'deletepage':

                $objPages = new Pages();
                $res = $objPages->deletepages($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Pages Deleted successfully.';
                    $return['redirect'] = route('pages');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;

            case 'chnagestatus':

                $objPages = new Pages();
                $result = $objPages->chnagestatus($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Page status changed successfully.';
                    $return['redirect'] = route('pages');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
