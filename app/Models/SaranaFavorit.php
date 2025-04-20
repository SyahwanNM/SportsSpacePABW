<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaFavorit extends Model
{
    use HasFactory;

    protected $table = 'sarana_favorits';
    protected $primaryKey = 'id_favorit';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'id_field',
        'tanggal_ditambahkan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Lapangan::class, 'id_field');
    }
}
