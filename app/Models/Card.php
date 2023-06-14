<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    use HasUuids;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Purchase()
    {
        return $this->hasMany(Purchase::class);
    }

    public function Savings()
    {
        return $this->hasMany(Saving::class);
    }
}
