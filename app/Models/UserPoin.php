<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoin extends Model
{
    use HasFactory;

    protected $table = 'user_poins';
    protected $primaryKey = 'id_poin';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'tanggal_apply',
        'jumlah_poin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
