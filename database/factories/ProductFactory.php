<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text(15);
        return [
            'category_id'=>rand(1,5),
            'brand_id'=>rand(1,5),
            'name'=>$name,
            'slug'=>Str::slug($name),
            'price'=>rand(100,5000),
            'stock_status'=>'in-stock',
            'short_description'=>$this->faker->text(50),
            'quantity'=>rand(1,150),
            'image'=>"product0".rand(1,9).".png",
            'description'=>$this->faker->text(240),
            'details'=>$this->faker->text(240),
            'product_feature'=>'new',
            'discount'=>rand(20,50),
            'status'=>1
        ];
    }
}
