<?php

namespace Database\Factories;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\Factory;

class RewardFactory extends Factory
{
    protected $model = Reward::class;

    public function definition()
    {
        return [
            'name'            => $this->faker->word().' Voucher',
            'points_required' => $this->faker->numberBetween(50,500),
            'stock'           => $this->faker->numberBetween(1,20),
            'image_path'      => 'reward/'.$this->faker->image('public/reward',400,200, null, false),
        ];
    }
}
