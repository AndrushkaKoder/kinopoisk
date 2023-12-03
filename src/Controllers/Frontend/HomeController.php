<?php

namespace App\Controllers\Frontend;

use App\Kernel\Controller\BaseController;

class HomeController extends BaseController
{
	public function index(): void
	{
		$this->view('frontend.home');
	}

}
