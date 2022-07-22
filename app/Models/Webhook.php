<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'url',
        'name',
        'posts',
        'comments',
        'assignments',
        'blog',
        'active'
    ];

    protected $casts = [
        'posts' => 'boolean',
        'comments' => 'boolean',
        'assignments' => 'boolean',
        'blog' => 'boolean',
        'active' => 'boolean',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
