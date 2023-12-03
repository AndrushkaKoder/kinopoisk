<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\Auth;
use App\Kernel\Auth\interface\AuthInterface;
use App\Kernel\Database\interface\DatabaseInterface;
use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;
use App\Kernel\Session\interface\SessionInterface;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

abstract class BaseController
{
	private ViewInterface $view;
	private RequestInterface $request;
	private RedirectInterface $redirect;
	private SessionInterface $session;
	private DatabaseInterface $database;
	private AuthInterface $auth;

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

	public function db(): DatabaseInterface
	{
		return $this->database;
	}

	public function setDataBase(DatabaseInterface $database): void
	{
		$this->database = $database;
	}

	public function auth(): AuthInterface
	{
		return $this->auth;
	}

	public function setAuth(AuthInterface $auth): void
	{
		$this->auth = $auth;
	}




}
