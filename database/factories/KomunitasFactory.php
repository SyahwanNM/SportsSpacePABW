<?php

namespace Database\Factories;

use App\Models\Komunitas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomunitasFactory extends Factory
{
    protected $model = Komunitas::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->company,
            'jns_olahraga' => $this->faker->word,
            'max_members' => $this->faker->numberBetween(10, 100),
            'provinsi' => $this->faker->state,
            'kota' => $this->faker->city,
            'Deskripsi' => $this->faker->paragraph,
            'foto' => $this->faker->imageUrl(),
            'sampul' => $this->faker->imageUrl(),
            'user_id' => 1,
        ];
    }
}
