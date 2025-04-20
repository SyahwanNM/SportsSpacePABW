<?php

namespace Database\Factories;

use App\Models\AktivitasKomunitas;
use App\Models\Komunitas;
use Illuminate\Database\Eloquent\Factories\Factory;

class AktivitasKomunitasFactory extends Factory
{
    protected $model = AktivitasKomunitas::class;

    public function definition()
    {
        return [
            'id_kmnts' => Komunitas::inRandomOrder()->first()->id_kmnts,
            'judul' => $this->faker->sentence,
            'tanggal' => $this->faker->date(),
            'waktu_mulai' => $this->faker->time(),
            'waktu_selesai' => $this->faker->time(),
            'paymentAmount' => $this->faker->randomFloat(2, 10000, 100000),
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
