<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\SuratInaportnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index() {
        $jumlahInvoice = Invoice::count();
        $jumlahCustomer = Customer::count();
        $jumlahSurat = SuratInaportnet::count();
        return view('admin.dashboard',compact('jumlahInvoice','jumlahCustomer','jumlahSurat'));
    }

    function logout() {
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Berhasil logout');
    }
}
