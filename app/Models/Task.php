<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'task',
        'details',
        'due',
        'user_id',
        'complete'
    ];

    protected $casts = [
        'due' => 'datetime',
        'complete' => 'boolean'
    ];
}
