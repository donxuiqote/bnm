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

Route::get('/', function () {
    return view('dashboard/index');
});

Route::get('/signin', function () {
    return view('sign.sign-in');
});

Route::get('/daftar-barang', function () {
    return view('dashboard.daftar-barang');
});

Route::get('/profiles', function () {
    return view('dashboard.profiles');
});