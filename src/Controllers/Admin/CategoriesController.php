<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;
use App\Services\CategoryService;

class CategoriesController extends BaseController
{
	private CategoryService $service;

	public function index(): void
	{
		$categories = $this->service()->all();
		$this->view('admin.pages.categories.index', ['categories' => $categories]);
	}

	public function add(): void
	{
		$this->view('admin.pages.categories.add');
	}

	public function create(): void
	{
		$category = $this->request()->input('title');

		if (!$category || $this->service()->first([
				'title' => $category
			])) {
			$this->session()->set('error', ['Ошибка добавления категории']);
			$this->redirect('/admin/categories/add');
		}

		$this->service()->store(['title' => $category]);
		$this->redirect('/admin/categories');
	}

	public function edit(): void
	{
		$category = $this->service()->first(['id' => $this->request()->input('id')]);
		$this->view('admin.pages.categories.edit', ['category' => $category]);
	}

	public function update()
	{
		$categoryId = $this->request()->input('id');

		$this->service()->update($categoryId, [
			'title' => $this->request()->input('title')
		]);

		$this->redirect("/admin/categories/update?id={$categoryId}");
	}

	public function remove(): void
	{
		$id = $this->request()->input('id');
		$this->service()->delete($id);
	}


	private function service(): CategoryService
	{
		if (!isset($this->service)) {
			$this->service = new CategoryService($this->db());
		}

		return $this->service;

	}

}
