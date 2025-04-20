<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\TransaksiPoin;

class TransaksiPoinSeeder extends Seeder
{
    public function run()
    {
        TransaksiPoin::factory()->count(5)->create();
    }
}
