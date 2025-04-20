<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RatingLapangan;

class RatingLapanganSeeder extends Seeder
{
    public function run()
    {
        RatingLapangan::factory()->count(25)->create();
    }
}
