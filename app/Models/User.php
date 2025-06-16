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
        'photo',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'total_poin' => 'integer',
    ];

    // Accessor for photo attribute
    public function getPhotoAttribute($value)
    {
        if ($value && $value !== 'null' && $value !== '') {
            if (!str_starts_with($value, 'http')) {
                // Remove any leading 'storage/' or '/' from the path
                $path = ltrim($value, 'storage/');
                $path = ltrim($path, '/');
                return asset('storage/' . $path);
            }
            return $value;
        }
        return asset('storage/profile/default.jpeg');
    }

    public function komunitas()
    {
        return $this->hasMany(Komunitas::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
