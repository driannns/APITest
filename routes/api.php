<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostResource;


//posts
Route::get('demografis', [PostController::class, 'index']);
Route::get('demografis/total', [PostController::class, 'total']);
Route::post('demografis', [PostController::class, 'store']);
Route::get('demografis/{id}', [PostController::class, 'show']);
Route::put('demografis/{id}/update', [PostController::class, 'update']);
Route::delete('demografis/{id}', [PostController::class, 'destroy']);