<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    protected $table = 'video';

    public function addvideo($request) {
        if ($request->file()) {
            $image = $request->file('videoname');
            $name = 'admin' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/video/');
            $image->move($destinationPath, $name);

            $objVideo = new Video();
            $objVideo->videoname = $name;
            $objVideo->type = $request->input('gridRadios');
            $objVideo->title = $request->input('title');
            $objVideo->created_at = date("Y-m-d h:i:s");
            $objVideo->updated_at = date("Y-m-d h:i:s");
            return $objVideo->save();
        } else {

            $objVideo = new Video();
            $objVideo->videoname = $request->input('embedcode');
            $objVideo->type = $request->input('gridRadios');
            $objVideo->title = $request->input('title');
            $objVideo->created_at = date("Y-m-d h:i:s");
            $objVideo->updated_at = date("Y-m-d h:i:s");
            return $objVideo->save();
        }
    }

    public function deletevideo($data) {

        $resut = Video::where('id', $data['id'])->delete();
        if ($resut) {
            $path = 'public/video/' . $data['video'];

            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    public function getVideo() {

        $result = Video::select('*')
                ->get();
        return $result;
    }

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'videoname',
            2 => 'title',
        );

        $query = Video::from('video');

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
                ->select('id', 'videoname', 'title', 'type')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $imagepath = url('public/video/' . $row['videoname']);


            if ($row['type'] == "manually") {
                $video = '<center><video width="50" height="50" controls><source src="public/video/' . $row["videoname"] . '" type="video/mp4"></video></center>';
            } else {
                $video = '<center><iframe width="50" height="50" src="https://www.youtube.com/embed/W_p-PYvE1IU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>';
            }

            $actionhtml = '';
            $whatIWant = substr($row["videoname"], strpos($row["videoname"], 'src') + 5);
            $variable = substr($whatIWant, 0, strpos($whatIWant, '"'));
            $actionhtml = '<center><a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deletevideo" data-video="' . $variable . '"  data-id="' . $row["id"] . '" ><i class="feather icon-trash-2" ></i></a></center>';
            $i++;
            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = $video;
            $nestedData[] = '<center>' . $row['title'] . '<center>';
            $nestedData[] = '<center>' . $actionhtml . '<center>';
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
