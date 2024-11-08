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
        Theater::create(['name' => 'Theater 1', 'location' => 'Location 1']);
        Theater::create(['name' => 'Theater 2', 'location' => 'Location 2']);
    }
}
