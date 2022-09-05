<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $this->call([
                RoleSedder::class,
                UserSedder::class,
            ]);

            Category::factory(10)->create();
            Brand::factory(10)->create();
            Product::factory(50)->create();

    }
}
