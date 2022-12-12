<?php

namespace Database\Seeders;

use App\Models\MovieDirectorPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieDirectorPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieDirectorPivot::factory(100)->create();
    }
}
