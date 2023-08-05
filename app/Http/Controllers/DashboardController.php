<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index() {
        return view('admin.dashboard');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Berhasil logout');
    }
}
