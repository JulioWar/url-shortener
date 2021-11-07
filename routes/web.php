<?php

use App\Http\Controllers\Api\SiteVisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('{alias}', [SiteVisitController::class, 'redirectToSite']);
