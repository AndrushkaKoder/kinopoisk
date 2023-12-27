<?php

namespace App\Kernel\Http\interface;

use App\Kernel\File\interface\FileInterface;
use App\Kernel\Validator\Validator;

interface RequestInterface
{
	public static function createFromGlobals(): self;

	public function uri(): string;

	public function method(): string;

	public function input($value);

	public function setValidator(Validator $validator): void;

	public function validate(array $rules): bool;

	public function errors(): array;

	public function file(string $key): ?FileInterface;

	public function all(): array;
}
