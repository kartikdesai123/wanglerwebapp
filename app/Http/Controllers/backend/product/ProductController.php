<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductSizePrize;

class ProductController extends Controller
{
    function __construct() {
         $this->middleware('admin');
    }
    
    public function manageproduct(){
        $objCategory = new Category();
        $data['category'] =  $objCategory->getcategory();
        
        $objProduct = new Product();
        $data['productlist'] =  $objProduct->productlist();
        $data['title'] = 'Wagler - Manage Product';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js','plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('manageproduct.js','ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Manageproduct.init()'); 
         $data['header'] = array(
            'title' => 'Manage Product',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Manage Product' => 'Manage Product'));
        return view('backend.pages.product.manageproduct',$data);
    }
    
    public function addproduct(Request $request){
       if ($request->isMethod('post')) {
            $objProduct = new Product();
            $res = $objProduct->add($request);
            if($res == 'add'){
                $return['status'] = 'success';
                $return['message'] = 'Product added successfully.';
                $return['redirect'] = route('manage-product');
            }
            if($res == 'wrong'){
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            if($res == 'exits'){
                $return['status'] = 'error';
                $return['message'] = 'Product already exits.';
            }
            echo json_encode($return);
            exit;
        }else{
            return redirect()->route('category'); 
         }
    }
    
    public function editproduct(Request $request){
       if ($request->isMethod('post')) {
            $objProduct = new Product();
            $res = $objProduct->edit($request);
            if($res == 'edited'){
                $return['status'] = 'success';
                $return['message'] = 'Product edited successfully.';
                $return['redirect'] = route('manage-product');
            }
            if($res == 'wrong'){
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            if($res == 'exits'){
                $return['status'] = 'error';
                $return['message'] = 'Product  already exits.';
            }
            echo json_encode($return);
            exit;
        }else{
            return redirect()->route('category'); 
         }
    }
    
    public function category(Request $request){
        if ($request->isMethod('post')) {
            $objCategory = new Category();
            $res = $objCategory->add($request);
            if($res == 'add'){
                $return['status'] = 'success';
                $return['message'] = 'category added successfully.';
                $return['redirect'] = route('category');
            }
            if($res == 'error'){
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            if($res == 'exits'){
                $return['status'] = 'error';
                $return['message'] = 'Category name already exits.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Wagler - Category';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/validate/jquery.validate.min.js','plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap4.min.js');
        $data['js'] = array('manageproduct.js','ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Manageproduct.category()'); 
         $data['header'] = array(
            'title' => 'Category',
            'breadcrumb' => array(
                'Home' => route("admin-dashboard"),
                'Category' => 'Category'));
        return view('backend.pages.product.category',$data);
    }
    
    public function ajaxAction(Request $request){
        $action = $request->input('action');
        switch ($action) {
            
            case 'getcategorydatatable':
                $objCategory = new Category();
                $list = $objCategory->getData();
                echo json_encode($list);
                break;
            
            
            case 'getproductdatatable':
                $objProduct = new Product();
                $list = $objProduct->getData();
                echo json_encode($list);
                break;
            
            case 'viewproduct':
                
                $objProduct = new Product();
                $viewproduct = $objProduct->viewproduct($request->input('id'));
                echo json_encode($viewproduct);
                break;
            
            case 'chnagefeature':
                $objProduct = new Product();
                $result = $objProduct->chnagefeature($request->input('data'));
                if($result == 'done'){
                    $return['status'] = 'success';
                    $return['message'] = 'Product feature successfully.';
                    $return['redirect'] = route('manage-product');
                }
                if($result == 'wrong'){
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                
                if($result == 'morethenfour'){
                    $return['status'] = 'error';
                    $return['message'] = 'Only 4 product can be feature  ';
                    $return['redirect'] = route('manage-product');
                }
                if($result == 'zero'){
                    $return['status'] = 'error';
                    $return['message'] = 'Please checked product.';
                }
                echo json_encode($return);
                break;
            
            case 'editproduct':
                $objCategory = new Category();
                $data['category'] =  $objCategory->getcategory();
                $objProduct = new Product();
                $data['viewproduct'] = $objProduct->viewproduct($request->input('id'));
                
                $objProductSizePrize = new ProductSizePrize();
                $data['viewproductSizePrize'] = $objProductSizePrize->getproductsizeandprice($request->input('id'));
                
                $result = view('backend.pages.product.editcategorymodel',$data);
                echo $result;
                break;
            
            case 'chnagestatus':
                
                $objProduct = new Product();
                $result = $objProduct->chnagestatus($request->input('data'));
                if($result){
                    $return['status'] = 'success';
                    $return['message'] = 'Product status changed successfully.';
                    $return['redirect'] = route('manage-product');
                }else{
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
            
            case 'deleteProduct':
                
                $objProduct = new Product();
                $res = $objProduct->deleteProduct($request->input('data'));
                if($res){
                    $return['status'] = 'success';
                    $return['message'] = 'Category deleted successfully.';
                    $return['redirect'] = route('manage-product');
                }else{
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
                
            
            
            case 'deleteCategory' :
                $data=$request->input("data");
                $objCategory = new Category();
                $res = $objCategory->deleteCategory($data);
                if($res){
                    $return['status'] = 'success';
                    $return['message'] = 'Product deleted successfully.';
                    $return['redirect'] = route('category');
                }else{
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }
    
    public function editcategory(Request $request){
            if ($request->isMethod('post')) {
                if ($request->isMethod('post')) {
                    $objCategory = new Category();
                    $res = $objCategory->edit($request);
                    if($res == 'add'){
                        $return['status'] = 'success';
                        $return['message'] = 'category added successfully.';
                        $return['redirect'] = route('category');
                    }
                    if($res == 'error'){
                        $return['status'] = 'error';
                        $return['message'] = 'something will be wrong.';
                    }
                    if($res == 'exits'){
                        $return['status'] = 'error';
                        $return['message'] = 'Category name already exits.';
                    }
                    echo json_encode($return);
                    exit;
                }
         }else{
            return redirect()->route('category'); 
         }
    }
}
