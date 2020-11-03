<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductSizePrize;

class ProductController extends Controller {

    function __construct() {
        
    }

    public function index() {

        $objCategory = new Category();
        $data['category'] = $objCategory->getCategory();
        $objProduct = new Product();
        $data['product'] = $objProduct->productlist();
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('product.js');
        $data['funinit'] = array('Product.init()');
        return view('frontend.pages.product', $data);
    }

    public function details(Request $request, $id){
        
        $objProduct = new Product();
        $data['product'] = $objProduct->viewproduct($id);
        
         $objProductSizePrize = new ProductSizePrize();
         $data['viewproductSizePrize'] = $objProductSizePrize->getproductsizeandprice($id);
                
        $data['title'] = 'Buy Online Maple Products in Canada – Wagler Maple Products';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('product.js');
        $data['funinit'] = array('Product.init()');
        return view('frontend.pages.productdetails', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getProduct':
                $objProduct = new Product();
                $result = $objProduct->getproduct($request->input('id'));
                return json_encode($result);
                break;
        }
    }

}
