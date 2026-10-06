<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublikasiController;

Route::get('/', function () {
    return redirect()->route('publikasi.index');
});

Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/create', [PublikasiController::class, 'create'])->name('publikasi.create');
Route::post('/publikasi', [PublikasiController::class, 'store'])->name('publikasi.store');
Route::delete('/publikasi/{publikasi}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
