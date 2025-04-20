<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasKomunitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_komunitas';
    public $timestamps = false;
    
    protected $fillable = [
        'id_aktivitas',
        'id_kmnts',
        'judul',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'paymentAmount',
        'deskripsi',
    ];
    

    public function komunitas() {
        return $this->belongsTo(Komunitas::class, 'id_kmnts');
    }
}
