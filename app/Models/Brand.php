<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $guarded=['id'];

    public function productCount()
    {
        return $this->hasMany(Product::class)->where('status',true);
    }

    public static function storeOrUpdate($request,$id=null)
    {
        Brand::updateOrCreate(['id'=>$id],[
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>imageUpload($request),
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
    }
}
