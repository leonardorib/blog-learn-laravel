<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
    ]);
});
