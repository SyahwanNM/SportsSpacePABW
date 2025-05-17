<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // jangan lupa import User model

class Post extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id_post';
    public $timestamps    = false;

    protected $fillable = [
        'post_title',
        'post_content',
        'post_image',
        'created_at',
        'user_id',   // pastikan juga user_id ada di fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
