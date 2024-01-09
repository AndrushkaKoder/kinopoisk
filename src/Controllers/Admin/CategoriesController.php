<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;
use App\Services\CategoryService;

class CategoriesController extends BaseController
{
	public function index()
	{
		$service = new CategoryService($this->db());

		$categories = $service->get();

		dd($categories);

		$this->view('admin.pages.categories.index');
	}

	public function add()
	{
		$this->view('admin.pages.categories.add');
	}

	public function create()
	{
		$category = $this->request()->input('title');

		if (!$category || $this->db()->first('categories', [
				'title' => $category
			])) {
			$this->session()->set('error', ['Ошибка добавления категории']);
			$this->redirect('/admin/categories/add');
		}

		$this->db()->insert('categories', [
			'title' => $category
		]);
		$this->redirect('/admin/categories');
	}

}
