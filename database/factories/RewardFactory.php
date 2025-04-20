<?php

namespace Database\Factories;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class RewardFactory extends Factory
{
    protected $model = Reward::class;

    public function definition()
    {  
         // Tentukan direktori untuk gambar
         $dir = public_path('images/reward');

         // Pastikan direktori ada, jika belum buat
         if (!File::exists($dir)) {
             File::makeDirectory($dir, 0755, true); // Membuat folder jika belum ada
        }
        return [
            'name'            => $this->faker->word().' Voucher',
            'points_required' => $this->faker->numberBetween(50,500),
            'stock'           => $this->faker->numberBetween(1,20),
            'image_path'      => 'reward/'.$this->faker->image('public/images/reward',400,200, null, false),
        ];
    }
}
