<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallay extends Model {

    protected $table = 'gallay';

    function __construct() {
        
    }

    public function viewgallay($id) {

        $query = Gallay::from('gallay')
                ->where('id', $id)
                ->select('gallayimage', 'id')
                ->get();
        return $query[0];
    }

    public function getGallery() {

        $result = Gallay::select('id', 'gallayimage')
                ->get();
        return $result;
    }

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'gallayimage',
            2 => 'status',
        );

        $query = Category::from('gallay');

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
                ->select('id', 'gallayimage', 'status')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $imagepath = url('public/images/gallay/' . $row['gallayimage']);


            if ($row['status'] == "active") {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="deactive"><i class="feather icon-check" ></i></a></center>';
            } else {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="' . $row["id"] . '" data-status="active"><i class="feather icon-x-circle" data-id="' . $row["id"] . '"></i></a></center>';
            }

            $actionhtml = '';
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editgallay" data-gallayimage="' . $row["gallayimage"] . '"  data-id="' . $row["id"] . '"><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletegallay" data-gallayimage="' . $row["gallayimage"] . '"  data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
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

    public function editgallay($request) {

        if ($request->file()) {

            $image = $request->file('gallayimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/gallay/');
            $image->move($destinationPath, $name);

            $objGallay = Gallay::find($request->input('id'));
            $objGallay->gallayimage = $name;
            $objGallay->created_at = date("Y-m-d h:i:s");
            $objGallay->updated_at = date("Y-m-d h:i:s");
            return $objGallay->save();
        } else {
            return false;
        }
    }

    public function add($request) {
        if ($request->file()) {
            $image = $request->file('gallayimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/gallay/');
            $image->move($destinationPath, $name);

            $objGallay = new Gallay();
            $objGallay->gallayimage = $name;
            $objGallay->status = "active";
            $objGallay->created_at = date("Y-m-d h:i:s");
            $objGallay->updated_at = date("Y-m-d h:i:s");
            return $objGallay->save();
        } else {
            return false;
        }
    }

    public function deleteGallay($data) {

        $resut = Gallay::where('id', $data['id'])->delete();
        if ($resut) {
            $path = 'public/images/gallay/' . $data['gallayimage'];

            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    public function chnagestatus($data) {

        $objGallay = Gallay::find($data['id']);
        $objGallay->status = $data['status'];
        $objGallay->updated_at = date("Y-m-d h:i:s");
        return $objGallay->save();
    }

}
