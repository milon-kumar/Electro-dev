<?php

use App\Models\Category;
use App\Models\Wishlist;
use Darryldecode\Cart\Cart;

function cartProducts(){
    return \Cart::getContent();
}

function headerCategory(){
    return Category::latest()->limit(7)->get();
}

function checkWishList($product_id){
    return Wishlist::where('product_id',$product_id)->first();
}

function wishlistCountbyUser(){
    return Wishlist::where('user_id',auth()->id())->get()->count();
}
