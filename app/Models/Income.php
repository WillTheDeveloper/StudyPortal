<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    use HasUuids;


    protected $fillable = [
        'user_id',
        'card_id',
        'amount',
        'paid'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Card()
    {
        return $this->belongsTo(Card::class);
    }
}
