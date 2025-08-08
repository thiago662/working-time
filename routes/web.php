<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');

Route::get('/work-day', [App\Http\Controllers\WorkDayController::class, 'index'])->name('work-day.index');
Route::get('/work-day/create', [App\Http\Controllers\WorkDayController::class, 'create'])->name('work-day.create');
Route::post('/work-day/store', [App\Http\Controllers\WorkDayController::class, 'store'])->name('work-day.store');
Route::get('/work-day/{id}', [App\Http\Controllers\WorkDayController::class, 'show'])->name('work-day.show');
Route::get('/work-day/{id}/edit', [App\Http\Controllers\WorkDayController::class, 'edit'])->name('work-day.edit');
Route::put('/work-day/{id}', [App\Http\Controllers\WorkDayController::class, 'update'])->name('work-day.update');
Route::delete('/work-day/{id}', [App\Http\Controllers\WorkDayController::class, 'destroy'])->name('work-day.destroy');

Route::get('/checkpoint/create', [App\Http\Controllers\CheckpointController::class, 'create'])->name('checkpoint.create');
Route::post('/checkpoint/store', [App\Http\Controllers\CheckpointController::class, 'store'])->name('checkpoint.store');
Route::delete('/checkpoint/{id}', [App\Http\Controllers\CheckpointController::class, 'destroy'])->name('checkpoint.destroy');
