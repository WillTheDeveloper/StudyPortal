<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function Post()
    {
        return $this->hasMany(Post::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'tag',
        'user_id'
    ];
}
