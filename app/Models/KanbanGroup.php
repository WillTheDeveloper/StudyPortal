<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanbanGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'kanban_id',
        'user_id'
    ];

    public function Kanban()
    {
        return $this->belongsTo(Kanban::class);
    }

    public function Item()
    {
        return $this->hasMany(KanbanItem::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
