<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetaTagController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/meta-tags', [MetaTagController::class, 'index']);
Route::get('/meta-tags/create', [MetaTagController::class, 'create']);
Route::post('/meta-tags', [MetaTagController::class, 'store']);

Route::delete('/meta-tags/{id}', [MetaTagController::class, 'destroy']);

Route::get('/dashboard', [MetaTagController::class, 'dashboard']);