<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'note',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
