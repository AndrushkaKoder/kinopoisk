<?php

namespace App\Controllers;

class MoviesController
{
	public function index()
	{
		include_once VIEWS . '/pages/movies.php';
	}

}
