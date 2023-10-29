<?php

use App\Router\Route;

return [
	Route::get('/home', function (){
		include_once VIEWS . '/pages/home.php';
	}),
	Route::get('/movies', function () {
		include_once VIEWS . '/pages/movies.php';
	}),
	Route::post('/test', function () {
		include_once VIEWS . '/pages/movies.php';
	})
];