<?php

namespace Database\Factories;

use App\Models\UserPoin;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPoinFactory extends Factory
{
    protected $model = UserPoin::class;

    public function definition()
    {
        return [
            'user_id'        => \App\Models\User::factory(),
            'tanggal_apply'  => $this->faker->dateTimeBetween('-1 month','now'),
            'jumlah_poin'    => $this->faker->numberBetween(1,200),
        ];
    }
}
