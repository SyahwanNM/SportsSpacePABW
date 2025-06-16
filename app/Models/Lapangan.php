<?php

// app/Models/Lapangan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangans';
    protected $primaryKey = 'id_field';
    public $timestamps = true;

    protected $fillable = [
        'nama_lapangan',
        'type',
        'categori',
        'foto',
        'opening_hours',
        'closing_hours',
        'fasility',
        'price',
        'description',
        'address',
        'user_id'
    ];

    public function getFotoAttribute($value)
    {
        // Debugging: Log the original value and the generated URL
        Log::info('Original foto value: ' . $value);

        if ($value && $value !== 'null' && $value !== '') {
            $url = asset('storage/' . ltrim($value, 'storage/'));
            Log::info('Generated foto URL: ' . $url);
            return $url;
        }
        $defaultUrl = asset('storage/images/lapangan/default_foto.png');
        Log::info('Default foto URL: ' . $defaultUrl);
        return $defaultUrl;
    }

    public function ratingLapangans()
    {
        return $this->hasMany(RatingLapangan::class, 'id_field');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
