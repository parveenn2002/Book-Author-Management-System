<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/authors', [AuthorController::class, 'webIndex']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'storeWeb']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroyWeb']);

Route::get('/books', [BookController::class, 'webIndex']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'storeWeb']);
Route::delete('/books/{book}', [BookController::class, 'destroyWeb']);

