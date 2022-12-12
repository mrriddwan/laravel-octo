<?php

namespace Database\Seeders;

use App\Models\MovieLanguagePivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieLanguagePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieLanguagePivot::factory(100)->create();
    }
}
