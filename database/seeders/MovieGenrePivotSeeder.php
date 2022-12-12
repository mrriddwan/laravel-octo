<?php

namespace Database\Seeders;

use App\Models\MovieGenrePivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenrePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieGenrePivot::factory(100)->create();
    }
}
