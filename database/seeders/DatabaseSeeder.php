<?php

namespace Database\Seeders;

use App\Models\MovieGenrePivot;
use App\Models\MoviePerformer;
use App\Models\MoviePerformerPivot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            PerformerSeeder::class,
            TheaterSeeder::class,
            MovieDirectorSeeder::class,
            MovieLanguageSeeder::class,
            MovieDatabaseSeeder::class,
            ShowtimesSeeder::class,
            MovieRatingSeeder::class,
            // MovieGenrePivotSeeder::class,
            MoviePerformerPivotSeeder::class,
            MovieDirectorPivotSeeder::class,
            MovieLanguagePivotSeeder::class,
        ]);
    }
}
