<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate([
           'user_id'=>1,
           'role_key'=>'super_admin',
           'role'=>'Super Admin',
           'status'=>1
        ]);

        Role::updateOrCreate([
           'user_id'=>1,
           'role_key'=>'normal_user',
           'role'=>'Normal User',
           'status'=>1
        ]);

        Role::updateOrCreate([
           'user_id'=>1,
           'role_key'=>'subscriber',
           'role'=>'Subscriber',
           'status'=>1
        ]);
    }
}
