<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {

    protected $table = "pages";

    public function getPages($request, $id) {

        $result = Pages::select('id', 'title', 'content')
                ->where('id', $id)
                ->get();
        return $result;
    }

    public function getPageList() {

        $result = Pages::select('id', 'title', 'content')
                ->where('status', 'active')
                ->get();
        return $result;
    }

    public function addpages($request) {

//        if ($request->file()) {
//            $image = $request->file('pageimage');
//            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
//            $destinationPath = public_path('/images/page_image/');
//            $image->move($destinationPath, $name);

        $objPages = new Pages();
//            $objPages->image = $name;
        $objPages->title = $request->input('pagetitle');
        $objPages->content = $request->input('pagecontent');
        $objPages->created_at = date("Y-m-d h:i:s");
        $objPages->updated_at = date("Y-m-d h:i:s");
        return $objPages->save();
//        } else {
//            return false;
//        }
    }

    public function deletepages($data) {

        $resut = Pages::where('id', $data['id'])->delete();
        if ($resut) {
//            $path = 'public/images/page_image/' . $data['image'];
//
//            if (file_exists($path)) {
//                unlink($path);
//            }
            return true;
        } else {
            return false;
        }
    }

    public function editpages($request, $id) {

//        if ($request->file()) {
//            $image = $request->file('pageimage');
//            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
//            $destinationPath = public_path('/images/page_image/');
//            $image->move($destinationPath, $name);

        $objPages = Pages::find($request->input('id'));
//            $objPages->image = $name;
        $objPages->title = $request->input('pagetitle');
        $objPages->content = $request->input('pagecontent');
        $objPages->created_at = date("Y-m-d h:i:s");
        $objPages->updated_at = date("Y-m-d h:i:s");
        return $objPages->save();
//        } else {
//            $objPages = Pages::find($id);
//            $objPages->title = $request->input('pagetitle');
//            $objPages->content = $request->input('pagecontent');
//            $objPages->created_at = date("Y-m-d h:i:s");
//            $objPages->updated_at = date("Y-m-d h:i:s");
//            return $objPages->save();
//        }
    }

    public function chnagestatus($data) {

        $objPages = Pages::find($data['id']);
        $objPages->status = $data['status'];
        $objPages->updated_at = date("Y-m-d h:i:s");
        return $objPages->save();
    }

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'title',
            2 => 'content',
        );

        $query = Pages::from('pages');

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
                ->select('id', 'title', 'created_at', 'status')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
//            $imagepath = url('public/images/page_image/' . $row['image']);


            if ($row['status'] == "active") {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary pagestatus" data-id="' . $row["id"] . '" data-status="deactive"><i class="feather icon-check" ></i></a></center>';
            } else {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary pagestatus" data-id="' . $row["id"] . '" data-status="active"><i class="feather icon-x-circle" data-id="' . $row["id"] . '"></i></a></center>';
            }

            $actionhtml = '';
            $actionhtml = '<center><a href="' . route('editpages', $row['id']) . '"  class="btn btn-icon btn-outline-success "><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletepage" data-pageimage="' . $row["image"] . '"  data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row['title'] . '</center>';
//            $nestedData[] = '<center><img src="' . $imagepath . '" alt="contact-img" title="contact-img" class="rounded mr-3" height="48"></center>';
            $nestedData[] = '<center>' . $row['created_at'] . '</center>';
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
