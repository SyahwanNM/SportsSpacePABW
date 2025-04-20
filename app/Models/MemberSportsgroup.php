<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberSportsgroup extends Model
{
    use HasFactory;

    protected $table = 'member_sportsgroups';
    protected $primaryKey = 'id_member';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'join_at',
    ];

    public function group()
    {
        return $this->belongsTo(SportsGroup::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
