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
        Movie::create([
            'title' => 'Inception',
            'description' => 'A skilled thief, who can enter people’s dreams, is given a chance to have his criminal history erased if he can plant an idea in someone’s mind.',
            'duration' => 148
        ]);

        Movie::create([
            'title' => 'The Shawshank Redemption',
            'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
            'duration' => 142
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'description' => 'When the menace known as The Joker wreaks havoc, Batman must accept one of the greatest psychological and physical challenges of his ability to fight injustice.',
            'duration' => 152
        ]);

        Movie::create([
            'title' => 'Forrest Gump',
            'description' => 'The story of Forrest, a man with a low IQ, who accidentally influences several historical events and embarks on an incredible journey through life.',
            'duration' => 142
        ]);

        Movie::create([
            'title' => 'Pulp Fiction',
            'description' => 'The lives of two mob hitmen, a boxer, a gangster’s wife, and a pair of diner bandits intertwine in a tale of violence and redemption.',
            'duration' => 154
        ]);

        Movie::create([
            'title' => 'Interstellar',
            'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity’s survival.',
            'duration' => 169
        ]);

        Movie::create([
            'title' => 'The Matrix',
            'description' => 'A computer hacker learns about the true nature of reality and his role in the war against its controllers.',
            'duration' => 136
        ]);

        Movie::create([
            'title' => 'Gladiator',
            'description' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.',
            'duration' => 155
        ]);
    }
}
