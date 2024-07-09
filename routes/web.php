<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\FakultasController;

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

Route::get('/T', function () {
    return view('Tugas');
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/posts', \App\Http\Controllers\ProgramStudiController::class);
Route::resource('fakultas', FakultasController::class);

Route::get('/posts', [ProgramStudiController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [ProgramStudiController::class, 'create'])->name('posts.create');
Route::post('/posts', [ProgramStudiController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [ProgramStudiController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [ProgramStudiController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [ProgramStudiController::class, 'destroy'])->name('posts.destroy');
Route::get('/fetch-sekolah', [App\Http\Controllers\SekolahController::class, 'fetchSekolah']);
Route::get('/sekolah', [App\Http\Controllers\SekolahController::class, 'index']);
