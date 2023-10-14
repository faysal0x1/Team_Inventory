<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;
use Illuminate\Support\Facades\Route;



// Route::middleware([TokenVerifyMiddleware::class])->group(function () {
    
// });


Route::resource('/supplier', SupplierController::class);

Route::get('/supplierlist', [SupplierController::class, 'supplierlist'])->name('supplierlist');

Route::resource('/store', StoreController::class);

Route::get('/storelist', [StoreController::class, 'storelist'])->name('supplierlist');
