<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home.home',[
            'latestThreeCategory'=>Category::where('status',1)->latest()->limit(3)->get(),
            'randomCategory'=>Category::where('status',1)->inRandomOrder()->limit(4)->get(),
            'newProduct'=> Product::where('status',1)->where('product_feature','new')->get(),
            'topProduct'=> Product::where('status',1)->orderBy('sell_count','DESC')->get(),
        ]);
    }
}
