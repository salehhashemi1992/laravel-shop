<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleAuthController::class, 'callback']);

Route::get('/auth/token/check', [\App\Http\Controllers\Auth\AuthTokenController::class, 'getToken'])->name('auth.token_check');
Route::post('/auth/token/check', [\App\Http\Controllers\Auth\AuthTokenController::class, 'manageToken']);

Route::middleware('auth')->group(function () {
    Route::get('profile', [\App\Http\Controllers\Profile\IndexController::class, 'index'])->name('profile.index');
    Route::get('profile/two_factor_auth', [\App\Http\Controllers\Profile\TwoFactorAuthController::class, 'two_factor_auth'])->name('profile.two_factor');
    Route::post('profile/two_factor_auth', [\App\Http\Controllers\Profile\TwoFactorAuthController::class, 'manage_two_factor_auth'])->name('profile.two_factor_manage');
    Route::get('profile/confirm_phone', [\App\Http\Controllers\Profile\TokenAuthController::class, 'confirm_phone'])->name('profile.phone_verify');
    Route::post('profile/confirm_phone', [\App\Http\Controllers\Profile\TokenAuthController::class, 'manage_confirm_phone']);
});
