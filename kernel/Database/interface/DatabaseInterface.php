<?php

namespace App\Kernel\Database\interface;

interface DatabaseInterface
{
	public function connect();

	public function insert(string $table,  array $data): int|false;

	public function first(string $table, array $conditions): ?array;

	public function select(string $table, array $fields = [], array $conditions = []): bool|array;

	public function delete(string $table, array $conditions = []): void;

	public function update(string $table, int $id, array $conditions = []): void;
}
