<?php

namespace Database\Factories;

use App\Models\RatingLapangan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RatingLapanganFactory extends Factory
{
    protected $model = RatingLapangan::class;

    public function definition()
    {
        return [
            'id_rating'    => (string) Str::uuid(),
            'id_field'     => \App\Models\Lapangan::factory(),
            'user_id'      => \App\Models\User::factory(),
            'rating'       => $this->faker->randomFloat(1,1,5),
            'komentar'     => $this->faker->sentence(),
            'tanggalwaktu' => $this->faker->dateTimeBetween('-1 month','now'),
        ];
    }
}
