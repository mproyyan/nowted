<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', MainController::class)->name("main");

Route::prefix('favorites')->name('favorites')->group(function () {
    Route::get('/', [FavoriteController::class, 'index']);
    Route::patch('/note', [FavoriteController::class, 'note'])->name('.note');
    Route::patch('/folder', [FavoriteController::class, 'folder'])->name('.folder');
});

Route::prefix('archives')->name('archives')->group(function () {
    Route::get('/', [ArchiveController::class, 'index']);
    Route::patch('/note', [ArchiveController::class, 'note'])->name('.note');
    Route::patch('/folder', [ArchiveController::class, 'folder'])->name('.folder');
});

Route::prefix('trash')->name('trash')->group(function () {
    Route::get('/', [TrashController::class, 'index']);
    Route::patch('/note', [TrashController::class, 'note'])->name('.note');
    Route::patch('/folder', [TrashController::class, 'folder'])->name('.folder');
    Route::delete('/note/permanently', [TrashController::class, 'deleteNote'])->name('.note.permanent');
    Route::delete('/folder/permanently', [TrashController::class, 'deleteFolder'])->name('.folder.permanent');
});
