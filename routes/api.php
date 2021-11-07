<?php

use App\Http\Controllers\Api\ShortUrlController;
use App\Http\Controllers\Api\SiteVisitController;
use Illuminate\Support\Facades\Route;

Route::post('url.json', [ShortUrlController::class, 'store']);
Route::get('top.json', [SiteVisitController::class, 'mostPopular']);
