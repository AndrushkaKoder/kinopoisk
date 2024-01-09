<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class UsersController extends BaseController
{
	public function index()
	{
		$this->view('admin.pages.users.index');
	}

}
