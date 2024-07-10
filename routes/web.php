<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contatti');
})->name('contatti');

Route::get('/albums', [AlbumController::class,'index'])->name('albums.index');
Route::get('/albums/{album}', [AlbumController::class,'show'])->name('albums.show');

// admin
Route::get('/admin/lista-albums', [AlbumController::class, 'index_admin'])->name('admin.albums.index');
Route::get('/admin/create-album', [AlbumController::class, 'create'])->name('admin.albums.create');
Route::post('/admin/albums', [AlbumController::class, 'store'])->name('admin.albums.store');
Route::get('/admin/modifica-album/{album}', [AlbumController::class, 'edit'])->name('admin.albums.edit');
Route::put('/admin/albums/{album}', [AlbumController::class, 'update'])->name('admin.albums.update');

Route::delete('/admin/albums/{album}', [AlbumController::class, 'destroy'])->name('admin.albums.destroy');
