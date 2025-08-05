<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/todos', TodoController::class);
    Route::put('/todos/{todo}/check', [TodoController::class, 'check'])->name('todos.check');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.create');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('login.logout');
    
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});
