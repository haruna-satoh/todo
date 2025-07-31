<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
});

Route::post('/todos', [TodoController::class, 'store']);

Route::patch('/todos/update', [TodoController::class, 'update']);

Route::delete('/todos/delete', [TodoController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/categories', [CategoryController::class, 'store']);

Route::patch('/categories/update', [CategoryController::class, 'update']);

Route::delete('/categories/delete', [CategoryController::class, 'destroy']);

Route::get('/todos/search', [TodoController::class, 'search']);

// Route::get('/', [AuthController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});