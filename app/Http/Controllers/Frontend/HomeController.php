<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
//        $data = [
//            0 => [
//                0 => [
//                    'id' => 1,
//                    'name' => 'asdas'
//                ],
//                1 => [
//                    'id' => 2,
//                    'name' => 'asdas'
//                ],
//                2 => [
//                    'id' => 3,
//                    'name' => 'asdas'
//                ],
//            ],
//            1 => [
//                0 => [
//                    'id' => 1,
//                    'name' => 'asdas'
//                ],
//                1 => [
//                    'id' => 2,
//                    'name' => 'asdas'
//                ],
//                2 => [
//                    'id' => 3,
//                    'name' => 'asdas'
//                ],
//            ],
//            3 => [
//                0 => [
//                    'id' => 1,
//                    'name' => 'asdas'
//                ],
//                1 => [
//                    'id' => 2,
//                    'name' => 'asdas'
//                ],
//                2 => [
//                    'id' => 3,
//                    'name' => 'asdas'
//                ],
//            ],
//            3 => [
//                0 => [
//                    'id' => 1,
//                    'name' => 'asdas'
//                ],
//                1 => [
//                    'id' => 2,
//                    'name' => 'asdas'
//                ],
//                2 => [
//                    'id' => 3,
//                    'name' => 'asdas'
//                ],
//            ],
//        ];

        return view('frontend.home.home',[
            'latestThreeCategory'=>Category::where('status',1)->latest()->limit(3)->get(),
            'randomCategory'=>Category::where('status',1)->inRandomOrder()->limit(4)->get(),
            'newProduct'=> Product::where('status',1)->where('product_feature','new')->get(),
            'topProduct'=> Product::where('status',1)->orderBy('sell_count','DESC')->get(),
            'topProductAsc'=> Product::where('status',1)->orderBy('sell_count','DESC')->get(),
            'mostViewedProducts'=>array_chunk(Product::with('category')->orderBy('created_at','DESC')->get()->toArray(),3),
            'topProductC'=>array_chunk(Product::with('category')->orderBy('created_at','ASC')->get()->toArray(),3),
            'sellProducts'=>array_chunk(Product::with('category')->orderBy('view_count','DESC')->get()->toArray(),3),
        ]);
    }

    public function search(Request $request)
    {
        if ($request->input('category_id')){
            $products = Product::with('category')->where('status',true)->where('category_id', $request->input('category_id'))
                ->orWhere('name', 'like', '%' . $request->input('query') . '%')->paginate(16);
        }else{
            $products = Product::with('category')->where('status',true)->orWhere('name', 'like', '%' . $request->input('query') . '%')->paginate(16);
        }

        return view('frontend.product.category-product',[
            'productByCategory'=>$products,
            'category'=>Category::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'brand'=>Brand::where('status',true)->orderBy('created_at',"ASC")->limit(6)->get(),
            'topProduct'=>Product::where('status',1)->orderBy('view_count','DESC')->limit(8)->get(),
        ]);


    }
}
