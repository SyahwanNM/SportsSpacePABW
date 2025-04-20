<?php

namespace Database\Factories;

use App\Models\MemberSportsgroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberSportsgroupFactory extends Factory
{
    protected $model = MemberSportsgroup::class;

    public function definition()
    {
        return [
            'id'      => \App\Models\SportsGroup::factory(),
            'user_id'=> \App\Models\User::factory(),
            'join_at'=> $this->faker->dateTimeBetween('-2 months','now'),
        ];
    }
}
