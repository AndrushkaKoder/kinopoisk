<?php

namespace App\Kernel\Router\interface;

interface RouterInterface
{
	public function dispatch(string $uri, string $method): void;
}
