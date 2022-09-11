<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
//        return "checkout";
//        exit();

        $cartProducts = \Cart::getContent();

        if ($cartProducts->count() > 0){
            return view('frontend.checkout.checkout',[
                'cartProducts'=>$cartProducts,
                'total'=>\Cart::getTotal(),
            ]);
        }else{
            toast('Cart Empty','warning');
            return redirect()->route('frontend.home');
        }

    }
}
