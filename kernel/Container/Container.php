<?php

namespace App\Kernel\Container;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Session\Session;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
	public Request $request;
	public Router $router;
	public View $view;
	public Validator $validator;
	public Redirect $redirect;
	public Session $session;

	public function __construct()
	{
		$this->registerServices();
	}

	public function registerServices(): void
	{
		$this->request = Request::createFromGlobals();
		$this->validator = new Validator();
		$this->session = new Session();
		$this->redirect = new Redirect();
		$this->request->setValidator($this->validator);
		$this->view = new View($this->session);
		$this->router = new Router($this->view, $this->request, $this->redirect, $this->session);

	}
}
