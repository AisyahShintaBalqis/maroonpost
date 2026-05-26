<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontendController::class, 'index']);

Route::get('/post/{slug}', [FrontendController::class, 'show']);

Route::get('/category/{slug}', [FrontendController::class, 'category']);

Route::get('/category/{slug}', [CategoryController::class, 'show']);

Route::get('/page/{slug}', [PageController::class, 'show']);

Route::post('/comment', [CommentController::class, 'store']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
