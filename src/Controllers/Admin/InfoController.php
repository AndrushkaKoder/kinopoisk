<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class InfoController extends BaseController
{
	public function index()
	{
		$this->view('admin.pages.info.index');
	}

}
