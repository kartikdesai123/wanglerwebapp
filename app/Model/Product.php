<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Model\ProductSizePrize;

class Product extends Model {

    protected $table = 'product';
    protected $fillable = ['name', 'id', 'description', 'price', 'image', 'feature', 'status', 'category', 'created_at', 'updated_at'];

    function __construct() {
        
    }

    public function productlist() {
        $result = Category::from('product')
                ->join('category', 'category.id', '=', 'product.category')
                ->where('product.isdelete', 'No')
                ->select('product.id', 'product.name', 'product.description', 'product.price', 'product.image', 'product.feature', 'product.status', 'category.category')
                ->get();
        return $result;
    }

    public function getproduct($id) {

        $query = Product::select('*');
            if($id != ""){
                $query->where('product.category', $id);
            }
        $result = $query->where('product.isdelete', 'No')
                ->select('product.id', 'product.name', 'product.description', 'product.price', 'product.image', 'product.feature', 'product.status')
                ->get();
        return $result;
    }

    public function getfeatureProduct() {

        $result = Product::select('id', 'name', 'description', 'price', 'image')
                ->where('feature', 'Yes')
                ->get();
        return $result;
    }

    public function getData() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'product.id',
            1 => 'product.name',
            2 => 'category.category',
            3 => 'product.description',
            4 => 'product.price',
        );

        $query = Category::from('product')
                ->join('category', 'category.id', '=', 'product.category')
                ->where('product.isdelete', 'No');

        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                        ->take($requestData['length'])
                        ->select('product.id', 'product.name', 'product.description', 'product.price', 'product.image', 'product.feature', 'product.status', 'category.category')->get();

        $data = array();

        $i = 0;

        foreach ($resultArr as $row) {
            $imagepath = url('public/images/product/' . $row['image']);
            if ($row['feature'] == "Yes") {
                $featurehtml = '<center><input type="checkbox" class="form-check-input feature" data-id="' . $row["id"] . '" checked="checked"></center>';
            } else {
                $featurehtml = '<center><input type="checkbox" class="form-check-input feature" data-id="' . $row["id"] . '" ></center>';
            }

            if ($row['status'] == "active") {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="deactive"><i class="feather icon-check" ></i></a></center>';
            } else {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="active"><i class="feather icon-x-circle" data-id="' . $row["id"] . '"></i></a></center>';
            }
            $actionhtml = '';
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#viewmodel" class="btn btn-icon btn-outline-primary viewproduct" data-id="' . $row["id"] . '"><i class="feather icon-eye"></i></a>
                        <a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editproduct" data-id="' . $row["id"] . '"><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deleteproduct" data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row["name"] . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '" alt="contact-img" title="contact-img" class="rounded mr-3" height="48"></center>';
            $nestedData[] = '<center>' . $row["category"] . '</center>';
            $nestedData[] = '<center>' . $row["description"] . '</center>';
            $nestedData[] = '<center>' . $row["price"] . '</center>';
            $nestedData[] = $featurehtml;
            $nestedData[] = $statushtml;
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function add($request) {
        $res = Product::where('name', $request->input('productname'))
                ->where('category', $request->input('productcategory'))
                ->count();
        
      //  print_r($request->input());exit;
        if ($res == 0) {
            if ($request->file()) {
                $image = $request->file('productimage');
                $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/product/');
                $image->move($destinationPath, $name);
            }
            $objProduct = new Product();
            $objProduct->name = $request->input('productname');
            $objProduct->category = $request->input('productcategory');
            $objProduct->description = $request->input('productdescription');
            $objProduct->price = 0;
            $objProduct->image = $name;
            $objProduct->feature = "No";
            $objProduct->status = "active";
            $objProduct->isdelete = "No";
            $objProduct->created_at = date("Y-m-d h:i:s");
            $objProduct->updated_at = date("Y-m-d h:i:s");
            if ($objProduct->save()) {
                $objProductSizePrize = new ProductSizePrize();
                $objProductSizePrize->addProductSizePrice($request,$objProduct->id);
                return "add";
            } else {
                return "wrong";
            }
        } else {
            return "exits";
        }
    }

    public function viewproduct($id) {
        $query = Category::from('product')
                ->join('category', 'category.id', '=', 'product.category')
                ->where('product.id', $id)
                ->select('product.id', 'product.name', 'product.category as categoryid', 'product.description', 'product.price', 'product.image', 'product.feature', 'product.status', 'category.category')
                ->get();
        return $query[0];
    }

    public function deleteProduct($data) {
        $objProduct = Product::find($data['id']);
        $objProduct->isdelete = "Yes";
        $objProduct->updated_at = date("Y-m-d h:i:s");
        return $objProduct->save();
    }

    public function edit($request) {

        $res = Product::where('name', $request->input('productname'))
                ->where('category', $request->input('productcategory'))
                ->where('id', "!=", $request->input('editid'))
                ->count();
        if ($res == 0) {
            if ($request->file()) {

                $image = $request->file('productimage');
                $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/product/');
                $image->move($destinationPath, $name);

                $objProduct = Product::find($request->input('editid'));
                $objProduct->image = $name;
                $objProduct->name = $request->input('productname');
                $objProduct->category = $request->input('productcategory');
                $objProduct->description = $request->input('productdescription');
            //    $objProduct->price = $request->input('productprice');
                $objProduct->updated_at = date("Y-m-d h:i:s");
                if ($objProduct->save()) {
                    
                    $objProductSizePrize = new ProductSizePrize();
                    $objProductSizePrize->editProductSizePrice($request,$request->input('editid'));
                
                    return "edited";
                } else {
                    return "wrong";
                }
            } else {
                $objProduct = Product::find($request->input('editid'));
                $objProduct->name = $request->input('productname');
                $objProduct->category = $request->input('productcategory');
                $objProduct->description = $request->input('productdescription');
               // $objProduct->price = $request->input('productprice');
                $objProduct->updated_at = date("Y-m-d h:i:s");
                if ($objProduct->save()) {
                    $objProductSizePrize = new ProductSizePrize();
                    $objProductSizePrize->editProductSizePrice($request,$request->input('editid'));
                    return "edited";
                } else {
                    return "wrong";
                }
            }
        } else {
            return "exits";
        }
    }

    public function chnagestatus($data) {

        $objProduct = Product::find($data['id']);
        $objProduct->status = $data['status'];
        $objProduct->updated_at = date("Y-m-d h:i:s");
        return $objProduct->save();
    }

    public function chnagefeature($data) {
        if ($data['featureid'] == null || $data['featureid'] == '') {
            return "zero";
        } else {
            $featureid = explode(",", $data['featureid']);


            if (count($featureid) > 4) {
                return "morethenfour";
            } else {
                $result = DB::table('product')
                        ->update(['feature' => "No", 'updated_at' => date("Y-m-d h:i:s")]);
//                $objProduct = new Product();
//                $objProduct->feature="No";
//                $objProduct->updated_at=date("Y-m-d h:i:s");
                if ($result) {

                    for ($i = 0; $i < count($featureid); $i++) {
                        $objProductfeature = Product::find($featureid[$i]);
                        $objProductfeature->feature = "Yes";
                        $objProductfeature->save();
                    }
                    return 'done';
                } else {
                    return 'wrong';
                }
            }
        }
    }

}
