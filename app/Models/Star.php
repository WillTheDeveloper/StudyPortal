<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resource_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
