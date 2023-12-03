<?php

namespace App\Kernel\Auth;

use App\Kernel\config\interface\ConfigInterface;
use App\Kernel\Database\interface\DatabaseInterface;
use App\Kernel\Session\interface\SessionInterface;

class Auth implements interface\AuthInterface
{

	public function __construct(
		private DatabaseInterface $db,
		private SessionInterface  $session,
		private ConfigInterface   $config
	)
	{
	}

	public function attempt(string $username, string $password): bool
	{
		$user = $this->db->first($this->table(), [
			$this->username() => $username,
		]);

		if (!$user) {
			return false;
		}

		if (!password_verify($password, $user[$this->password()])) {
			return false;
		}

		$this->session->set($this->sessionField(), $user['id']);
		return true;
	}

	public function logout(): void
	{
		$this->session->delete($this->sessionField());
	}

	public function check(): bool
	{
		return $this->session->has($this->sessionField());
	}

	public function user(): ?array
	{
		if (!$this->check()) return null;

		$user = $this->db->first($this->table(), [
			'id' => $this->session->get($this->sessionField())
		]);

		return !$user ? null : $user;
	}

	public function table(): string
	{
		return $this->config->get('auth.table', 'users');
	}

	public function username(): string
	{
		return $this->config->get('auth.username', 'user_email');
	}

	public function password(): string
	{
		return $this->config->get('auth.password', 'user_password');
	}

	public function sessionField(): string
	{
		return 'user_id';
	}

}
