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

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/pengajuan', function () {
    return view('admin.pengajuan.index');
});

Route::get('/admin/stock/', function () {
    return view('admin.stock.index');
});

Route::get('/admin/stock/edit', function () {
    return view('admin.stock.edit');
});


Route::get('/admin/pengadaan', function () {
    return view('admin.pengadaan.index');
});

Route::get('/admin/pengadaan/edit', function () {
    return view('admin.pengadaan.edit');
});

Route::get('/admin/tambah-akun', function () {
    return view('admin.akun.tambah-akun');
});

Route::get('/admin/akun', function () {
    return view('admin.akun.akun');
});

Route::get('/', function () {
    return view('user.index');
});

Route::get('/pengajuan', function () {
    return view('user.pengajuan.index');
});

Route::get('/stock/edit', function () {
    return view('user.pengajuan.edit');
});

Route::get('/pengadaan', function () {
    return view('user.pengadaan.index');
});

Route::get('/pengadaan/edit', function () {
    return view('user.pengadaan.edit');
});

// Route::get('/user', function () {
//     return view('user.index');
// });

// Route::get('/', function () {
//     return view('user.daftar-akun');
// });