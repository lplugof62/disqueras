<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\DisquerasController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/artista/edit', [ArtistasController::class,'edit']);
Route::get('/disquera/edit', [DisquerasController::class,'edit']);
Route::get('/artista/edit', [ArtistasController::class,'edit']);
Route::get('/genero/edit', [GeneroController::class,'edit']);
Route::get('/album/edit', [AlbumController::class,'edit']);

Route::resource('artista', ArtistasController::class)->middleware('auth');
Route::resource('disquera', DisquerasController::class)->middleware('auth');
Route::resource('genero', GeneroController::class)->middleware('auth');
Route::resource('album', AlbumController::class)->middleware('auth');
Route::resource('cancion', CancionController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [AlbumController::class, 'index'])->name('disquera');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/',[AlbumController::class, 'index'])->name('disquera') ;
});

