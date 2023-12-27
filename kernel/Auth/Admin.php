<?php

namespace App\Kernel\Auth;

class Admin
{
	public function __construct(
		private int $id,
		private string $name,
		private string $email,
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

	public function name(): string
	{
		return $this->name;
	}

	public function password(): string
	{
		return $this->password;
	}
}
