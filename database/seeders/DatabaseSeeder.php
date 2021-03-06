<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Master Admin',
            'license_number_one' => '1234',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'slug' => 'master-admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
