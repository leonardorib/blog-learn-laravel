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
        $user = User::factory()->create([
            'username' => 'JohnDoe',
            'email' => 'johndoe@test.com',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
        $user2 = User::factory()->create([
            'name' => 'Sara Smith',
        ]);

        $posts = Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
        Post::factory(5)->create([
            'user_id' => $user2->id,
        ]);

        Post::factory(5)->create([
            'category_id' => $posts->first()->category_id,
            'user_id' => $user->id,
        ]);
    }
}
