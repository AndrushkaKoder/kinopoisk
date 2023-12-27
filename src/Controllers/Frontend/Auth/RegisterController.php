<?php

namespace App\Controllers\Frontend\Auth;

use App\Kernel\Controller\BaseController;

class RegisterController extends BaseController
{
	public function index(): void
	{
		$this->view('frontend.LK.register');
	}

	public function register(): void
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

		if(!$this->checkUniqueUser()) {
			$this->session()->set('error', ['Пользователь с таким E-mail уже зарегистрирован!']);
			$this->redirect('/register');
		}


		$userId = $this->db()->insert('users', [
			'user_name' => $this->request()->input('user_name'),
			'user_email' => $this->request()->input('user_email'),
			'user_password' => password_hash($this->request()->input('user_password'), PASSWORD_DEFAULT),
		]);

		if($userId) {
			$this->session()->set('user_id', $userId);
			$this->redirect('/');
		}
	}

	private function checkUniqueUser(): bool
	{
		$user = $this->db()->first('users', [
			'user_email' => $this->request()->input('user_email'),
		]);

		if($user) return false;

		return true;
	}


}
