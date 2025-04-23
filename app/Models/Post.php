<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // Import Carbon

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    public $timestamps = false; // Nonaktifkan timestamps jika Anda tidak ingin Laravel otomatis mengelola created_at dan updated_at

    // Menambahkan properti $dates agar Laravel mengonversi 'created_at' menjadi Carbon instance
    protected $dates = ['created_at'];

    protected $fillable = [
        'post_title',
        'post_content',
        'post_image',
        'created_at',
    ];
}
