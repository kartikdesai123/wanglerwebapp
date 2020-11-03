<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use file;

class Silder extends Model {

    protected $table = 'silder';

    function __construct() {
        
    }

    public function deleteSilder($data) {

        $resut = Silder::where('id', $data['id'])->delete();
        if ($resut) {
            $path = 'public/images/silder/' . $data['silderimage'];

            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    public function add($request) {
        if ($request->file()) {
            $image = $request->file('silderimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/silder/');
            $image->move($destinationPath, $name);

            $objSilder = new Silder();
            $objSilder->silderimage = $name;
            $objSilder->created_at = date("Y-m-d h:i:s");
            $objSilder->updated_at = date("Y-m-d h:i:s");
            return $objSilder->save();
        } else {
            return false;
        }
    }

    public function viewsilder($id) {
        $query = Silder::from('silder')
                ->where('id', $id)
                ->select('silderimage', 'id')
                ->get();
        return $query[0];
    }

    public function editsilder($request) {

        if ($request->file()) {
            $image = $request->file('silderimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/silder/');
            $image->move($destinationPath, $name);

            $objSilder = Silder::find($request->input('id'));
            $objSilder->silderimage = $name;
            $objSilder->created_at = date("Y-m-d h:i:s");
            $objSilder->updated_at = date("Y-m-d h:i:s");
            return $objSilder->save();
        } else {
            return false;
        }
    }

    public function chnagestatus($data) {

        $objSilder = Silder::find($data['id']);
        $objSilder->status = $data['status'];
        $objSilder->updated_at = date("Y-m-d h:i:s");
        return $objSilder->save();
    }

    public function getSlider() {
        
        $result = Silder::select('*')
                ->orderBy('id', 'desc')
//                ->take(1)
                ->get();
        return $result;
    }

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'silderimage',
            2 => 'status',
        );

        $query = Category::from('silder');

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
                ->select('id', 'silderimage', 'status')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $imagepath = url('public/images/silder/' . $row['silderimage']);


            if ($row['status'] == "active") {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="deactive"><i class="feather icon-check" ></i></a></center>';
            } else {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="active"><i class="feather icon-x-circle" data-id="' . $row["id"] . '"></i></a></center>';
            }

            $actionhtml = '';
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editsilder" data-silderimage="' . $row["silderimage"] . '"  data-id="' . $row["id"] . '"><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletesilder" data-silderimage="' . $row["silderimage"] . '"  data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '" alt="contact-img" title="contact-img" class="rounded mr-3" height="48"></center>';
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

}
