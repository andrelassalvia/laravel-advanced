<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // \App\Models\Channel::factory(20)->create();
        // \App\Models\Post::factory(1)->create();
        // \App\Models\User::factory(1)->create();
        // \App\Models\Carta::factory(30)->create();
        \App\Models\Customer::factory(200)->create();
    }
}
