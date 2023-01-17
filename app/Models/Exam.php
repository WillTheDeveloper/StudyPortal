<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsToMany(User::query()->where('is_tutor', false)->get());
    }

    public function Tutor()
    {
        return $this->belongsTo(User::query()->where('is_tutor', true)->get());
    }

    public function Grade()
    {
        return $this->hasMany(Grade::class);
    }
}
