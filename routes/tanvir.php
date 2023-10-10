<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


 
 Route::controller(CategoryController::class)->group(function (){
   Route::get('/get-category','getCategory');
   Route::get('/get-active-category','getActiveCategory');
   Route::post('/create-category','createCategory');
   Route::post('/update-category','updateCategory');
   Route::post('/delete-category','deleteCategory');
});