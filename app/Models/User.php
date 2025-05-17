<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,
        HasApiTokens,
        Notifiable;

    protected $primaryKey = 'user_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_user',
        'tanggal_lahir',
        'gender',
        'kota',
        'role',
        'total_poin',
    ];

    protected $hidden = ['password'];
    
    public function komunitas()
    {
        return $this->hasMany(Komunitas::class, 'user_id', 'id');
    }
}
