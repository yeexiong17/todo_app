<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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

        Todo::factory()->create([
            'title' => 'Test task 1',
            'description' => 'This is a test task 1',
            'done' => 0,
            'datetime' => '2024-04-07 18:46'
        ]);

        Todo::factory()->create([
            'title' => 'Test task 2',
            'description' => 'This is a test task 2',
            'done' => 0,
            'datetime' => '2024-04-02 18:46'
        ]);

        Todo::factory()->create([
            'title' => 'Test task 3',
            'description' => 'This is a test task 3',
            'done' => 0,
            'datetime' => '2024-04-02 18:46'
        ]);
    }
}
