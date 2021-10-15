<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsToMany(User::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    protected $casts = [
        'duedate' => 'datetime:Y-m-d H:00',
        'setdate' => 'datetime:Y-m-d H:00'
    ];
}
