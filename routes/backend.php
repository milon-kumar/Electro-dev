<?php


use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'backend','as'=>'backend.'],function (){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/brands',BrandController::class);
    Route::resource('/products',ProductController::class);

});



