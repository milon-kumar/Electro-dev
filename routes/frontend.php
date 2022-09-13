<?php

use App\Http\Controllers\forntend\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\frontend\SubscribeController;
use App\Http\Controllers\frontend\WishlistController;
use \Illuminate\Support\Facades\Route;


Route::group(['as'=>'frontend.'],function (){
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::get('/product-details/{slug}',[ProductController::class,'productDetails'])->name('product-details');

    Route::get('/all-category-product',[ProductController::class,'allCategoryProduct'])->name('all-category-product');
    Route::get('/category-product/{slug}',[ProductController::class,'categoryProduct'])->name('category-product');
    Route::get('/brand-product/{slug}',[ProductController::class,'brandProduct'])->name('brand-product');
    Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');

    Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
    Route::post('/subscribe',[SubscribeController::class,'subscribe'])->name('subscribe');

    Route::post('/add-to-wishlist',[WishlistController::class,'addToWishlist'])->name('add-to-wishlist');

    Route::get('/search',[HomeController::class,'search'])->name('search');
    //User Auth
//    Route::post('/auth/store',[])->name('auth.store');

    Route::group(['middleware'=>'auth'],function(){
       Route::get('/profile',[ProfileController::class,'index'])->name('profile');
       Route::post('/order',[OrderController::class,'order'])->name('order');
       Route::get('/wishlist',[WishlistController::class,'getWishlist'])->name('wishlist');
    });
});
