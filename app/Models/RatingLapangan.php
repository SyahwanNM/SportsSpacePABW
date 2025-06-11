<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RatingLapangan extends Model
{
    use HasFactory;

    protected $table = 'rating_lapangans';
    protected $primaryKey = 'id_rating';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_field',
        'user_id',
        'rating',
        'komentar',
        'tanggalwaktu',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id_rating = Str::uuid();
        });
    }

    public function field()
    {
        return $this->belongsTo(Lapangan::class, 'id_field');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
