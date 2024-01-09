<?php

namespace App\Kernel\Database;

use App\Kernel\Database\interface\DatabaseInterface;
use App\Kernel\config\Config;

class Database implements DatabaseInterface
{
	private \PDO $pdo;

	public function __construct(private Config $config)
	{
		$this->connect();
	}

	public function connect(): void
	{
		$port = $this->config->get('database.port');
		$host = $this->config->get('database.host');
		$charset = $this->config->get('database.charset');
		$dbName = $this->config->get('database.database');
		$dbUser = $this->config->get('database.user');
		$dbPassword = $this->config->get('database.password');

		try {
			$this->pdo = new \PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPassword);
		} catch (\PDOException $exception) {
			die('Ошибка подключения к Database! ' . $exception->getMessage());
		}
	}

	public function insert(string $table, array $data): int|false
	{
		$fields = array_keys($data);
		$columns = implode(', ', $fields);

		if (!$columns) return false;

		$bind = implode(', ', array_map(fn($item) => ":$item", array_values($fields)));

		$query = "INSERT INTO {$table} ($columns) VALUES ($bind)";

		$sql = $this->pdo->prepare($query);

		$sql->execute($data);

		return $this->pdo->lastInsertId();
	}


	public function first(string $table, array $conditions): ?array
	{
		$where = '';

		if (count($conditions)) {
			$where = "WHERE " . implode(' AND ', array_map(function ($item) {
					return "$item = :$item";
				}, array_keys($conditions)));
		}

		$query = "SELECT * FROM {$table} {$where} LIMIT 1";

		$statement = $this->pdo->prepare($query);
		$statement->execute($conditions);

		$first = $statement->fetch(\PDO::FETCH_ASSOC);

		return !$first ? null : $first;
	}


	public function select(string $table, array $fields = [], array $conditions = []): bool|array
	{
		$dbFields = '*';
		$where = '';

		if ($fields) $dbFields = implode(', ', $fields);

		if ($conditions) $where = "WHERE " . implode(' AND ', array_map(function ($item) {
					return "$item = :$item";
				}, array_keys($conditions)));

		$query = "SELECT {$dbFields} FROM {$table} {$where}";


		$statement = $this->pdo->prepare($query);
		$statement->execute($conditions);

		return $statement->fetchAll(\PDO::FETCH_ASSOC);
	}
}
