<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SocialInfoController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_info = SocialInfo::first();
      return  view('admin.pages.social-info.social-info',compact('social_info'));
    }
 
    public function update(Request $request)
    {      
        $id = $request->id;  
        
        if($id != null){ 
            $infos  = SocialInfo::first(); 
        }else{
            $infos  = new SocialInfo;  
        }

        
        if($request->icon[0] != null && $request->link[0] != null){
            $link = [];
            $i = 0;
            for($i; $i < count($request->icon); $i++){
                $link[][$request->icon[$i]] = $request->link[$i];
            } 
            $infos->social_datas= json_encode($link);
        }


        if($request->address_details[0] != null){
            $addresses = [];
            $i = 0;
            for($i; $i < count($request->address_details); $i++){
                $addresses[] = $request->address_icon[$i] . '|##|'. $request->address_details[$i];
            } 
               $infos->address_datas = json_encode($addresses);
        }
 
 
       $infos->save(); 

        return redirect()->route('socialinfos');
    } 
 
}