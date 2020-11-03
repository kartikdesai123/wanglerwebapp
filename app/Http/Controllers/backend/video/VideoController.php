<?php

namespace App\Http\Controllers\backend\video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Video;

class VideoController extends Controller {

    function __construct() {
        
    }

    public function index(Request $request) {

        if ($request->isMethod('post')) {

            $objVideo = new Video();
            $res = $objVideo->addvideo($request);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'Video added successfully.';
                $return['redirect'] = route('admin-video');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Video';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('video.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Video.init()');
        $data['header'] = array(
            'title' => 'Video',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Video' => 'Video'));
        return view('backend.pages.video.index', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objVideo = new Video();
                $list = $objVideo->getdatatable();
                echo json_encode($list);
                break;

            case 'deletevideo':
                $objVideo = new Video();

                $res = $objVideo->deletevideo($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Video deleted successfully.';
                    $return['redirect'] = route('admin-video');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
