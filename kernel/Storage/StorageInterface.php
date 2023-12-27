<?php

namespace App\Kernel\Storage;

interface StorageInterface
{
	public function get(string $path);

	public function url(string $path): string;

}
