<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetaTagController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/meta-tags', [MetaTagController::class, 'index']);
Route::post('/meta-tags', [MetaTagController::class, 'store']);

