<?php

namespace App\Kernel\File;

use App\Kernel\File\interface\FileInterface;

class File implements FileInterface
{
	public function __construct(
		public string $name,
		public string $type,
		public string $tmpName,
		public int    $error,
		public int    $size
	)
	{

	}

	public function save(string $path, string $filename = ''): string|false
	{
		$storagePath = "/public/system/files/{$path}";
		$filesDir = APP_PATH . $storagePath;

		if (!is_dir($filesDir)) mkdir($filesDir, 777, true);
		if (!$filename) $filename = $this->randomFilename($this->name);

		if (move_uploaded_file($this->tmpName,  "{$filesDir}/{$filename}")) {
			return "{$storagePath}/{$filename}";
		}
		return false;
	}

	private function randomFilename(string $defaultName): string
	{
		return md5($defaultName) . '.' . $this->getExtension();
	}

	private function getExtension(): string
	{
		return preg_replace('/^\w+\/+/', '', $this->type);
	}

}
