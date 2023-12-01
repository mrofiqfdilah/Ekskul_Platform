<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataguruController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\GabungController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ListmuridController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('listmurid',ListmuridController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/eskul/{id}', [EskulController::class, 'update'])->name('eskul.update');

Route::resource('gabung',GabungController::class);

Route::resource('eskul',EskulController::class);

Route::resource('user',UserController::class);

Route::resource('dataguru',GuruController::class);

Auth::routes();

Route::get('home', [EskulController::class, 'home'])->name('home');

Route::get('daftar{namaeskul}', [EskulController::class, 'daftar'])->name('daftar');

Route::get('/guru', [EskulController::class, 'guru'])->name('guru');

