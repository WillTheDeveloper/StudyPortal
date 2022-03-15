<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'subject_id',
        'user_id',
        'institution_id',
        'weekday',
        'room'
    ];

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'start' => 'datetime:h-i-s',
        'end' => 'datetime:h-i-s'
    ];
}

