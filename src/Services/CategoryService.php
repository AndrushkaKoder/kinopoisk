<?php

namespace App\Services;

use App\Kernel\Database\interface\DatabaseInterface;
use App\Models\Category;

class CategoryService
{
	private DatabaseInterface $database;
	private CategoryService $service;

	protected array $fillable = [
		'id',
		'title',
		'created_at'
	];

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

	public function store(array $fields): void
	{
		$this->database->insert('categories', $fields);
	}

	public function update(int $id, array $fields)
	{
		$this->database->update('categories', $id, $fields);
	}

	private function getResponse(array $data): array
	{
		return array_map(function ($item) {
			return new Category($item['id'], $item['title'], $item['created_at']);
		}, $data);
	}

	public function delete(int $id): void
	{
		$this->database->delete('categories', [
			'id' => $id
		]);
	}

}
