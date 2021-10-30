<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function Assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }

    public function Group() {
        return $this->hasMany(Group::class);
    }

    public function Post()
    {
        return $this->hasMany(Post::class);
    }
}
