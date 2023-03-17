<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'user_id',
        'description'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Group()
    {
        return $this->hasMany(KanbanGroup::class);
    }

    public function Item()
    {
        return $this->hasMany(KanbanItem::class);
    }
}
