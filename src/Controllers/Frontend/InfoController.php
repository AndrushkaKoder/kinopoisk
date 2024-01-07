<?php

namespace App\Controllers\Frontend;

use App\Kernel\Controller\BaseController;

class InfoController extends BaseController
{
	public function index()
	{
		$this->view('frontend.pages.info');
	}

}
