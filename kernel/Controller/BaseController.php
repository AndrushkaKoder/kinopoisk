<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session\Session;
use App\Kernel\View\View;

abstract class BaseController
{
	private View $view;
	private Request $request;
	private Redirect $redirect;
	private Session $session;

	public function setView(View $view): void
	{
		$this->view = $view;
	}

	public function setRequest(Request $request): void
	{
		$this->request = $request;
	}

	public function setRedirect(Redirect $redirect): void
	{
		$this->redirect = $redirect;
	}

	public function setSession(Session $session): void
	{
		$this->session = $session;
	}

	public function view(string $viewName): void
	{
		$this->view->page($viewName);
	}

	public function request(): Request
	{
		return $this->request;
	}

	public function redirect($path): void
	{
		$this->redirect->to($path);
	}

	public function session(): Session
	{
		return $this->session;
	}

}
