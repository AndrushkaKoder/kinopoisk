<?php

use App\Kernel\Router\Route;
use App\Middleware\AuthMiddleware;

return [
	Route::get('/', [\App\Controllers\Frontend\HomeController::class, 'index']),
	Route::get('/movies', [\App\Controllers\Frontend\MoviesController::class, 'index']),
	Route::get('/info', [\App\Controllers\Frontend\InfoController::class, 'index']),

	Route::get('/register', [\App\Controllers\Frontend\Auth\RegisterController::class, 'index'], [AuthMiddleware::class]),
	Route::post('/register', [\App\Controllers\Frontend\Auth\RegisterController::class, 'register']),
	Route::get('/login', [\App\Controllers\Frontend\Auth\LoginController::class, 'index'], [AuthMiddleware::class]),
	Route::post('/login', [\App\Controllers\Frontend\Auth\LoginController::class, 'login']),
	Route::post('/logout', [\App\Controllers\Frontend\Auth\LoginController::class, 'logout']),
];
