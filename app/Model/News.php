<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = "news";
   
    public function getNewsList() {
        
        $result = News::select('*')
                ->where('status','active')
                ->get();
        return $result;
    }
    
    public function getNews($request, $id) {
        
        $result = News::select('id','title','content','image')
                ->where('id', $id)
                ->get();
        return $result;
    }
    
    public function addnews($request) {

        if ($request->file()) {
            $image = $request->file('newsimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/news/');
            $image->move($destinationPath, $name);

            $objNews = new News();
            $objNews->image = $name;
            $objNews->title = $request->input('newstitle');
            $objNews->content = $request->input('pagecontent');
            $objNews->created_at = date("Y-m-d h:i:s");
            $objNews->updated_at = date("Y-m-d h:i:s");
            return $objNews->save();
        } else {
            return false;
        }
    }

    public function deletenews($data) {

        $resut = News::where('id', $data['id'])->delete();
        if ($resut) {
            $path = 'public/images/news/' . $data['image'];

            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    public function editnews($request, $id) {
       
        if ($request->file()) {
            
            $image = $request->file('newsimage');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/news/');
            $image->move($destinationPath, $name);

            $objNews = News::find($request->input('id'));
            $objNews->image = $name;
            $objNews->title = $request->input('newstitle');
            $objNews->content = $request->input('pagecontent');
            $objNews->created_at = date("Y-m-d h:i:s");
            $objNews->updated_at = date("Y-m-d h:i:s");
            return $objNews->save();
        } else {
           
            $objNews = News::find($id);
            $objNews->title = $request->input('newstitle');
            $objNews->content = $request->input('pagecontent');
            $objNews->created_at = date("Y-m-d h:i:s");
            $objNews->updated_at = date("Y-m-d h:i:s");
            return $objNews->save();
        }
    }

    public function chnagestatus($data) {

        $objNews = News::find($data['id']);
        $objNews->status = $data['status'];
        $objNews->updated_at = date("Y-m-d h:i:s");
        return $objNews->save();
    }

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'title',
            2 => 'image',
            3 => 'content',
        );

        $query = News::from('news');

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
                ->select('id', 'title', 'image', 'content', 'status')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $imagepath = url('public/images/news/' . $row['image']);


            if ($row['status'] == "active") {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary newsstatus" data-id="' . $row["id"] . '" data-status="deactive"><i class="feather icon-check" ></i></a></center>';
            } else {
                $statushtml = '<center><a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary newsstatus" data-id="' . $row["id"] . '" data-status="active"><i class="feather icon-x-circle" data-id="' . $row["id"] . '"></i></a></center>';
            }

            $actionhtml = '';
            $actionhtml = '<center><a href="' . route('editnews', $row['id']) . '"  class="btn btn-icon btn-outline-success "><i class="feather icon-edit" ></i></a>
                        <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletenews" data-newsimage="' . $row["image"] . '"  data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $row['title'] . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '" alt="contact-img" title="contact-img" class="rounded mr-3" height="48"></center>';
            $nestedData[] = '<center>' . $row['content'] . '</center>';
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
