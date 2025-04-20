<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePostingan extends Model
{
    use HasFactory;

    protected $table = 'like_postingans';
    protected $primaryKey = 'id_like';
    public $timestamps = false;

    protected $fillable = [
        'id_post',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
