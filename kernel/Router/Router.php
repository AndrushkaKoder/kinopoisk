<?php

namespace App\Kernel\Router;

use App\Kernel\Auth\interface\AuthInterface;
use App\Kernel\Database\interface\DatabaseInterface;
use App\Kernel\Exceptions\RouteException;
use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;
use App\Kernel\Middleware\Middleware;
use App\Kernel\Router\interface\RouterInterface;
use App\Kernel\Session\interface\SessionInterface;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\View\ViewInterface;
use App\Middleware\AuthMiddleware;
use JetBrains\PhpStorm\NoReturn;

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
		private AuthInterface     $auth,
		private StorageInterface $storage,

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

		if($route->hasMiddlewares()) {
			foreach ($route->getMiddlewares() as $middleware) {
				$middleware = new $middleware($this->request, $this->auth, $this->redirect);
				$middleware->handle();
			}
		}

		if (is_array($route->getAction())) {
			if(count($route->getAction()) < 2) throw new RouteException('Недостаточно параметров для роута!');
			[$controller, $action] = $route->getAction();
			$controller = new $controller;
			call_user_func([$controller, 'setView'], $this->view);
			call_user_func([$controller, 'setRequest'], $this->request);
			call_user_func([$controller, 'setRedirect'], $this->redirect);
			call_user_func([$controller, 'setSession'], $this->session);
			call_user_func([$controller, 'setDataBase'], $this->database);
			call_user_func([$controller, 'setAuth'], $this->auth);
			call_user_func([$controller, 'setStorage'], $this->storage);

			call_user_func([$controller, $action]);

		} else {
			call_user_func($route->getAction());
		}
	}

	private function getRoutes(): array|bool
	{
		$adminRoutes = CONFIG . '/routes/admin/web.php';
		$frontendRoutes = CONFIG . '/routes/frontend/web.php';

		return array_merge(include $adminRoutes, include $frontendRoutes);
	}

	private function findRoute($uri, $method): ?Route
	{
		if (!isset($this->routes[$method][$uri])) return null;

		return $this->routes[$method][$uri];
	}

	#[NoReturn] private function notFound(): void
	{
		exit("<h1><strong>404</strong> Page not Found!</h1> <a href='/'>go back</a>");
	}

}
