<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

use App\Http\Controllers\MasterController;

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


Route::get('/', [BerandaController::class, 'beranda'])->name('HalamanBeranda');
Route::get('/about', [BerandaController::class, 'about'])->name('HalamanAbout');
Route::get('/media', [BerandaController::class, 'media'])->name('HalamanMedia');
Route::get('/member', [BerandaController::class, 'member'])->name('HalamanMember');
Route::get('/discography', [BerandaController::class, 'discography'])->name('HalamanDiscography');
