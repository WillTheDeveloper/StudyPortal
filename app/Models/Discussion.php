<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    public function Reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
