<?php

namespace App\Controllers\Frontend\Auth;

use App\Kernel\Controller\BaseController;

class RegisterController extends BaseController
{
	public function index(): void
	{
		$this->view('frontend.pages.LK.register');
	}

	public function register(): void
	{
		if ($this->request()->input('private_data') !== '1') {
			$this->session()->set('error', ['Не выдано согласие на обработку персональных данных!']);
			$this->redirect('/register');
		}

		$validation = $this->request()->validate([
			'user_name' => ['required'],
			'user_email' => ['required', 'email'],
			'user_password' => ['required', 'min:5', 'confirmed'],
			'user_password_confirmed' => ['required', 'min:5'],
		]);

		if (!$validation) {
			foreach ($this->request()->errors() as $field => $errors) {
				$this->session()->set($field, $errors);
			}
			$this->redirect('/register');
		}

		if (!$this->checkUniqueUser()) {
			$this->session()->set('error', ['Пользователь с таким E-mail уже зарегистрирован!']);
			$this->redirect('/register');
		}

		$userId = $this->db()->insert('users', [
			'name' => clearStr($this->request()->input('user_name')),
			'email' => clearStr($this->request()->input('user_email')),
			'password' => clearStr(password_hash($this->request()->input('user_password'), PASSWORD_DEFAULT)),
		]);

		if ($userId) {
			$this->session()->set('user_id', $userId);
			$this->redirect('/');
		}
	}

	private function checkUniqueUser(): bool
	{
		$user = $this->db()->first('users', [
			'email' => $this->request()->input('user_email'),
		]);

		if ($user) return false;

		return true;
	}


}
