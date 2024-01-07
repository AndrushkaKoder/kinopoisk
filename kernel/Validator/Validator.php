<?php

namespace App\Kernel\Validator;

use App\Kernel\Validator\interface\ValidatorInterface;

class Validator implements ValidatorInterface
{
	private array $errors;
	private array $data;


	public function validate(array $data, array $rules): bool
	{
		$this->errors = [];
		$this->data = $data;


		foreach ($rules as $key => $rule) {
			foreach ($rule as $ruleItem) {
				$rule = explode(':', $ruleItem);

				$ruleName = $rule[0];
				$ruleValue = $rule[1] ?? null;

				$error = $this->validateRule($key, $ruleName, $ruleValue);
				if ($error) $this->errors[$key][] = $error;
			}
		}
		return empty($this->errors);
	}

	public function validateRule(string $key, string $ruleName, $ruleValue = null): string|false
	{
		$value = $this->data[$key];

		switch ($ruleName) {
			case 'required':
				if (empty($value)) return "Поле $key обязательно для заполнения!";
				break;
			case 'min':
				if (strlen($value) < $ruleValue) return "Значение поля $key не может быть меньше, чем $ruleValue";
				break;
			case 'max':
				if (strlen($value) > $ruleValue) return "Значение поля $key не может быть больше, чем $ruleValue";
				break;
			case 'email':
				if (!filter_var($value, FILTER_VALIDATE_EMAIL)) return "Невалидный E-mail!";
				break;
			case 'confirmed':
				if($value !== $this->data[$key . '_confirmed']) return 'Пароли не совпадают!';
		}
		return false;
	}

	public function getErrors(): array
	{
		return $this->errors;
	}

	public function clearStr(string $string): string
	{
		$exc = [
			'insert',
			'INSERT',
			'select',
			'SELECT',
			'delete',
			'DELETE',
			'\\',
			'//',
			'script',
			'SCRIPT',
			'javaScript',
			'javascript'
		];
		return strip_tags(htmlspecialchars(str_replace($exc, '', $string)));
	}
}
