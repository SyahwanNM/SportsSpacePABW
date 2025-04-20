<?php

namespace Database\Seeders;

use App\Models\Komunitas;
use Illuminate\Database\Seeder;

class KomunitasSeeder extends Seeder
{
    public function run()
    {
        Komunitas::factory(5)->create();
    }
}

