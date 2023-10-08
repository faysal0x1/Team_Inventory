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
