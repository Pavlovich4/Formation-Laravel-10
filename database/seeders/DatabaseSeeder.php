<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory(2)->create();

         Post::factory(10)->create([
             'user_id' => $user[0]->id
         ]);

         Post::factory(10)->create([
             'user_id' => $user[1]->id
         ]);

    }
}
