<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NavigatorController;

foreach (glob(__DIR__.'/web/*.php') as $file) {
	require $file;
}

Route::middleware('auth')->group(function () {
	Route::get('/', [HomepageController::class, 'index'])->name('index');

	Route::prefix('nav')->name('nav.')->group(function () {
		Route::get('/links', [NavigatorController::class, 'links'])->name('links');
		Route::get('/youtube', [NavigatorController::class, 'youtube'])->name('youtube');
	});
});

Route::get('/test', function () {
	return;
})->name('test');
