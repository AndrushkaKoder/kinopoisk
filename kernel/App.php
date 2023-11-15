<?php

namespace App\Kernel;

use App\Kernel\Container\Container;

class App
{
	private Container $container;

	public function __construct()
	{
		$this->container = new Container();
	}

	public function run(): void
	{
		$request = $this->container->request;
		$router = $this->container->router;
		$router->dispatch($request->uri(), $request->method());
	}
}
