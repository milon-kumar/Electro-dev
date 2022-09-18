<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name'=>'Milon Kumar',
            'is_admin'=>true,
            'email'=>'example@gmail.com',
            'password'=>Hash::make('example@gmail.com'),
            'status'=>1
        ]);

        User::updateOrCreate([
            'name'=>'User',
            'is_admin'=>false,
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user@gmail.com'),
            'status'=>1
        ]);
    }
}
