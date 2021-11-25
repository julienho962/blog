<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => "Julien Adenovi",
            'username' => "Julienho",
            'email' => "adenovijulien@gmail.com",
            'password' => "Julienho@1"
        ]);
        Post::factory(3)->create([
            'user_id' => $user->id,
        ]
        );
        Post::factory(4)->create([
            'category_id' => 2,
        ]);
        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => 1,
        ]);
        Post::factory(10)->create([
            'user_id' => 2,
            'category_id' => 3,
        ]);
    }
}
//Menuisier Kossi