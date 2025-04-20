<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'post_title'   => $this->faker->sentence(4),
            'post_content' => $this->faker->paragraph(),
            'post_image'   => $this->faker->boolean ? 'images/posts/'.$this->faker->image('public/images/posts',640,480, null, false) : null,
            'created_at'   => $this->faker->dateTimeBetween('-1 month','now'),
        ];
    }
}
