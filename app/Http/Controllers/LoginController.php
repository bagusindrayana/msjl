<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() {
        return view('auth.login');
    }

    function auth(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username'=>$username,'password'=>$password],$request->remember_me)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('error','Username atau password salah');
        }
        
    }
}
