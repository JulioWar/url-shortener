<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    public $fillable = [
        'alias',
        'original_url'
    ];

    public function scopeAlias($query, string $alias) {
        return $query->whereAlias($alias);
    }
}
