<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SaranaFavorit;

class SaranaFavoritSeeder extends Seeder
{
    public function run()
    {
        SaranaFavorit::factory()->count(15)->create();
    }
}
