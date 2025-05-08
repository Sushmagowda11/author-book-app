<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatbotController;


Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot');

Route::post('/chatbot/ask', [ChatbotController::class, 'respond'])->name('chatbot.ask');
