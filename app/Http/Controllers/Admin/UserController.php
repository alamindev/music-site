<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UserController extends Controller
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
    public function index(Request $request)
    {
          if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()  
                ->addColumn('action', function($row){
                    $btn = '<a href='.route("user.show", $row->id).'  class="view btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a><a href='.route("user.edit", $row->id).'  class="edit btn btn-success btn-sm mr-2"><i class="fa fa-edit"></i></a><a href="javascript:void(0)"  data-remote='.route("user.destroy", $row->id).' class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('name', function($row){ 
                    return $row->first_name . " ". $row->last_name;
                })
                ->addColumn('user_type', function($row){ 
                     if($row->is_admin == 0){
                         return 'Student';
                     }else{
                         return 'Admin';
                     }
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
      
        return view('admin.pages.users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.users.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
         $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|string|email|unique:users', 
            'phone' => 'required|string|regex:/[0-9]{9}/|size:10|unique:users', 
            'school_name' => 'required', 
            'city' => 'required', 
            'state' => 'required', 
            'country' => 'required', 
        ]);
        $photo = $this->upload_photos($request);
         $user = new User(); 
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
         $user->password  =  Hash::make($request->password); 
         $user->save();
        return redirect()->route('users');
    }
 private function upload_photos($request)
    { 
       if ($request->has('photo')) {  
                $image = $request->file('photo'); 
                $name = 'photo_'.time();   
                $folder = '/uploads/users/'; 
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();  
                $name = !is_null($name) ? $name : Str::random(25); 
                $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
                return $filePath; 
            } 
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = user::find($id);
        return view('admin.pages.users.view-user', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = user::find($id);
        return view('admin.pages.users.edit-user', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            'password' => ['confirmed'],
        ]);
        $photo = $this->update_photos($request);
         $user = User::find($id); 
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
         $user->password  =  Hash::make($request->password); 
         $user->save();
        return redirect()->route('users');
        return redirect()->route('users');
    }
  private function update_photos($request)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = user::find($id);
        if ($user) {
            $file_path = $user->photo;  
            if (Storage::exists($file_path)) {
                Storage::delete($file_path); 
            }  
            $user->delete();
             return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
