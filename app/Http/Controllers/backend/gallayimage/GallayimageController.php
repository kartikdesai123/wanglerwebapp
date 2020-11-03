<?php

namespace App\Http\Controllers\backend\gallayimage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Gallay;

class GallayimageController extends Controller {

    function __construct() {
        
    }

    public function index(Request $request) {
        if ($request->isMethod('post')) {
            $objGallay = new Gallay();
            $res = $objGallay->add($request);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'Gallary image added successfully.';
                $return['redirect'] = route('gallay-image');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Gallay Image';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('gallayimage.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Gallayimage.init()');
        $data['header'] = array(
            'title' => 'Gallay Image',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Gallay Image' => 'Gallay Image '));
        return view('backend.pages.gallayimage.index', $data);
    }

    public function editgallay(Request $request) {

        if ($request->isMethod('post')) {

            $objGallay = new Gallay();
            $data = $objGallay->editgallay($request);
            if ($data) {
                $return['status'] = 'success';
                $return['message'] = 'Gallery image Edited successfully.';
                $return['redirect'] = route('gallay-image');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        } else {
            return redirect('gallay-image');
        }
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objGallaylist = new Gallay();
                $list = $objGallaylist->getdatatable();
                echo json_encode($list);
                break;

            case 'editgallay':

                $objGallay = new Gallay();
                $data['viewgallay'] = $objGallay->viewgallay($request->input('id'));
                $result = view('backend.pages.gallayimage.editgallay', $data);
                echo $result;
                break;

            case 'deleteGallay':
                $objGallay = new Gallay();

                $res = $objGallay->deleteGallay($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Gallery image deleted successfully.';
                    $return['redirect'] = route('gallay-image');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;

            case 'chnagestatus':

                $objGallay = new Gallay();
                $result = $objGallay->chnagestatus($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Gallery image status changed successfully.';
                    $return['redirect'] = route('gallay-image');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
