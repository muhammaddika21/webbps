<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublikasiController;

Route::get('/publikasi', [PublikasiController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
