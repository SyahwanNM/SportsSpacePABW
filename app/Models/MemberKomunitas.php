<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberKomunitas extends Model
{
    use HasFactory;

    protected $table = 'member_komunitas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_kmnts',
        'user_id',
        'join_at',
    ];

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class, 'id_kmnts', 'id_kmnts');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
