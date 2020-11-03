<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Users;
use Illuminate\Support\Facades\Hash;
class Users extends Model
{
     protected $table = 'users';
    function __construct() {
        
    }
    
    public function getuserdetails($userid){
        $result = Users::select("id","fname","lname","email","profileimage","usertype","headercolor","footercolor")
                ->where("id",$userid)
                ->get();
        return $result;
    }
    
	public function getcolor(){
        $result = Users::select("id","fname","lname","email","profileimage","usertype","headercolor","footercolor")
                ->where("usertype",'admin')
                ->get();
        return $result;
    }
	
    public function edituserdetails($request){
       
        
         $objUser = Users::find($request->input('editid'));
        if(!empty($request->file())){
            if($request->input('oldimage') != '' || $request->input('oldimage') != null){
                unlink(public_path('/images/profileimages/'.$request->input("oldimage")));
            }
            
            $image = $request->file('profileimage');
            $userimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profileimages/');
            $image->move($destinationPath, $userimage);
            $objUser->profileimage = $userimage;
        }
        
       
        $objUser->fname = $request->input('firstname');
        $objUser->lname = $request->input('lastname');
        $objUser->email = $request->input('email');
        
        $objUser->updated_at = date('Y-m-d H:i:s');
//        $objUser->save();
        return $objUser->save();
    }
    
	public function colorchange($request){
       
        
        $objUser = Users::find($request->input('editid'));
        $objUser->headercolor = $request->input('headercolor');
        $objUser->footercolor = $request->input('footercolor');
        $objUser->updated_at = date('Y-m-d H:i:s');

        return $objUser->save();
    }
	
    public function changepassword($request){
         $result = Users::select("password")
                ->where("id",$request->input('editid'))
                ->get();

         $newpassword = Hash::make($request->input('newpassword') );

        if (Hash::check($request->input('oldpassword') , $result[0]->password)) {
            $objUser = Users::find($request->input('editid'));
            $objUser->password = $newpassword;        
            $objUser->updated_at = date('Y-m-d H:i:s');
            if($objUser->save()){
                return "changed";
            }else{
                return "wrong";
            }
        }else{
            return "notmatch";
        }
        
    }
}
