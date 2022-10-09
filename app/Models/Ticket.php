<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    use HasUuids;

    public function Student()
    {
        return $this->belongsTo(User::class)->where('is_tutor', false);
    }

    public function Tutor()
    {
        return $this->belongsTo(User::class)->where('is_tutor', false);
    }

    public function Message()
    {
        return $this->hasMany(Message::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
