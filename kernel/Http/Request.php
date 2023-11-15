<?php

namespace App\Kernel\Http;

class Request
{
	public function __construct(
		public array $get,
		public array $post,
		public array $server,
		public array $files,
		public array $cookies,
	)
	{
	}


	public static function createFromGlobals(): self
	{
		return new self($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
	}

	public function uri(): string
	{
		return preg_replace('/\?+.*/', '',  $this->server['REQUEST_URI']);
	}

	public function method(): string
	{
		return $this->server['REQUEST_METHOD'];
	}
}
