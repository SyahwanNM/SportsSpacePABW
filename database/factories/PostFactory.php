<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        // Tentukan direktori untuk gambar
        $dir = public_path('images/posts');

        // Pastikan direktori ada, jika belum buat
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true); // Membuat folder jika belum ada
        }
        return [
            'post_title'   => $this->faker->sentence(4),
            'post_content' => $this->faker->paragraph(),
            'post_image'   => $this->faker->boolean ? 'images/posts/'.$this->faker->image('public/images/posts',640,480, null, false) : null,
            'created_at'   => $this->faker->dateTimeBetween('-1 month','now'),
        ];
    }
}
