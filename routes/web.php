<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;
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

Route::controller(UserController::class)->group(function (){
    Route::post('/user_registration','userRegistration');
    Route::post('/otp_verify_new_user','verifyNewUser');
    Route::post('/sent_otp','sentOtp');
    Route::post('/login','login');
    Route::post('/otp_verify_for_pw_reset','verifyOtp');
    Route::post('/reset_password','resetPassword')->middleware(TokenVerifyMiddleware::class);
    Route::get('/logout','logout'); 

});

//require __DIR__ . '/auth.php';


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



require __DIR__ . '/tanvir.php';
require __DIR__ . '/faysal.php';
require __DIR__ . '/mazbaul.php';
require __DIR__ . '/rafiq.php';
require __DIR__ . '/ruhul.php';