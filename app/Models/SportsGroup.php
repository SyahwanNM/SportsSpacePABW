<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsGroup extends Model
{
    use HasFactory;

    protected $table = 'sports_groups';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'event_date',
        'start_time',
        'end_time',
        'city',
        'address',
        'kapasitas_maksimal',
        'current_members',
        'jenis_olahraga',
        'payment_method',
        'payment_amount',
        'created_at',
    ];

    public function members()
    {
        return $this->hasMany(MemberSportsgroup::class, 'id', 'id'); // foreign key di member_sportsgroups, local key di sports_groups
    }

        public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}