<?php

namespace Database\Factories;

use App\Models\KomunitasSaya;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomunitasSayaFactory extends Factory
{
    protected $model = KomunitasSaya::class;

    public function definition()
    {
        return [
            'user_id'   => \App\Models\User::factory(),
            'id_kmnts'  => \App\Models\Komunitas::factory(),
        ];
    }
}
