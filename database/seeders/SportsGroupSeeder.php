<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SportsGroup;

class SportsGroupSeeder extends Seeder
{
    public function run()
    {
        SportsGroup::factory()->count(5)->create();
    }
}
