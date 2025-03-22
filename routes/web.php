<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('users.index');
// });

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
