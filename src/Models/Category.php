<?php

namespace App\Models;

class Category
{
	public function __construct(
		private int $id,
		private string $title,
		private string $createdAt
	)
	{
	}

	public function id(): int
	{
		return $this->id;
	}

	public function title(): string
	{
		return $this->title;
	}

	public function createdAt(): string
	{
		return $this->createdAt;
	}

}
