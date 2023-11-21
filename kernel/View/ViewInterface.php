<?php

namespace App\Kernel\View;

interface ViewInterface
{
	public function page(string $page): void;

	public function component(string $compName): void;
}
