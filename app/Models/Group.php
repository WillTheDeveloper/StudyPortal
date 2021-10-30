<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject_id'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class)->where('users.is_tutor', 0);
    }

    public function Subject() {
        return $this->belongsTo(Subject::class);
    }

    public function Timetable()
    {
        return $this->morphOne(Timetable::class, 'timetableable');
    }
}
