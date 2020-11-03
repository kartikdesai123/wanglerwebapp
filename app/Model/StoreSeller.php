<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreSeller extends Model {

    protected $table = "storeseller";

    public function addseller($request) {

        $objSeller = new StoreSeller();
        $objSeller->city_id = $request->input('city_id');
		$objSeller->sellername = $request->input('sellername');
		$objSeller->selleraddress = $request->input('selleraddress');
		$objSeller->sellerphoneno = $request->input('sellerphone');
        $objSeller->created_at = date("Y-m-d h:i:s");
        $objSeller->updated_at = date("Y-m-d h:i:s");
        return $objSeller->save();
    }

    public function viewseller($id) {
        $query = StoreSeller::from('storeseller')
                ->where('city_id', $id)
                ->select('sellername', 'id' ,'city_id','selleraddress','sellerphoneno')
                ->get();
        return $query[0];
    }

	public function viewAllSeller() {
        $query = StoreSeller::from('storeseller')
               
                ->select('sellername', 'id' ,'city_id','selleraddress','sellerphoneno')
                ->get();
        return $query;
    }
    public function editseller($request) {

        $objSeller = StoreSeller::find($request->input('id'));
		$objSeller->sellername = $request->input('sellername');
		$objSeller->selleraddress = $request->input('selleraddress');
		$objSeller->sellerphoneno = $request->input('sellerphone');
        $objSeller->created_at = date("Y-m-d h:i:s");
        $objSeller->updated_at = date("Y-m-d h:i:s");
        return $objSeller->save();
    }

    public function deleteseller($data) {

        $resut = StoreSeller::where('id', $data['id'])->delete();
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
            0 => 'storeseller.id',
            1 => 'cityname',
			2 => 'sellername',
			3 => 'selleraddress',
			4 => 'sellerphoneno'
        );

        $query = StoreSeller::from('storeseller')
		->join('managecity', 'managecity.id', '=', 'storeseller.city_id');

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
                ->select('storeseller.id as sellerid', 'sellername','cityname','selleraddress','sellerphoneno')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '';
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editseller" data-id="' . $row["sellerid"] . '"><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deleteseller" data-id="' . $row["sellerid"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row['cityname'] . '</center>';
			$nestedData[] = '<center>' . $row['sellername'] . '</center>';
			$nestedData[] = '<center>' . $row['selleraddress'] . '</center>';
			$nestedData[] = '<center>' . $row['sellerphoneno'] . '</center>';
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
