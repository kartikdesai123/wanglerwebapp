<?php

namespace App\Http\Controllers\backend\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\News;

class NewsController extends Controller {

    function __construct() {
        
    }

    public function index() {
        $data['title'] = 'Wagler - News';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('news.js');
        $data['funinit'] = array('News.init()');
        $data['header'] = array(
            'title' => 'News',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'News' => 'News'));
        return view('backend.pages.news.index', $data);
    }

    public function addnews(Request $request) {
        
        if ($request->isMethod('post')) {
            
            $objNews = new News();
            $res = $objNews->addnews($request);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'News added successfully.';
                $return['redirect'] = route('admin-news');
            }
            else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Add News';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/jquery.dataTables.min.js', 'plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('news.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('News.add()');
        $data['header'] = array(
            'title' => 'Add News',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Add News' => 'Add News'));
        return view('backend.pages.news.add', $data);
    }

    public function editnews(Request $request, $id) {
        
        if ($request->isMethod('post')) {
                    
            $objNews = new News();
            $res = $objNews->editnews($request, $id);
            if ($res) {
                $return['status'] = 'success';
                $return['message'] = 'News Edited successfully.';
                $return['redirect'] = route('admin-news');
            }
            else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objNews = new News();
        $data['result'] = $objNews->getNews($request, $id);
        $data['title'] = 'Wagler - Edit News';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js', 'plugins/ckeditor.js');
        $data['js'] = array('news.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('News.edit()');
        $data['header'] = array(
            'title' => 'Edit News',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Edit News' => 'Edit News'));
        return view('backend.pages.news.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objNews = new News();
                $list = $objNews->getdatatable();
                echo json_encode($list);
                break;

            case 'deletenews':

                $objNews = new News();
                $res = $objNews->deletenews($request->input('data'));
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'News Deleted successfully.';
                    $return['redirect'] = route('admin-news');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;

            case 'chnagestatus':

                $objNews = new News();
                $result = $objNews->chnagestatus($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'News status changed successfully.';
                    $return['redirect'] = route('admin-news');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
