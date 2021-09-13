<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.admin.com',
            'password' => Hash::make('adminkuadmin'),
        ]);
    }
}
