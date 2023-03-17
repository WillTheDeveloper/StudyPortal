<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanbanItem extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'item',
        'user_id',
        'kanban_id',
        'kanban_group_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Group()
    {
        return $this->belongsTo(KanbanGroup::class);
    }

    public function Kanban()
    {
        return $this->belongsTo(Kanban::class);
    }
}
