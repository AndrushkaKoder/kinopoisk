<?php

namespace App\Kernel\Container;

use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\interface\RouterInterface;
use App\Kernel\Router\Router;
use App\Kernel\Session\interface\SessionInterface;
use App\Kernel\Session\Session;
use App\Kernel\Validator\interface\ValidatorInterface;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

class Container
{
	public RequestInterface $request;
	public RouterInterface $router;
	public ViewInterface $view;
	public ValidatorInterface $validator;
	public RedirectInterface $redirect;
	public SessionInterface $session;

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
