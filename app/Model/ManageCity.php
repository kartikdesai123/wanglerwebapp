<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ManageCity extends Model {

    protected $table = "managecity";

    public function addCity($request) {

        $objCity = new ManageCity();
        $objCity->cityname = $request->input('cityname');
        $objCity->created_at = date("Y-m-d h:i:s");
        $objCity->updated_at = date("Y-m-d h:i:s");
        return $objCity->save();
    }

    public function getcity() {
        $result = ManageCity::select('cityname','id')
                ->get();
        return $result;
    }
    
    public function viewcity($id) {
        $query = ManageCity::from('managecity')
                ->where('id', $id)
                ->select('cityname', 'id')
                ->get();
        return $query[0];
    }

    public function editcity($request) {

        $objCity = ManageCity::find($request->input('id'));
        $objCity->cityname = $request->input('cityname');
        $objCity->created_at = date("Y-m-d h:i:s");
        $objCity->updated_at = date("Y-m-d h:i:s");
        return $objCity->save();
    }

    public function deletecity($data) {

        $resut = ManageCity::where('id', $data['id'])->delete();
        if ($resut) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'cityname',
        );

        $query = ManageCity::from('managecity');

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
                ->select('id', 'cityname')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '';
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editcity" data-id="' . $row["id"] . '"><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletecity" data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row['cityname'] . '</center>';
            $nestedData[] = '<center>' . $actionhtml . '</center>';
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
