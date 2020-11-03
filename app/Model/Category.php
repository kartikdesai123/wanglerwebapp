<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';

    function __construct() {
        
    }

    public function getcategory() {
        $result = Category::select("category", "id")
                ->where("isdeleted", "No")
                ->get();
        return $result;
    }

    public function getData() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'category',
        );

        $query = Category::from('category')
                ->where('isdeleted', 'No');

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
                        ->select('id', 'category')->get();
        $data = array();

        $i = 0;

        foreach ($resultArr as $row) {
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success btnedit" data-category="' . $row["category"] . '" data-id="' . $row["id"] . '"><i class="feather icon-edit"></i></a>
                         <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger btndelete" data-id="' . $row["id"] . '"><i class="feather icon-trash-2"></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row["category"] . '</center>';
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
        $res = Category::where('category', $request->input('category'))
                ->where('isdeleted', 'No')
                ->count();

        if ($res == 0) {
            $objcategory = new Category();
            $objcategory->category = $request->input('category');
            $objcategory->isdeleted = "No";
            $objcategory->created_at = date("Y-m-d h:i:s");
            $objcategory->updated_at = date("Y-m-d h:i:s");
            if ($objcategory->save()) {
                return "add";
            } else {
                return "error";
            }
        } else {
            return "exits";
        }
    }

    public function edit($request) {

        $res = Category::where('category', $request->input('category'))
                ->where('id', "!=", $request->input('editcategoryid'))
                ->count();

        if ($res == 0) {
            $objcategory = Category::find($request->input('editcategoryid'));
            $objcategory->category = $request->input('category');
            $objcategory->updated_at = date("Y-m-d h:i:s");
            if ($objcategory->save()) {
                return "add";
            } else {
                return "error";
            }
        } else {
            return "exits";
        }
    }

    public function deleteCategory($data) {
        $objcategory = Category::find($data['id']);
        $objcategory->isdeleted = "Yes";
        $objcategory->updated_at = date("Y-m-d h:i:s");
        return $objcategory->save();
    }

}
