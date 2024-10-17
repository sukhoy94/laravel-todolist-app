<?php

declare(strict_types=1);

use App\Modules\Todo\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->name('todos.')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/', [TodoController::class, 'store'])->name('store');
    Route::get('/{todo}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::put('/{todo}', [TodoController::class, 'update'])->name('update');
    Route::put('/{todo}/complete', [TodoController::class, 'markAsComplete'])->name('complete');
    Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('destroy');
});
