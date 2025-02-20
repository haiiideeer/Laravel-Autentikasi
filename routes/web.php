<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Mews\Captcha\Facades\Captcha;

// Route untuk merefresh captcha (diletakkan di luar middleware auth)
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => Captcha::img()]);
})->name('captcha.refresh');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua halaman hanya bisa diakses setelah login.
|
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/signature', [SignatureController::class, 'showForm'])->name('signature.form');
    Route::post('/signature/generate', [SignatureController::class, 'generateSignature'])->name('signature.generate');
    Route::get('/signature/view/{id}', [SignatureController::class, 'viewSignature'])->name('signature.view');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Halaman awal login dan register
Route::get('/', function () {
    return view('welcome'); // Pastikan ada file welcome.blade.php yang berisi login dan register
})->name('home');

require __DIR__.'/auth.php';

// Route logout menggunakan AuthenticatedSessionController agar sesuai dengan Laravel Breeze
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
