<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'tanggal_lahir',
        'gender',
        'kota',
        'role',
        'total_poin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function komunitas()
    {
        return $this->hasMany(Komunitas::class, 'user_id');
    }
}
