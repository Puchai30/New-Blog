<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();

        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $frontend = Category::create([
            'name' => 'frontend',
            'slug' => 'front_end'
        ]);

        $backend = Category::create([
            'name' => 'backend',
            'slug' => 'back_end'
        ]);

        Blog::create([
            'title' => 'Frontend Post',
            'slug' => 'frontend_post',
            'intro' => 'Need a moment',
            'body' => 'Keep all your selections
            by saving this device to Your Saves, then come back
            anytime and pick up right where you left off.',
            'category_id' => $frontend->id
        ]);

        Blog::create([
            'title' => 'backend Post',
            'slug' => 'backend_post',
            'intro' => 'Need a moment',
            'body' => 'Keep all your selections
            by saving this device to Your Saves, then come back
            anytime and pick up right where you left off.',
            'category_id' => $backend->id
        ]);
    }
}
