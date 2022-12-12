<?php

namespace Database\Seeders;

use App\Models\MoviePerformer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MoviePerformer::factory(200)->create();
    }
}
