<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Resource()
    {
        return $this->hasMany(Resource::class);
    }
}
