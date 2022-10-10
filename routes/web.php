<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPost;
use App\Http\Livewire\Posts;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::get('/posts', Posts::class)->name('posts');
Route::get('/post/{id}', ShowPost::class)->name('post.show');
