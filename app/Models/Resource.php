<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'user_id',
        'label_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Label()
    {
        return $this->belongsTo(Label::class);
    }

    public function Star()
    {
        return $this->hasMany(Star::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
