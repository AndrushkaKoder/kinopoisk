<?php

namespace App\Kernel\Router;

use App\Kernel\Auth\interface\AuthInterface;
use App\Kernel\Database\interface\DatabaseInterface;
use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;
use App\Kernel\Router\interface\RouterInterface;
use App\Kernel\Session\interface\SessionInterface;
use App\Kernel\View\ViewInterface;

class Router implements RouterInterface
{
	private array $routes = [
		'GET' => [],
		'POST' => [],
	];

	public function __construct(
		private ViewInterface     $view,
		private RequestInterface  $request,
		private RedirectInterface $redirect,
		private SessionInterface  $session,
		private DatabaseInterface $database,
		private AuthInterface     $auth

	)
	{
		$this->initRoutes();
	}

	private function initRoutes(): void
	{
		$routes = $this->getRoutes();

		foreach ($routes as $route) {
			$this->routes[$route->getMethod()][$route->getUri()] = $route;
		}
	}

	public function dispatch(string $uri, string $method): void
	{
		$route = $this->findRoute($uri, $method);

		if (is_null($route)) $this->notFound();

		if (is_array($route->getAction())) {
			[$controller, $action] = $route->getAction();
			$controller = new $controller;
			call_user_func([$controller, 'setView'], $this->view);
			call_user_func([$controller, 'setRequest'], $this->request);
			call_user_func([$controller, 'setRedirect'], $this->redirect);
			call_user_func([$controller, 'setSession'], $this->session);
			call_user_func([$controller, 'setDataBase'], $this->database);
			call_user_func([$controller, 'setAuth'], $this->auth);


			call_user_func([$controller, $action]);
		} else {
			call_user_func($route->getAction());
		}
	}

	private function getRoutes(): array|bool
	{
		return include_once ROUTES;
	}

	private function findRoute($uri, $method): ?Route
	{
		if (!isset($this->routes[$method][$uri])) return null;

		return $this->routes[$method][$uri];
	}

	private function notFound()
	{
		exit("<h1><strong>404</strong> Page not Found!</h1> <a href='/'>go back</a>");
	}

}
