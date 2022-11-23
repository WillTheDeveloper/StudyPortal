<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duedate',
        'setdate',
        'subject_id',
        'details'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class)->withPivot('has_seen', 'user_id', 'submitted_on');
    }

    public function Group()
    {
        return $this->belongsTo(Group::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function Assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    protected $casts = [
        'duedate' => 'datetime:Y-m-d H:00',
        'setdate' => 'datetime:Y-m-d H:00',
    ];
}
