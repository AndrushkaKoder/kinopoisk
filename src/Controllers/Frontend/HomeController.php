<?php

namespace App\Controllers\Frontend;

use App\Kernel\Controller\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$this->view('frontend.home');
	}

}
