<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPoin;

class UserPoinSeeder extends Seeder
{
    public function run()
    {
        UserPoin::factory()->count(5)->create();
    }
}
