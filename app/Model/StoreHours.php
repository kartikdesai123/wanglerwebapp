<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreHours extends Model {

    protected $table = "store_hours";

    public function editstoreHours($request) {

        $objHours = StoreHours::find($request->input('hours_id'));
        $objHours->hours = $request->input('store_hours');
        $objHours->created_at = date("Y-m-d h:i:s");
        $objHours->updated_at = date("Y-m-d h:i:s");
        return $objHours->save();
    }
    
    public function getRecords(){
        $query = StoreHours::get()->toArray();
        return $query;
    }

}
