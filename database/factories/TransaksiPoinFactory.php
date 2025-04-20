<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\TransaksiPoin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiPoinFactory extends Factory
{
    protected $model = TransaksiPoin::class;

    public function definition()
    {
        return [
            'user_id'    => \App\Models\User::factory(),
            'reward_id'  => \App\Models\Reward::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 month','now'),
        ];
    }
}
