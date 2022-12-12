<?php

namespace Database\Seeders;

use App\Models\MoviePerformerPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviePerformerPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MoviePerformerPivot::factory(100)->create();
    }
}
