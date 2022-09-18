<?php

use App\Models\Category;
use App\Models\Wishlist;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;

function cartProducts(){
    return \Cart::getContent();
}

function headerCategory(){
    return Category::where('status',true)->latest()->limit(7)->get();
}

function searchCategory(){
    return Category::where('status',true)->inRandomOrder()->limit(10)->get();
}

function checkWishList($product_id){
    return Wishlist::where('product_id',$product_id)->first();
}

function wishlistCountbyUser(){
    return Wishlist::where('user_id',auth()->id())->get()->count();
}

function imageUpload($request,$existImage = null){
    $image = $request->file('image');
    $imageName = Str::random(15).".".$image->getClientOriginalExtension();
    $image->move(public_path("uploads/"),$imageName);
    $name = $imageName;

    return $name;
}
