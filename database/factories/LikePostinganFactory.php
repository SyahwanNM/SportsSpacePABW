<?php

namespace Database\Factories;

use App\Models\LikePostingan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikePostinganFactory extends Factory
{
    protected $model = LikePostingan::class;

    public function definition()
    {
        return [
            'id_post'  => \App\Models\Post::factory(),
            'user_id'  => \App\Models\User::factory(),
        ];
    }
}
