<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LikePostingan;

class LikePostinganSeeder extends Seeder
{
    public function run()
    {
        LikePostingan::factory()->count(5)->create();
    }
}
