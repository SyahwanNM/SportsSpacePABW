<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username'      => $this->faker->unique()->userName,
            'email'         => $this->faker->unique()->safeEmail,
            'password'      => bcrypt('password'),
            'nama_user'     => $this->faker->name,
            'tanggal_lahir' => $this->faker->date('Y-m-d','-18 years'),
            'gender'        => $this->faker->randomElement(['Laki laki','Perempuan']),
            'kota'          => $this->faker->city,
            'role'          => $this->faker->randomElement(['admin','user']),
            'total_poin'    => $this->faker->numberBetween(0,500),
        ];
    }
}
