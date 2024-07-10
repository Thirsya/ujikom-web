<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;
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

Route::get('/', function () {
    return redirect()->route('surat.index');
})->name('surat-page');

Route::resource('kategori', KategoriController::class);
Route::resource('surat', SuratController::class);
Route::get('arsip-surat/download/{id}', [SuratController::class, 'download'])->name('surat.download');
