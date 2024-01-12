<?php

use App\Kernel\Router\Route;

return [
	Route::get('/admin', [\App\Controllers\Admin\IndexController::class, 'index']),
	Route::get('/admin/login', [\App\Controllers\Admin\LoginController::class, 'login']),


	Route::get('/admin', [\App\Controllers\Admin\IndexController::class, 'index']),
	Route::get('/admin/movies/add', [\App\Controllers\Admin\MoviesController::class, 'add']),
	Route::post('/admin/movies/create', [\App\Controllers\Admin\MoviesController::class, 'create']),

	Route::get('/admin/movies', [\App\Controllers\Admin\MoviesController::class, 'index']),

	Route::get('/admin/categories', [\App\Controllers\Admin\CategoriesController::class, 'index']),

	Route::get('/admin/categories/add', [\App\Controllers\Admin\CategoriesController::class, 'add']),
	Route::post('/admin/categories/create', [\App\Controllers\Admin\CategoriesController::class, 'create']),
	Route::get('/admin/categories/update', [\App\Controllers\Admin\CategoriesController::class, 'edit']),
	Route::post('/admin/categories/update', [\App\Controllers\Admin\CategoriesController::class, 'update']),
	Route::post('/admin/categories/remove', [\App\Controllers\Admin\CategoriesController::class, 'remove']),

	Route::get('/admin/users', [\App\Controllers\Admin\UsersController::class, 'index']),
	Route::get('/admin/info', [\App\Controllers\Admin\InfoController::class, 'index']),
];
