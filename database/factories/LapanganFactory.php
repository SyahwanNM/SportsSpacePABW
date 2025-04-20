<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\Lapangan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LapanganFactory extends Factory
{
    protected $model = Lapangan::class;

    public function definition()
    {
        return [
            'nama_lapangan' => $this->faker->word,
            'type' => $this->faker->randomElement(['Football', 'futsal', 'badminton', 'basket', 'jogging', 'volly']),
            'categori' => $this->faker->randomElement(['paid', 'free']),
            'lokasi' => $this->faker->city,
            'foto' => $this->faker->imageUrl(),
            'opening_hours' => $this->faker->time(),
            'closing_hours' => $this->faker->time(),
            'fasility' => $this->faker->sentence,
            'price' => $this->faker->randomNumber(5),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
        ];
    }
}

