<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($slug)
    {
        return view('frontend.product.details',[
            'product'=>Product::where('slug',$slug)->first(),
        ]);
    }

    public function categoryProduct($slug)
    {
        $categroy = Category::where('slug',$slug)->first();

        return view('frontend.product.category-product',[
            'productByCategory'=>Product::where('status',1)->where('category_id',$categroy->id)->paginate(9),
        ]);
    }
}
