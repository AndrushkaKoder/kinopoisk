<?php

use App\Kernel\Router\Route;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\RedirectIfAuthAdminMiddleware;

return [
	Route::get('/admin', [\App\Controllers\Admin\IndexController::class, 'index']),
	Route::get('/admin/login', [\App\Controllers\Admin\LoginController::class, 'login']),


	Route::get('/admin', [\App\Controllers\Admin\IndexController::class, 'index']),
	Route::get('/admin/movies/add', [\App\Controllers\Admin\MoviesController::class, 'add']),
	Route::post('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'create']),
];
