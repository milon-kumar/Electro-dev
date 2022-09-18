<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($slug)
    {
        $poruct = Product::where('slug',$slug)->first();
        $poruct->view_count += 1;
        $poruct->save();

        return view('frontend.product.details',[
            'product'=> $poruct,
            'relatedProduct'=>Product::where('status',1)->where('category_id',$poruct->category_id)->limit(4)->get(),
        ]);
    }


    public function allCategoryProduct()
    {
        $categroy = Category::where('status',true)->latest()->paginate(12);

        return view('frontend.category.all-category',[
            'allCategory'=>$categroy,
            'category'=>Category::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'brand'=>Brand::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'topProduct'=>Product::where('status',1)->orderBy('view_count','DESC')->limit(8)->get(),
        ]);
    }


    public function categoryProduct($slug)
    {
        $categroy = Category::where('slug',$slug)->first();

        return view('frontend.product.category-product',[
            'productByCategory'=>Product::where('status',1)->where('category_id',$categroy->id)->paginate(9),
            'category'=>Category::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'brand'=>Brand::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'topProduct'=>Product::where('status',1)->orderBy('view_count','DESC')->limit(8)->get(),
            'categoryName'=>$categroy,
        ]);
    }

    public function brandProduct($slug)
    {
        $brand = Brand::where('slug',$slug)->first();

        return view('frontend.product.category-product',[
            'productByCategory'=>Product::with('category')->where('status',1)->where('brand_id',$brand->id)->paginate(9),
            'category'=>Category::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'brand'=>Brand::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'topProduct'=>Product::with('category')->where('status',1)->orderBy('view_count','DESC')->limit(8)->get(),
        ]);
    }
}
