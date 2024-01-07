<?php

namespace App\Controllers\Frontend\LK;

use App\Kernel\Controller\BaseController;

class LkController extends BaseController
{
	public function index()
	{
		$this->view('frontend.pages.LK.home');
	}

}
