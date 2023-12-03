<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class LoginController extends BaseController
{
	public function index()
	{
		$this->view('admin.login.login');
	}

	public function login()
	{
		$validation = $this->request()->validate([
			'user_email' => ['required', 'email'],
			'user_password' => ['required', 'min:3'],
		]);

		if (!$validation) {
				$this->session()->set('error', ['Ошибка входа']);
			$this->redirect('/login');
		}

		$email = $this->request()->input('user_email');
		$password = $this->request()->input('user_password');

		dd($this->auth()->attempt($email, $password), $_SESSION);
	}
}
