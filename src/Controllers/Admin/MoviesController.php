<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller\BaseController;

class MoviesController extends BaseController
{
	public function add(): void
	{
		$this->view('admin.movies.add');

	}

	public function create(): void
	{
		$validate = $this->request()->validate([
			'title' => ['required', 'min:3'],
			'email' => ['required', 'email']
		]);

		if (!$validate) {
			foreach ($this->request()->errors() as $field => $errors) {
				$this->session()->set($field, $errors);
			}

			$this->redirect('/admin/movies/create');
		}

	}
}
