<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'product',
        'description',
        'cost',
        'category_id',
        'card_id',
        'user_id',
        'purchased'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Card()
    {
        return $this->belongsTo(Card::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
