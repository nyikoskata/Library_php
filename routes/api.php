<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/authors', AuthorController::class);
Route::get('/authors-with-books', [AuthorController::class, 'authorsWithBooks']);

Route::resource('/books', BookController::class);
Route::get('/books-by-typeid/{id}', [BookController::class, 'booksByTypeId']);
Route::get('/type-by-bookid/{id}', [BookController::class, 'typeByBookId']);
Route::get('/book-by-authorname/{name}/{surname}', [BookController::class, 'booksByAuthorName']);

Route::resource('/students', StudentController::class);
