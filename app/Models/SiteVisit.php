<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteVisit extends Model
{
    use HasFactory;

    public $fillable = [
        'site_url',
        'visit_count'
    ];
}
