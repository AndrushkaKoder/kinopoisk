<?php

namespace App\Kernel\File\interface;

interface FileInterface
{
	public function save(string $path, string $filename = ''): string|false;
}
