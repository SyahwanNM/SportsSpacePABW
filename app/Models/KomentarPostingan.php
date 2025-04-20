<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarPostingan extends Model
{
    use HasFactory;

    protected $table = 'komentar_postingans';
    protected $primaryKey = 'id_komentar';
    public $timestamps = false;

    protected $fillable = [
        'id_post',
        'user_id',
        'komentar',
        'tanggalwaktu',
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
