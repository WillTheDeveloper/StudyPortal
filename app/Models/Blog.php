<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'content_type',
        'visible',
        'url',
        'replies',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Response()
    {
        return $this->hasMany(Response::class);
    }
}
