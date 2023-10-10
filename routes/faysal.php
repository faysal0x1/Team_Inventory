<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;
use Illuminate\Support\Facades\Route;

Route::resource('/supplier', SupplierController::class)
;

Route::get('/supplierlist', [SupplierController::class, 'supplierlist'])->name('supplierlist');

