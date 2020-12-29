<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  loginView()
    {
        if(auth()->check() ){
            if(auth()->user()->is_admin === 1){
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('index');
            } 
        }
         return view('admin.auth.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  Login(Request $request)
    {
         $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $remember_me = $request->has('remember') ? true : false;  

        $userdata = [
            'email'  => $request->email,
            'password'  => $request->password
        ];

        $user = User::where('email', $request->email)->where('is_admin', 1)->first();
        if($user){
            if (auth()->attempt($userdata,$remember_me)) { 
                return redirect()->route('admin.home'); 
            }else{
                session()->flash('message', 'Invalid credentials!');
                return redirect()->back();
            }
        }else{
            session()->flash('message', 'Invalid credentials!');
            return redirect()->back();
        }
        
    }

    public function logout(Request $request) {
        Auth::logout();
    return redirect('/admin/login');
    }
    
}
