<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    public function resetpasswordview()
    {
        return view('auth.passwords.phone');
    }
    public function resetpassword(Request $request)
    {
          $request->validate([
            'phone' => 'required|string|size:10|regex:/[0-9]{9}/', 
        ]);
 
        $user = User::where('phone', $request->phone)->first();
        if($user){
              session()->put('phone', $user->phone);
            return redirect()->route('reset');
        }
        session()->flash('message', 'Phone number does not match'); 
        return redirect()->back(); 
    }
    public function resetvew()
    {
        return view('auth.passwords.reset');
    }
    public function reset(Request $request)
    {
          $request->validate([
            'password' => 'required|string|min:8|confirmed', 
        ]);

        $user = User::where('phone', $request->phone)->update(['password' => Hash::make($request->password)]);
        if($user){
            return redirect()->route('login');
        }
        session()->flash('message', 'Something went wrong! Try again'); 
        return redirect()->back();  
    }
}
