<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ShelfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public route for the home page
Route::get('/', [ShelfController::class, 'home'])->name('home');

// Public route for viewing a shelf
Route::get('/shelves/{shelf}', [ShelfController::class, 'show'])->name('shelves.show');

// Authentication routes
Auth::routes();

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // User's shelves route
    Route::get('/shelves', [ShelfController::class, 'index'])->name('shelves.index');

    // Shelf routes
    Route::resource('shelves', ShelfController::class)->except(['show', 'edit', 'update']);
    Route::get('/shelves/{shelf}/edit', [ShelfController::class, 'edit'])->name('shelves.edit');
    Route::patch('/shelves/{shelf}', [ShelfController::class, 'update'])->name('shelves.update');

    // Album routes (nested under shelves)
    Route::get('/shelves/{shelf}/albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::post('/shelves/{shelf}/albums', [AlbumController::class, 'store'])->name('albums.store');
    Route::delete('/shelves/{shelf}/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');

    // Album search route
    Route::get('/shelves/{shelf}/albums/search', [AlbumController::class, 'search'])->name('albums.search');
});

