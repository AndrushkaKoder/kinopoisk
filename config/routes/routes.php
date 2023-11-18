<?php

use App\Kernel\Router\Route;

return [
	//frontend
	Route::get('/', [\App\Controllers\Frontend\HomeController::class, 'index']),
	Route::get('/movies', [\App\Controllers\Frontend\MoviesController::class, 'index']),

	//admin
	Route::get('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'add']),
	Route::post('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'create'])
];
