<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $rowId = rand(11111,99999);

        \Cart::add([
            'id'=>$rowId,
            'name'=>$product->name,
            'price'=>$product->price,
            'quantity'=>$request->quantity,
            'attributes'=>[
                'product_id'=>$product->id,
                'image'=>$product->image,
            ],
            'associatedModel'=>$product,
        ]);

        toast('Add To Cart Successfully','success');
        return redirect()->back();
    }
}
