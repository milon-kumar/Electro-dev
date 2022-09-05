<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'image'=>"product0".rand(1,9).".png",
            'description'=>$this->faker->text(50),
            'status'=>1,
        ];
    }
}
