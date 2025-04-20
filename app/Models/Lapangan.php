<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangans';

    protected $fillable = [
        'id_field',
        'nama_lapangan',
        'type',
        'categori',
        'lokasi',
        'foto',
        'opening_hours',
        'closing_hours',
        'fasility',
        'price',
        'description',
        'address',
    ];
}
