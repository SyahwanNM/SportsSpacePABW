<?php

namespace Database\Seeders;

use App\Models\AktivitasKomunitas;
use Illuminate\Database\Seeder;

class AktivitasKomunitasSeeder extends Seeder
{
    public function run()
    {
        AktivitasKomunitas::factory(5)->create();
    }
}
