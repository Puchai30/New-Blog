<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use Database\Factories\CategoryFactory;
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

        $frontend=Category::factory()->create([
            'name' =>'Frontend','slug' => 'front-end'
        ]);

        $backend=Category::factory()->create([
            'name' =>'Backend','slug' => 'back-end'
        ]);

        Blog::factory(2)->create(['category_id'=>$frontend->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
