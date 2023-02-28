<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            "user_role_id" => 1,
            "name" => "admin",
            "email" => "superadmin@livecricket.com",
            "phone" => "00000000000",
            "password" => Hash::make("123456"),
        ]);
        User::create([
            "user_role_id" => 1,
            "name" => "demo",
            "email" => "admin@livecricket.com",
            "phone" => "00000000000",
            "password" => Hash::make("123456"),
        ]);
    }
}
