<?php

use App\Kernel\Router\Route;

return [
	Route::get('/', [\App\Controllers\HomeController::class, 'index']),
	Route::get('/movies', [\App\Controllers\MoviesController::class, 'index']),



	Route::get('/test', function () {
		echo 'hello bro';
	}),
];
