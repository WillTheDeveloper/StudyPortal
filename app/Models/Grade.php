<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsTo(User::query()->where('is_tutor', false)->get());
    }

    public function Tutor()
    {
        return $this->belongsTo(User::query()->where('is_tutor', true)->get());
    }

    public function Exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
