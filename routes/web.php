<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('frontend.home');

Route::POST('/masuk', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Auth::routes();

//FRONTEND
    //Rekam Data
    Route::get('/rekamdata', [App\Http\Controllers\Frontend\RekamDataController::class, 'index'])->name('index');
    Route::get('/rekamdata/store', [App\Http\Controllers\Frontend\RekamDataController::class, 'store'])->name('rekamdata.store');

    //Tentang Akun
    Route::get('/tentangakun', [App\Http\Controllers\Frontend\TentangAkunController::class, 'index'])->name('index');

//BACKEND

Route::group(['middleware'=>['hakakses:backend'],'prefix'=>'admin'],function(){

    //Dashboard
    Route::get('panel', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('index');

    //Rekam Data
    Route::get('rekamdata', [App\Http\Controllers\Backend\RekamDataController::class, 'index'])->name('index');
    Route::get('rekamdata/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'detail'])->name('detail');
    Route::get('rekamdata/destroy/{authid}/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'destroy'])->name('destroy');  

    //Manajemen User
    Route::get('manajemenuser', [App\Http\Controllers\Backend\ManajemenUserController::class, 'index'])->name('index');    
});

Route::group(['middleware'=>['hakakses:admin'],'prefix'=>'admin'],function(){
    Route::get('userbackend', [App\Http\Controllers\Backend\ManajemenUserController::class, 'backendindex'])->name('backendindex');
});