<?php

namespace App\Kernel\Session\interface;

interface SessionInterface
{
	public function set(string $key, $value): void;

	public function get(string $key);

	public function getFlash(string $key);

	public function has(string $key): bool;

	public function delete(string $key): void;

	public function destroy(): void;
}
