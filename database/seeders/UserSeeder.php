<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => bcrypt('userpassword'),
        ]);
    }
}
