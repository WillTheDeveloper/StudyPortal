<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'subject_id',
        'slug'
    ];

    public function toSearchableArray()
    {
        return[
            'title' => $this->title,
        ];
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function Report()
    {
        return $this->hasMany(Report::class);
    }
}
