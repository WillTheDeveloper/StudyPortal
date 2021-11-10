<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'subject_id'
    ];

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
