<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsToMany(User::class);
    }

    public function Tutor()
    {
        return $this->belongsTo(User::class)->where('is_tutor', true);
    }

    public function Grade()
    {
        return $this->hasMany(Grade::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
