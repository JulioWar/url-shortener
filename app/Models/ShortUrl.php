<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    public $hidden = [
        'id'
    ];

    public $fillable = [
        'alias',
        'original_url',
        'is_nsfw'
    ];

    public function scopeAlias($query, string $alias) {
        return $query->whereAlias($alias);
    }
}
