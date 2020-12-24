<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
   function __construct(Request $request)
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
        $banner = Banner::first();
      return  view('admin.pages.banner.banner',compact('banner'));
    }
 
    public function update(Request $request)
    {  
       $request->validate([
            'title' => 'required', 
        ]);
        $id = $request->id;
        $image = $this->upload_image($request, $id); 
        if($id != null){ 
            $banner  = Banner::first();
            $banner->title = $request->title;
            $banner->subtitle = $request->subtitle;
            $banner->details = $request->details; 
            $banner->image = $image !== null ? $image : $banner->image; 
            $banner->btn_text = $request->btn_text; 
            $banner->btn_link = $request->btn_link; 
            $banner->save();
        }else{
            $banner  = new Banner;
           $banner->title = $request->title;
            $banner->subtitle = $request->subtitle;
            $banner->details = $request->details; 
            $banner->btn_text = $request->btn_text; 
            $banner->btn_link = $request->btn_link; 
            $banner->image = $image; 
            $banner->save();
        }

        return redirect()->route('banner');
    } 

    private function upload_image($request, $id = null)
    {  
            if ($request->has('image')) { 
                $image = $request->file('image'); 
                $name = 'logo_'.time(); 
                    if($id != null){
                        $banner  = Banner::first(); 
                        $image_path =  $banner->image;  
                        if (Storage::exists($image_path)) {
                            Storage::delete($image_path); 
                        } 
                    }
                $folder = '/uploads/banner/'; 
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();   
                Storage::disk('public')->put($filePath, File::get($image));
                   return $filePath; 
            } 
       
    } 
    
}
