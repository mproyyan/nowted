<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MainController;
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
