<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController ::class, 'store']);
Route::patch('/books/{id}/edit', [BookController::class, 'update']);
