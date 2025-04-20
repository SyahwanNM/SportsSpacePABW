<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberSportsgroup;

class MemberSportsgroupSeeder extends Seeder
{
    public function run()
    {
        MemberSportsgroup::factory()->count(25)->create();
    }
}
