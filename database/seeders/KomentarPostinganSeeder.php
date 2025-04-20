<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KomentarPostingan;

class KomentarPostinganSeeder extends Seeder
{
    public function run()
    {
        KomentarPostingan::factory()->count(5)->create();
    }
}
