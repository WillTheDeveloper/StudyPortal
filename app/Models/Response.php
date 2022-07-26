<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
