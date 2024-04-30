<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSessionController;

Route::name('users.')->group(function () {
	Route::middleware('guest')->group(function () {
		Route::get('/register', [UserController::class, 'create'])->name('register');
		Route::post('/register', [UserController::class, 'store'])->name('store');

		Route::get('/login', [UserSessionController::class, 'create'])->name('login');
		Route::post('/login', [UserSessionController::class, 'store'])->name('auth');
	});

	Route::get('/logout', [UserSessionController::class, 'destroy'])->middleware('auth')->name('logout');
});
