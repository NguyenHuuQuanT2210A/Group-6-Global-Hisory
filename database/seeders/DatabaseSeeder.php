<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Mail;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("12345678"),
            'role' => "ADMIN"
        ]);

        User::factory(10)->create();
        Category::factory(10)->create();
        Tag::factory(10)->create();
        Post::factory(50)->create();
        Event::factory(30)->create();
//        Comment::factory(100)->create();
        Blog::factory(50)->create();
        Mail::factory(50)->create();
    }
}
