<?php

use App\Http\Controllers\BeritaMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news', [BeritaMediaController::class, 'index']); 
Route::post('/news', [BeritaMediaController::class, 'store']); 
Route::get('/news/{id}', [BeritaMediaController::class, 'show']); 
Route::put('/news/{id}', [BeritaMediaController::class, 'update']); 
Route::delete('/news/{id}', [BeritaMediaController::class, 'destroy']); 
Route::get('/news/search/{title}', [BeritaMediaController::class, 'search']); 
Route::get('/news/category/sport', [BeritaMediaController::class, 'sport']); 
Route::get('/news/category/finance', [BeritaMediaController::class, 'finance']); 
Route::get('/news/category/automotive', [BeritaMediaController::class, 'automotive']);