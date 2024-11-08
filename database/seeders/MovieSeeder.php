<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create(['title' => 'Movie 1', 'description' => 'Movie 1 description', 'duration' => 120]);
        Movie::create(['title' => 'Movie 2', 'description' => 'Movie 2 description', 'duration' => 150]);
    }
}
