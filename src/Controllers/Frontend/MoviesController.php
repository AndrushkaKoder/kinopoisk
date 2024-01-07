<?php

namespace App\Controllers\Frontend;

use App\Kernel\Controller\BaseController;

class MoviesController extends BaseController
{
	public function index()
	{
		$this->view('frontend.pages.movies');
	}

	public function show()
	{
		$this->view('frontend.pages.film');
	}

}
