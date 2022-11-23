<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Label()
    {
        return $this->belongsToMany(Label::class);
    }

    public function Star()
    {
        return $this->hasMany(Star::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
