<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\forntend\ProfileController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use \Illuminate\Support\Facades\Route;


Route::group(['as'=>'frontend.'],function (){
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::get('/product-details/{slug}',[ProductController::class,'productDetails'])->name('product-details');

    Route::get('/category-product/{slug}',[ProductController::class,'categoryProduct'])->name('category-product');

    Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');

    Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');

    //User Auth
//    Route::post('/auth/store',[])->name('auth.store');

    Route::group(['middleware'=>'auth'],function(){
       Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    });
});
