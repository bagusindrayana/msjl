<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class,'index'])->name('welcome');


Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'auth'])->name('login.auth');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('user',UserController::class);
    Route::group(['prefix'=>'konten','as'=>'konten.'],function(){
        Route::get('/profil',[KontenController::class,'profil'])->name('profil');
        Route::post('/profil/update',[KontenController::class,'profilUpdate'])->name('profil.update');
    });
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
});