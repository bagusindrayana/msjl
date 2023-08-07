<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratInaportnetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Artisan;
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

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['guest']],function(){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'auth'])->name('login.auth');
});
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth']],function(){
    Route::post('logout',[DashboardController::class,'logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('user',UserController::class);
    Route::group(['prefix'=>'konten','as'=>'konten.'],function(){
        Route::get('/profil',[KontenController::class,'profil'])->name('profil');
        Route::post('/profil/update',[KontenController::class,'profilUpdate'])->name('profil.update');
    });
    Route::post('layanan/update-gambar',[LayananController::class,'updateGambar'])->name('layanan.update-gambar');
    Route::resource('layanan',LayananController::class);
    Route::resource('kontak',KontakController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('invoice',InvoiceController::class);
    Route::resource('surat-inaportnet',SuratInaportnetController::class);
});

Route::get('/migrate', function () {
    dd(Artisan::call('migrate'));
});

Route::get('/db-seed', function () {
    dd(Artisan::call('db:seed'));
});

Route::get('/storage-link', function () {
    dd(Artisan::call('storage:link'));
});