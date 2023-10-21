<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;


 
 Route::controller(CategoryController::class)->group(function (){
   Route::get('/get-category','getCategory');
   Route::get('/get-active-category','getActiveCategory');
   Route::post('/create-category','createCategory');
   Route::post('/update-category','updateCategory');
   Route::post('/delete-category','deleteCategory');
   Route::post('/category-by-id','categoryById');
   Route::post('/update-status','updateStatus');
    //page route
    Route::get('/category-page','categoryPage');
});

Route::controller(UnitController::class)->group(function (){
   Route::get('/get-unit','getUnits')->name('getUnit');
   Route::get('/get-active-units','getActiveUnits')->name('ActiveUnits');
   Route::post('/create-unit','createUnit')->name('createUnit');
   Route::post('/update-unit','updateUnit')->name('updateUnit');
   Route::post('/delete-unit','deleteUnit')->name('deleteUnit');
   Route::post('/unit-by-id','unitById')->name('unitByid');
   Route::post('/update-unit-status','updateUnitStatus')->name('updateUnitStatus');
   //page route
   Route::get('/unit-page','unitPage')->name('unit.page');
});

Route::controller(ProductController::class)->group(function (){
    Route::get('/get-product','getProduct')->name('getProduct');
    Route::get('/get-active-product','getActiveProduct')->name('ActiveProduct');
    Route::post('/create-product','createProduct')->name('createProduct');
    Route::post('/update-product','updateProduct')->name('updateProduct');
    Route::post('/delete-product','deleteProduct')->name('deleteProduct');
    Route::post('/product-by-id','productById')->name('productById');
    Route::post('/update-product-status','updateProductStatus')->name('updateProductStatus');
   //page route
   Route::get('/product-page','productPage')->name('product.page');
});
