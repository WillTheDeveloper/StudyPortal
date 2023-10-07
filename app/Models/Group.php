<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'subject_id'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class)->where('users.is_tutor', 0);
    }

    public function Subject() {
        return $this->belongsTo(Subject::class);
    }

    public function Reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function Discussion()
    {
        return $this->hasMany(Discussion::class);
    }
}
