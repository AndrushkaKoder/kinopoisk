<?php

namespace App\Kernel\Middleware;

use App\Kernel\Auth\interface\AuthInterface;
use App\Kernel\Http\interface\RedirectInterface;
use App\Kernel\Http\interface\RequestInterface;

abstract class AbstractMiddleware
{
	public function __construct(
		protected RequestInterface $request,
		protected AuthInterface $auth,
		protected RedirectInterface $redirect,
	)
	{

	}

	public abstract function handle(): void;

}
