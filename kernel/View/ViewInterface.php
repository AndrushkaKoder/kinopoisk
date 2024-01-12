<?php

namespace App\Kernel\View;

interface ViewInterface
{
	public function page(string $page, array $data = []): void;

	public function component(string $compName, array $data = []): void;

	public function start(string $type = 'frontend'): void;

	public function end(string $type = 'frontend'): void;
}
