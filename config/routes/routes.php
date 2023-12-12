<?php

use App\Kernel\Router\Route;

return [
	//frontend
	Route::get('/', [\App\Controllers\Frontend\HomeController::class, 'index']),
	Route::get('/movies', [\App\Controllers\Frontend\MoviesController::class, 'index']),

	//admin
	Route::get('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'add']),
	Route::post('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'create']),
	Route::get('/register', [\App\Controllers\Admin\RegisterController::class, 'index']),
	Route::post('/register', [\App\Controllers\Admin\RegisterController::class, 'register']),
	Route::get('/login', [\App\Controllers\Admin\LoginController::class, 'index']),
	Route::post('/login', [\App\Controllers\Admin\LoginController::class, 'login']),
	Route::post('/logout', [\App\Controllers\Admin\LoginController::class, 'logout']),
];
