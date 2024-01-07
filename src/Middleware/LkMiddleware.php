<?php

namespace App\Middleware;

use App\Kernel\Middleware\AbstractMiddleware;

class LkMiddleware extends AbstractMiddleware
{
	public function handle(): void
	{
		if(!$this->auth->check()) $this->redirect->to('/login');
	}

}
