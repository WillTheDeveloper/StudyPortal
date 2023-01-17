<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsTo(User::query()->where('is_tutor', false));
    }

    public function Tutor()
    {
        return $this->belongsTo(User::query()->where('is_tutor', true));
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
