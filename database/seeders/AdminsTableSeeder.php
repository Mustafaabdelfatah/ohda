<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        $admin = \App\Models\Admin::create([
            'name' => 'super_admin',
            'phone' => '123456',
            'password' => bcrypt('123456'),
        ]);

        $admin->attachRole('super_admin');

    }
}
