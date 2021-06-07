<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GlobalController;

Route::get('/', function () {
    return view('login');
})->name('/');

Route::get('/login', function () { return view('login');})->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::post('/postloginpetugas', 'LoginController@postlogin_petugas')->name('postlogin_petugas');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', [GlobalController::class,'home'])->name('home');

// Auth::routes();
// Route::get('/user', 'LoginController@postlogin')->name('player')->middleware('player');
// Route::get('/admin', 'PlayerController@index')->name('player')->middleware('player');
// Route::get('/petugas', 'PlayerController@index')->name('player')->middleware('player');


Route::middleware(['auth', 'Ceklevel:user'])->group(function () {
    Route::get('/user', [UserController::class,'index'])->name('user');
    Route::get('/beranda', [UserController::class,'beranda'])->name('beranda');
    Route::get('/maps', function () { return view('maps');})->name('maps');
    Route::get('/user-jadwal', [UserController::class,'jadwalList'])->name('user-jadwal');
    Route::get('/user-input',[UserController::class,'insertForm'])->name('user-input');
    Route::post('/proses-validasi',[UserController::class,'insertFormValidator'])->name('proses-validasi');
});

Route::middleware(['auth', 'Ceklevel:petugas'])->group(function () {
    Route::get('/petugas', [PetugasController::class,'index'])->name('petugas');
    Route::get('/beranda', [PetugasController::class,'beranda'])->name('beranda');
    Route::get('/konfirm-yes/{id}', [PetugasController::class,'konfirmYes'])->name('konfirm-yes');
    Route::get('/konfirm-no/{id}', [PetugasController::class,'konfirmNo'])->name('konfirm-no');
});

Route::middleware(['auth', 'Ceklevel:admin'])->group(function () {
Route::get('/admin', [AdminController::class,'index'])->name('admin');
Route::post('/proses-validasi-admin',[AdminController::class,'insertFormValidator'])->name('proses-validasi-admin');
Route::get('/admin-input',[AdminController::class,'insertForm'])->name('admin-input');
Route::get('/admin/{petugas}',[AdminController::class,'destroy'])->name('admin-delete');
Route::patch('/admin-update/{petugas}', [AdminController::class,'update'])->name('admin-update');
Route::get('/admin-update/{petugas}/edit', [AdminController::class,'edit'])->name('admin-edit');
Route::get('/admin-histori', [AdminController::class,'histori'])->name('admin-histori');
});



