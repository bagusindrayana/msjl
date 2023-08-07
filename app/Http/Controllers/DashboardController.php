<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index() {
        $jumlahInvoice = Invoice::count();
        return view('admin.dashboard');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Berhasil logout');
    }
}
