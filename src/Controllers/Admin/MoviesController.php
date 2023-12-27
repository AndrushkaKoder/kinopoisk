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
		$cover = $this->request()->file('cover');
		$saved = $cover->save('covers');

		dd($this->storage()->url($saved));

		$validate = $this->request()->validate([
			'title' => ['required', 'min:3'],
		]);

		if (!$validate) {
			foreach ($this->request()->errors() as $field => $errors) {
				$this->session()->set($field, $errors);
			}


			$this->redirect('/admin/movies/create');
		}

		$sql = $this->db()->insert('movies', [
			'title' => $this->request()->input('title'),
			'text' => $this->request()->input('title'),
		]);


	}
}
