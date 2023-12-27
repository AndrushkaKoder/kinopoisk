<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class IndexController extends BaseController
{
	public function index()
	{
		$this->view('admin.index.index');
	}

}
