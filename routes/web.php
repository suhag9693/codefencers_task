<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AudioFileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('audio-files', [AudioFileController::class, 'index'])->name('index');
Route::get('audio-files/create', [AudioFileController::class, 'create'])->name('create');
Route::get('audio-files/show/{id}', [AudioFileController::class, 'show'])->name('show');
Route::post('audio-files', [AudioFileController::class, 'store'])->name('store');
Route::get('audio-files/edit/{id}', [AudioFileController::class, 'edit'])->name('edit');
Route::put('audio-files/update/{id}', [AudioFileController::class, 'update'])->name('update');
Route::get('audio-files/delete/{id}', [AudioFileController::class, 'destroy'])->name('delete');
