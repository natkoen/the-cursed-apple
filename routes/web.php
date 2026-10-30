<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



//home page route
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

//builds page route
Route::resource('/builds', BuildController::class);

//Comments for builds
Route::resource('comments', CommentController::class);
Route::post('/builds/{build}/comments', [CommentController::class, 'store'])->name('builds.comments.store');
Route::delete('/builds/{build}/comments/{comment}', [CommentController::class, 'destroy'])->name('builds.comments.destroy');
Route::resource('/heroes', HeroController::class);

//contact page route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

////Dashboard of breeze
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//my own dashboard
Route::middleware(['auth', 'verified'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/builds', [AdminController::class, 'builds'])->name('builds');
    Route::patch('/activeBuild/{build}', [AdminController::class, 'activeBuild'])->name('activeBuild');

    Route::get('/heroes', [AdminController::class, 'heroes'])->name('heroes');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
