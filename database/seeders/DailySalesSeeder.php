<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theater;
use App\Models\Movie;
use App\Models\DailySale;
use Carbon\Carbon;

class DailySalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $theater1 = Theater::where('name', 'Theater 1')->first();
        $theater2 = Theater::where('name', 'Theater 2')->first();
        $movie1 = Movie::where('title', 'Movie 1')->first();
        $movie2 = Movie::where('title', 'Movie 2')->first();

        $dates = [Carbon::parse('2024-11-06'), Carbon::parse('2024-11-07')];

        foreach ($dates as $date) {
            DailySale::create(['theater_id' => $theater1->id, 'movie_id' => $movie1->id, 'date' => $date, 'sales' => rand(100, 900)]);
            DailySale::create(['theater_id' => $theater1->id, 'movie_id' => $movie2->id, 'date' => $date, 'sales' => rand(100, 900)]);
            DailySale::create(['theater_id' => $theater2->id, 'movie_id' => $movie1->id, 'date' => $date, 'sales' => rand(100, 900)]);
            DailySale::create(['theater_id' => $theater2->id, 'movie_id' => $movie2->id, 'date' => $date, 'sales' => rand(100, 900)]);
        }
    }
}
