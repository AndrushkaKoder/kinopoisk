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

	public function page(string $page, array $data = []): void
	{
		$filepath = VIEWS . '/' . $this->dotNotation($page) . '.php';

		if (!file_exists($filepath)) throw new ViewNotFoundException();

		extract(array_merge($this->defaultData(), $data));
		include_once $filepath;
	}

	public function component(string $compName, array $data = []): void
	{
		$componentPath = VIEWS . '/' . $this->dotNotation($compName) . '.php';

		if (!file_exists($componentPath)) {
			echo "component $compName not found!";
			return;
		}

		extract(array_merge($this->defaultData(), $data));
		include $componentPath;
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
