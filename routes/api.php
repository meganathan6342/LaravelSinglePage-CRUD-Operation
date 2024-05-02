<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// movies 
Route::get('/movies', [MoviesAPIController::class, 'retrieve']); // true
Route::post('/submit-movie', [MoviesAPIController::class, 'create']); // true
Route::get('/movie/{id}', [MoviesAPIController::class, 'showing']); // true
Route::put('/edit/{id}', [MoviesAPIController::class, 'updating']); // true
Route::get('/home', [MoviesAPIController::class, 'retrieve']); // true
Route::delete('/delete-movie/{id}', [MoviesAPIController::class, 'delete']); // true