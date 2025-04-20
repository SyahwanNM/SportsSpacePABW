<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Lapangan;
use Illuminate\Database\Seeder;

class LapanganSeeder extends Seeder
{
    public function run()
    {
        Lapangan::factory(5)->create();
    }
}

