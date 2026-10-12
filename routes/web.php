<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//home page route
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

//builds page route
Route::get('builds/{name?}', function (?string $name = null) {
    return view ('builds', [
        'name' => $name
    ]);
})->name('builds');

// Builds page named route
//Route::get('builds/hero', function () {
//    return view('builds');
//})-> name('hero');

//contact page route
Route::get('/contact', function () {
    $company = 'The Cursed Apple';
    return view('contact', [
        'company' => $company
    ]);
})->name('contact');

//some kinda dashboard for users?
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
