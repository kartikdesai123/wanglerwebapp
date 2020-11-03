<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductSizePrize extends Model {

    protected $table = 'product_size_prize';

    function __construct() {
        
    }

    public function addProductSizePrice($request, $productID) {
        
        
        for ($i = 0; $i < count($request->input('productsize')); $i++) {
            $objProduct = new ProductSizePrize();
            if (($request->input('productsize')[$i] != "") && ($request->input('productprice')[$i] != "")) {
                $objProduct->product_id = $productID;
                $objProduct->productsize = $request->input('productsize')[$i];
                $objProduct->productprize = $request->input('productprice')[$i];
                $objProduct->save();
              //  exit;
            }
        }
    }

    public function getproductsizeandprice($id) {

        $query = ProductSizePrize::select('*');

        $result = $query->where('product_size_prize.product_id', $id)
                ->get();
        return $result;
    }

    public function editProductSizePrice($request, $productID){
        
        $resut = ProductSizePrize::where('product_id', $productID)->delete();
        $this->addProductSizePrice($request, $productID);
    }
}
