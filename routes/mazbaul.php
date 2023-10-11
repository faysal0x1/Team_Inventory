<?php
    use App\Http\Controllers\CustomerController;

    //page route
    Route::get('/customer-page',[CustomerController::class,'CustomerPage']);
    //end page route
    Route::post('/create-customer',[CustomerController::class,'CustomerCreate']);
    Route::get('/list-customer',[CustomerController::class,'CustomerList']);
    Route::post('/customer-by-id',[CustomerController::class,'CustomerById']);
    Route::post('/update-customer',[CustomerController::class,'CustomerUpdate']);
    Route::post('/delete-customer',[CustomerController::class,'CustomerDelete']);

