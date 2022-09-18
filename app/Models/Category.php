<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable=['name','slug','image','description','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productCount()
    {
        return $this->hasMany(Product::class)->where('status',true);
    }

    public static function storeOrCreate($request,$id=null,$data=null)
    {
        Category::updateOrCreate(['id'=>$id],[
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>imageUpload($request,$data),
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
    }
}
