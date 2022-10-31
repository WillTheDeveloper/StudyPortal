<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'status',
        'user_id',
        'placement_id',
        'cv'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Placement()
    {
        return $this->belongsTo(Placement::class);
    }
}
