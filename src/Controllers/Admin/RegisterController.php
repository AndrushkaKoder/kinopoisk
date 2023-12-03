<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class RegisterController extends BaseController
{
	public function index()
	{
		$this->view('admin.register.register');
	}

	public function register()
	{
		$validation = $this->request()->validate([
			'user_name' => ['required'],
			'user_email' => ['required', 'email'],
			'user_password' => ['required', 'min:5'],
		]);

		if (!$validation) {
			foreach ($this->request()->errors() as $field => $errors) {
				$this->session()->set($field, $errors);
			}
			$this->redirect('/register');
		}

		$userId = $this->db()->insert('users', [
			'user_name' => $this->request()->input('user_name'),
			'user_email' => $this->request()->input('user_email'),
			'user_password' => password_hash($this->request()->input('user_password'), PASSWORD_DEFAULT),
		]);

		if($userId) {
			dd("Юзер с id {$userId} зарегистрирован");
		}

	}

}
