<?php

namespace Database\Seeders;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(150)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
