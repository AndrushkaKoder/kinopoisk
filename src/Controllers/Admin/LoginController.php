<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class LoginController extends BaseController
{
	public function login()
	{
		$this->view('admin.login.login');
	}

}
