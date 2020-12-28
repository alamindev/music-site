<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Session as userSession;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = Banner::first();
        return view('pages.index', compact('banner'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $sessions = userSession::where('user_id', auth()->user()->id)->paginate(15);
        return view('pages.profile.profile',compact('sessions'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile()
    {
        return view('pages.profile.update-profile');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {   
         $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|string|email|exists:users', 
            'phone' => 'required|string|regex:/[0-9]{9}/|size:10|exists:users', 
            'school_name' => 'required', 
            'city' => 'required', 
            'state' => 'required', 
            'country' => 'required', 
        ]);
        $photo = $this->upload_photos($request);
         $user = User::find(auth()->user()->id); 
         $user->first_name  = $request->first_name;
         $user->last_name  = $request->last_name; 
         $user->email  = $request->email; 
         $user->phone  = $request->phone; 
         $user->school_name  = $request->school_name; 
         $user->city  = $request->city; 
         $user->state  = $request->state; 
         $user->country  = $request->country; 
         $user->teacher_name  = $request->teacher_name; 
         $user->photo  =  $photo; 
         $user->save();

         return redirect()->route('profile');
    }
    private function upload_photos($request)
    { 
       if ($request->has('photo')) {  
                $image = $request->file('photo'); 
                $name = 'photo_'.time();  
                $user  = User::find(auth()->user()->id); 
                $image_path =  $user->photo;  
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); 
                }  
                $folder = '/uploads/users/'; 
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();  
                $name = !is_null($name) ? $name : Str::random(25); 
                $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
                return $filePath; 
            } 
    }
}
