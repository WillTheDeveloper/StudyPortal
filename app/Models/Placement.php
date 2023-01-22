<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'location',
        'company',
        'role',
        'title',
        'description',
        'slug',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Application()
    {
        return $this->hasMany(Application::class);
    }

    protected $casts = [
        'closing' => 'date',
        'active' => 'boolean',
        'open' => 'boolean'
    ];
}
