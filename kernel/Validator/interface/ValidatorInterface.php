<?php

namespace App\Kernel\Validator\interface;

interface ValidatorInterface
{
	public function validate(array $data, array $rules): bool;

	public function validateRule(string $key, string $ruleName, $ruleValue = null): string|false;

	public function getErrors(): array;


}
