<?php

namespace Database\Seeders;

use App\Models\Theater;
use Illuminate\Database\Seeder;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theater::create([
            'name' => 'TCL Chinese Theatre',
            'location' => 'Hollywood, Los Angeles, California'
        ]);

        Theater::create([
            'name' => 'AMC Empire 25',
            'location' => 'New York City, New York'
        ]);
    }
}
