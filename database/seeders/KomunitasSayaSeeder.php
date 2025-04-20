<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KomunitasSaya;

class KomunitasSayaSeeder extends Seeder
{
    public function run()
    {
        KomunitasSaya::factory()->count(5)->create();
    }
}
