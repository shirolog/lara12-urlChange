<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;


//short url app

Route::get('/', [UrlController::class, 'index'])->name('urls.index');
Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');
Route::get('/check-exp', function () {
    return config('app.url_expiration_days');
});
Route::get('/{shortUrl}', [UrlController::class, 'redirect'])->name('urls.redirect');


