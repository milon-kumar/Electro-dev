<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $guarded=['id'];

    public function productCount()
    {
        return $this->hasMany(Product::class)->where('status',true);
    }
}
