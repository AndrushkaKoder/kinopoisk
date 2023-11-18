<?php

namespace App\Kernel\Http;

use App\Kernel\Validator\Validator;

class Request
{

	private Validator $validator;

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
		return preg_replace('/\?+.*/', '', $this->server['REQUEST_URI']);
	}

	public function method(): string
	{
		return $this->server['REQUEST_METHOD'];
	}

	public function input($value): ?string
	{
		return $this->post[$value] ?? $this->get[$value] ?? null;
	}

	public function setValidator(Validator $validator): void
	{
		$this->validator = $validator;
	}

	public function validate(array $rules): bool
	{
		$data = [];

		foreach ($rules as $field => $rule) {
			$data[$field] = $this->input($field);
		}

		return $this->validator->validate($data, $rules);
	}

	public function errors(): array
	{
		return $this->validator->getErrors();
	}

}
