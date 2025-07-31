<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// alttaki kodda direkt viewi donduruyor ancak bizim controller kullanmamiz gerekiyor ise
// function vermek yerine controller daki fonksiyonu verebiliriz kullanabiliriz
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
/*
Route::get('/categories', function () {
    return view('categories.index');
});
*/

Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class,'store'])->name('categories.store');
Route::get('categories/{category}', [CategoryController::class,'show'])->name('categories.show');
Route::delete('categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');