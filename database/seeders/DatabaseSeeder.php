<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Advert;
use App\Models\User;
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
        Advert::factory(17)->create();
        User::factory()->create([
            'name' => 'IDK studio',
            'email' => 'idk@test.com',
            'password' =>'idkstudio',
            'remember_token' => null
        ]);
    }
}
