<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Resource extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'url',
        'user_id',
        'label_id',
    ];

    #[SearchUsingFullText(['title'])]
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Label()
    {
        return $this->belongsTo(Label::class);
    }

    public function Star()
    {
        return $this->hasMany(Star::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
