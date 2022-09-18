<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded=['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function wishlist(){
        return $this->belongsTo(Wishlist::class);
    }

    public static function storeOrUpdate($request,$id=null)
    {
        Product::updateOrCreate(['id'=>$id],[
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'price'=>$request->price,
            'stock_status'=>$request->stock_status,
            'short_description'=>$request->short_description,
            'size'=>json_encode($request->size),
            'color'=>json_encode($request->color),
            'quantity'=>$request->quantity,
            'image'=>imageUpload($request),
            'description'=>$request->description,
            'details'=>$request->details,
            'product_feature'=>$request->product_feature,
            'discount'=>$request->discount,
            'status'=>$request->status,
        ]);
    }


}
