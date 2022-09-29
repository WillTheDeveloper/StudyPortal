<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'group_id',
        'discussion_id'
    ];

    public function Discussion()
    {
        return $this->belongsTo(Discussion::class);
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
