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
    return view('welcome');
});

// admin dashboard pages
Route::get('/admin',function(){
    return view('pages.admin.admin-dashboard');
});

// store dashboard pages
Route::get('/store',function(){
    return view('pages.store.store-dashboard');
});

// vendor dashboard pages
Route::get('/vendor',function(){
    return view('pages.vendor.vendor-dashboard');
});