<?php

namespace App\Kernel\Auth;

class User
{
	public function __construct(
		private int    $id,
		private string $email,
		private string $username,
		private string $password
	)
	{
	}

	public function id(): int
	{
		return $this->id;
	}

	public function email(): string
	{
		return $this->email;
	}

	public function username(): string
	{
		return $this->username;
	}

	public function password(): string
	{
		return $this->password;
	}
}
