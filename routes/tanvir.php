<?php

use App\Http\Controllers\CategoryController;
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