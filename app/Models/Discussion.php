<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'group_id',
        'user_id'
    ];

    public function Reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Group()
    {
        return $this->belongsTo(Group::class);
    }
}
