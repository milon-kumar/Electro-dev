<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        Wishlist::updateOrCreate([
           'user_id'=>auth()->id(),
            'product_id'=>$request->input('product_id'),
            'is_wish'=>true,
        ]);

        toast('Add To Wishlist Success','success');
        return redirect()->back();
    }

    public function getWishlist()
    {
        return view('frontend.profile.wishlist',[
            'wishlist'=>Wishlist::with('products')->where('user_id',auth()->id())->paginate(16),
        ]);
    }
}
