<?php

namespace App;

use App\Router\Router;

class App
{
	public function run(): void
	{
		$router = new Router();

		$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

	}
}