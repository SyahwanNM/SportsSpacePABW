<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // jangan lupa import User model

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'post_title',
        'post_content',
        'post_image',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Accessor untuk title
    public function getTitleAttribute()
    {
        return $this->post_title;
    }

    // Accessor untuk content
    public function getContentAttribute()
    {
        return $this->post_content;
    }

    // Accessor untuk image
    public function getImageAttribute()
    {
        return $this->post_image;
    }

    // Mutator untuk title
    public function setTitleAttribute($value)
    {
        $this->post_title = $value;
    }

    // Mutator untuk content
    public function setContentAttribute($value)
    {
        $this->post_content = $value;
    }

    // Mutator untuk image
    public function setImageAttribute($value)
    {
        $this->post_image = $value;
    }
}
