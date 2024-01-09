<?php

namespace App\Services;

use App\Kernel\Database\interface\DatabaseInterface;
use App\Models\Category;

class CategoryService
{
	private DatabaseInterface $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function get(array $conditions = []): ?array
	{
		$response = $this->database->select('categories', $conditions);
		if($response) return $this->getResponse($response);

		return null;
	}

	public function all(): ?array
	{
		$response = $this->database->select('categories');
		if ($response) {
			return $this->getResponse($response);
		}
		return null;
	}

	public function first(array $conditions = []): ?Category
	{
		$response = $this->database->first('categories', $conditions);
		if ($response) return new Category($response['id'], $response['title'], $response['created_at']);
		return null;
	}

	private function getResponse(array $data): array
	{
		return array_map(function ($item) {
			return new Category($item['id'], $item['title'], $item['created_at']);
		}, $data);
	}

}
