<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunitasSaya extends Model
{
    use HasFactory;

    protected $table = 'komunitas_sayas';
    protected $primaryKey = 'id_komunitas_saya';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'id_kmnts',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class, 'id_kmnts');
    }
}
