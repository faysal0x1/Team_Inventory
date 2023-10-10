<?php
use App\Http\Controllers\CustomerController;
    //page route
    Route::get('/customer-page',[CustomerController::class,'CustomerPage']);
    //end page route
    Route::get('/create-customer',[CustomerController::class,'CustomerCreate']);
    Route::get('/list-customer',[CustomerController::class,'CustomerList']);

