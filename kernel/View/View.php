<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;

class View
{

	public function __construct(private Session $session)
	{
	}

	public function page(string $page): void
	{
		$filepath = VIEWS . '/pages/' . $this->dotNotation($page) . '.php';

		if (!file_exists($filepath)) throw new ViewNotFoundException();

		extract([
			'view' => $this,
			'session' => $this->session
		]);
		include_once $filepath;
	}

	public function component(string $compName): void
	{
		$componentPath = VIEWS . '/components/' . $this->dotNotation($compName) . '.php';

		if(!file_exists($componentPath)) {
			echo "component $compName not found!";
			return;
		}

		include_once $componentPath;

	}

	protected function dotNotation($name): string
	{
		return str_replace('.', '/', $name);
	}

}
