<?php

use App\Http\Controllers\MovieDatabaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/genre', [MovieDatabaseController::class, 'genre'])->name('Genre');
Route::get('/timeslot', [MovieDatabaseController::class, 'timeslot'])->name('TimeSlot');
Route::get('/specific_movie_theater', [MovieDatabaseController::class, 'specific_movie_theater'])->name('Specific Movie Theater');
Route::get('/search_performer', [MovieDatabaseController::class, 'search_performer'])->name('Search Performer');
Route::post('/give_rating/{username}', [MovieDatabaseController::class, 'give_rating'])->name('Give Rating');
Route::get('/new_movies', [MovieDatabaseController::class, 'new_movies'])->name('New Movies');
Route::post('/add_movie', [MovieDatabaseController::class, 'add_movie'])->name('Add Movie');