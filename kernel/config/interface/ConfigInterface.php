<?php

namespace App\Kernel\config\interface;

interface ConfigInterface
{
	public function get(string $key, $default = null): ?string;

}
