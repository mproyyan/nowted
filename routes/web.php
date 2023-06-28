<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TrashController;
use App\Models\Folder;
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

Route::prefix('folders')->name('folder')->group(function () {
    Route::post('/', [FolderController::class, 'create'])->name('.create');
    Route::patch('/', [FolderController::class, 'update'])->name('.update');
    Route::get('/{id}', [FolderController::class, 'view'])->name('.detail');
});

Route::prefix('notes')->name('note')->group(function () {
    Route::get('/', [NoteController::class, 'create'])->name('.create');
    Route::post('/', [NoteController::class, 'insert'])->name('.insert');
    Route::get('/{id}', [NoteController::class, 'view'])->name('.detail');
});
