<?php

namespace App\Kernel\Storage;

use App\Kernel\config\interface\ConfigInterface;

class Storage implements StorageInterface
{

	public function __construct(
		private ConfigInterface $config,
	)
	{

	}

	public function get(string $path): bool|string
	{
		return file_get_contents(APP_PATH . $path);

	}

	public function url(string $path): string
	{
		$host = $this->config->get('app.host');
		return $host . $this->getCorrectPublicPath($path);
	}

	private function getCorrectPublicPath($path): string
	{
		return preg_replace('/\/public/', '', $path);
	}
}
