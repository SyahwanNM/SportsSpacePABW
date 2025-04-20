<?php

namespace Database\Factories;

use App\Models\SportsGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportsGroupFactory extends Factory
{
    protected $model = SportsGroup::class;

    public function definition()
    {
        return [
            'user_id'           => \App\Models\User::factory(),
            'title'             => $this->faker->sentence(3),
            'event_date'        => $this->faker->dateTimeBetween('now','+1 month')->format('Y-m-d'),
            'start_time'        => $this->faker->time('H:i:s'),
            'end_time'          => $this->faker->time('H:i:s'),
            'city'              => $this->faker->city(),
            'address'           => $this->faker->address(),
            'kapasitas_maksimal'=> $this->faker->numberBetween(5,50),
            'current_members'   => 0,
            'jenis_olahraga'    => $this->faker->randomElement(['','Badminton','Football']),
            'payment_method'    => $this->faker->randomElement(['cash','transfer']),
            'payment_amount'    => $this->faker->numberBetween(0,50000),
            'created_at'        => now(),
        ];
    }
}
