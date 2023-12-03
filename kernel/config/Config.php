<?php

namespace App\Kernel\config;

use App\Kernel\config\interface\ConfigInterface;

class Config implements ConfigInterface
{
	public function get(string $key, $default = null): ?string
	{
		[$file, $configKey] = explode('.', $key);

		$configPath = APP_PATH . '/config/' . $file . '.php';

		if(!file_exists($configPath)) {
			return null;
		}

		$config = require $configPath;

		return $config[$configKey] ?? $default;
	}

}
