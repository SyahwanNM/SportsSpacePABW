<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';
    
    protected $fillable = [
        'id_kmnts',
        'nama',
        'jns_olahraga',
        'max_members',
        'provinsi',
        'kota',
        'Deskripsi',
        'foto',
        'sampul',
        'user_id',
    ];
}
