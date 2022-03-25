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
    Route::post('/rekamdata/store', [App\Http\Controllers\Frontend\RekamDataController::class, 'store'])->name('rekamdata.store');
    Route::get('/rekamdata/edit/{id}', [App\Http\Controllers\Frontend\RekamDataController::class, 'edit'])->name('edit');
    Route::post('/rekamdata/update', [App\Http\Controllers\Frontend\RekamDataController::class, 'update'])->name('rekamdata.update');
    Route::get('/rekamdata/destroy/{id}', [App\Http\Controllers\Frontend\RekamDataController::class, 'destroy'])->name('destroy');

    //Tentang Akun
    Route::get('/changepassword', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'index'])->name('index');
    Route::get('/user/change', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'change'])->name('change');

//BACKEND

Route::group(['middleware'=>['hakakses:backend'],'prefix'=>'admin'],function(){

    //Dashboard
    Route::get('panel', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('index');

    //Rekam Data
    Route::get('rekamdata', [App\Http\Controllers\Backend\RekamDataController::class, 'index'])->name('index');
    Route::get('rekamdata/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'detail'])->name('detail');
    Route::get('rekamdata/terhapus/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'terhapus'])->name('terhapus');
    Route::get('rekamdata/destroy/{authid}/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'destroy'])->name('destroy');  

    //Manajemen User
    Route::get('user/biasa', [App\Http\Controllers\Backend\ManajemenUserController::class, 'index'])->name('index');
    Route::get('user/biasa/destroy/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'biasadestroy'])->name('biasadestroy');
    Route::get('user/backend/create', [App\Http\Controllers\Backend\ManajemenUserController::class, 'create'])->name('create');
    Route::post('user/backend/store', [App\Http\Controllers\Backend\ManajemenUserController::class, 'store'])->name('backenduser.store');
    Route::get('user/backend/destroy/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'backenddestroy'])->name('backenddestroy');
    Route::get('/changepassword', [App\Http\Controllers\Backend\ChangePasswordController::class, 'index'])->name('index');
    Route::get('user/change', [App\Http\Controllers\Backend\ChangePasswordController::class, 'change'])->name('change');
});

Route::group(['middleware'=>['hakakses:admin'],'prefix'=>'admin'],function(){
    Route::get('user/backend', [App\Http\Controllers\Backend\ManajemenUserController::class, 'backendindex'])->name('backendindex');
});