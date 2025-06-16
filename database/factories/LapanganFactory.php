<?php

namespace Database\Factories;

use App\Models\Lapangan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LapanganFactory extends Factory
{
    use HasFactory;
    
    protected $model = Lapangan::class;

    public function definition()
    {
        return [
            'nama_lapangan' => $this->faker->company . ' ' . $this->faker->randomElement(['Futsal', 'Football', 'Basket', 'Badminton']),
            'type' => $this->faker->randomElement(['Football', 'futsal', 'badminton', 'basket', 'jogging', 'volly']),
            'categori' => $this->faker->randomElement(['paid', 'free']),
            'foto' => 'lapangans/default.jpg',
            'opening_hours' => '08:00',
            'closing_hours' => '22:00',
            'fasility' => 'Parkir, Toilet, Ruang Ganti, Wifi',
            'price' => $this->faker->numberBetween(50000, 200000),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'user_id' => 1
        ];
    }
}

