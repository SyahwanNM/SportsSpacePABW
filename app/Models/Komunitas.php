<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';
    protected $primaryKey = 'id_kmnts';
    protected $fillable = [
        'id_kmnts',
        'nama',
        'jns_olahraga',
        'max_members',
        'provinsi',
        'kota',
        'deskripsi',
        'foto',
        'sampul',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
