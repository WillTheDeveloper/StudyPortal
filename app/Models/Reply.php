<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    public function Discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
