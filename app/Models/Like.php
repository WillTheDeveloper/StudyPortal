<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Post() {
        return $this->belongsTo(Post::class);
    }

    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
