<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Models\Books;

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

// Route::get('/', function () { return view('welcome'); });
    

// CRUD Operation:

Route::get('/', MoviesController::class.'@index');
Route::post('/submit-movie', MoviesController::class.'@store');
Route::get('/edit-movies', MoviesController::class.'@show')->name('edit.movie');
Route::put('/edit/{id}', MoviesController::class.'@update')->name('editing.movie');
Route::get('/home', MoviesController::class.'@index')->name('home.movies');
Route::get('/delete-movies', MoviesController::class.'@deleteMovies')->name('delete.movies');

// Route::get('/books', App\Http\Controllers\BooksController::class.'@index');
// Route::post('/submit-book', App\Http\Controllers\BooksController::class.'@store');

// validation
// Route::get('/', App\Http\Controllers\ValidationController::class.'@index');
// Route::post('/validate-form', App\Http\Controllers\ValidationController::class.'@validate_form');


// Route::get('/', function(){ return view('jsondemo'); });
// Route::post('/process-form', App\Http\Controllers\jsonDemoController::class.'@processForm')->name('process.form');



// Route::get('/', function() {
//     $books = Books::all();
//     return view('Books', ['books'=>$books]);
// });















// Route::post('/submit-form', App\Http\Controllers\FormController::class.'@saveuser');
 
 //Route::get('/', PostController::class .'@index')->name('posts.index');
//use App\Http\Controllers\FormController;

//Route::post('/submit-form', [FormController::class, 'submit']);

//Route::post('/submit-form', 'FormController@store')->name('POST');