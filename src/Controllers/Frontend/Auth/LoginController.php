<?php

namespace App\Controllers\Frontend\Auth;

use App\Kernel\Controller\BaseController;

class LoginController extends BaseController
{

	private string $errorMessage = 'Неверные данные!';

	public function index(): void
	{
		$this->view('frontend.LK.login');
	}

	public function login()
	{
		$validation = $this->request()->validate([
			'user_email' => ['required', 'email'],
			'user_password' => ['required', 'min:3'],
		]);

		if (!$validation) {
			$this->session()->set('error', [$this->errorMessage]);
			$this->redirect('/login');
		}

		$email = $this->request()->input('user_email');
		$password = $this->request()->input('user_password');

		if($this->auth()->attempt($email, $password)) {
			$this->redirect('/');
		} else {
			$this->session()->set('error', [$this->errorMessage]);
			$this->redirect('/login');
		}
	}

	public function logout(): void
	{
		$this->auth()->logout();
		$this->redirect('/login');
	}
}
