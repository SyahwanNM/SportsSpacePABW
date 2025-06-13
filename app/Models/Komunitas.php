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
        'nama',
        'jns_olahraga',
        'max_members',
        'provinsi',
        'kota',
        'deskripsi',
        'foto',
        'sampul',
        'status',
        'user_id',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function getFotoAttribute($value)
    {
        if ($value && $value !== 'null' && $value !== '') {
            return asset('storage/' . ltrim($value, 'storage/'));
        }
        return asset('storage/images/komunitas/default_foto.png');
    }

    public function getSampulAttribute($value)
    {
        if ($value && $value !== 'null' && $value !== '') {
            return asset('storage/' . ltrim($value, 'storage/'));
        }
        return asset('storage/images/komunitas/default_sampul.png');
    }

    public function memberKomunitas()
    {
        return $this->hasMany(MemberKomunitas::class, 'id_kmnts', 'id_kmnts');
    }

}