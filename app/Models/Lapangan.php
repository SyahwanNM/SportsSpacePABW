<?php

// app/Models/Lapangan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $primaryKey = 'id_field';
    public $incrementing = true;
    protected $keyType = 'int';

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
        'address'
    ];
}
