<?php

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
Route::get('/signin', function () {
    return view('sign.sign-in');
});

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/manajemen-akun', function () {
    return view('admin.manajemen-akun');
});

Route::get('/tambah-akun', function () {
    return view('admin.tambah-akun');
});

Route::get('/daftar-barang', function () {
    return view('admin.daftar-barang');
});

Route::get('/pengajuan-barang', function () {
    return view('admin.pengajuan-barang');
});