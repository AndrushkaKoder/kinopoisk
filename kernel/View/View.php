<?php

namespace App\Kernel\View;

use App\Kernel\Auth\interface\AuthInterface;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\interface\SessionInterface;

class View implements ViewInterface
{

	public function __construct(
		private SessionInterface $session,
		private AuthInterface    $auth
	)
	{
	}

	public function page(string $page): void
	{
		$filepath = VIEWS . '/' . $this->dotNotation($page) . '.php';

		if (!file_exists($filepath)) throw new ViewNotFoundException();

		extract($this->defaultData());
		include_once $filepath;
	}

	public function component(string $compName): void
	{
		$componentPath = VIEWS . '/' . $this->dotNotation($compName) . '.php';

		if (!file_exists($componentPath)) {
			echo "component $compName not found!";
			return;
		}

		extract($this->defaultData());
		include_once $componentPath;
	}

	public function start(string $type = 'frontend'): void
	{
		 $this->component("{$type}.components.head");
	}
	public function end(string $type = 'frontend'): void
	{
		$this->component("{$type}.components.footer");
	}

	protected function dotNotation($name): string
	{
		return str_replace('.', '/', $name);
	}

	private function defaultData(): array
	{
		return [
			'view' => $this,
			'session' => $this->session,
			'auth' => $this->auth
		];
	}

}
