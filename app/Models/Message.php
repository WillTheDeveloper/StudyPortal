<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
