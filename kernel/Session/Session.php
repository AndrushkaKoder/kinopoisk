<?php

namespace App\Kernel\Session;

use App\Kernel\Session\interface\SessionInterface;

class Session implements SessionInterface
{
	public function __construct()
	{
		session_start();
	}

	public function set(string $key, $value): void
	{
		$_SESSION[$key] = $value;
	}

	public function get(string $key)
	{
		return $_SESSION[$key] ?? null;
	}

	public function getFlash(string $key)
	{
		$value = $this->get($key);
		if($value) $this->delete($key);

		return $value;
	}

	public function has(string $key): bool
	{
		return isset($_SESSION[$key]);
	}

	public function delete(string $key): void
	{
		unset($_SESSION[$key]);
	}

	public function destroy(): void
	{
		session_destroy();
	}

}
