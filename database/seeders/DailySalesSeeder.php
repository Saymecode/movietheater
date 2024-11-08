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
        $theaters = Theater::all();
        $movies = Movie::all();

        $dates = [Carbon::parse('2024-11-06'), Carbon::parse('2024-11-07')];

        foreach ($dates as $date) {
            foreach ($theaters as $theater) {
                foreach ($movies as $movie) {
                    DailySale::create([
                        'theater_id' => $theater->id,
                        'movie_id' => $movie->id,
                        'date' => $date,
                        'sales' => rand(10000, 90000)
                    ]);
                }
            }
        }
    }
}
