<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index() {
        $layanans = Layanan::orderBy('created_at','desc')->get();
        return view('welcome',compact('layanans'));
    }
}
