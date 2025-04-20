<?php

namespace Database\Factories;

use App\Models\KomentarPostingan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarPostinganFactory extends Factory
{
    protected $model = KomentarPostingan::class;

    public function definition()
    {
        return [
            'id_post'       => \App\Models\Post::factory(),
            'user_id'       => \App\Models\User::factory(),
            'komentar'      => $this->faker->sentence(),
            'tanggalwaktu'  => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
