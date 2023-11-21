<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session\interface\SessionInterface;
use App\Kernel\Session\Session;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

abstract class BaseController
{
	private ViewInterface $view;
	private RequestInterface $request;
	private RedirectInterface $redirect;
	private SessionInterface $session;

	public function setView(View $view): void
	{
		$this->view = $view;
	}

	public function setRequest(RequestInterface $request): void
	{
		$this->request = $request;
	}

	public function setRedirect(RedirectInterface $redirect): void
	{
		$this->redirect = $redirect;
	}

	public function setSession(SessionInterface $session): void
	{
		$this->session = $session;
	}

	public function view(string $viewName): void
	{
		$this->view->page($viewName);
	}

	public function request(): RequestInterface
	{
		return $this->request;
	}

	public function redirect($path): void
	{
		$this->redirect->to($path);
	}

	public function session(): SessionInterface
	{
		return $this->session;
	}

}
