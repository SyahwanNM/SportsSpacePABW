<?php

namespace Database\Factories;

use App\Models\SaranaFavorit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SaranaFavoritFactory extends Factory
{
    protected $model = SaranaFavorit::class;

    public function definition()
    {
        return [
            'id_favorit'            => (string) Str::uuid(),
            'user_id'               => \App\Models\User::factory(),
            'id_field'              => \App\Models\Lapangan::factory(),
            'tanggal_ditambahkan'   => $this->faker->dateTimeBetween('-2 months','now'),
        ];
    }
}
