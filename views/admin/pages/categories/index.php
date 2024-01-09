<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

<?php $view->component('admin.components.head') ?>

	<section class="content">
		<h2>Список категорий</h2>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul>
						<li><a href="#">Категория 1</a></li>
						<li><a href="#">Категория 2</a></li>
						<li><a href="#">Категория 3</a></li>
						<li><a href="#">Категория 4</a></li>
						<li><a href="#">Категория 5</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-end">
					<a href="/admin/categories/add" class="btn btn-dark">Добавить категорию</a>
				</div>
			</div>
		</div>

	</section>

<?php $view->component('admin.components.footer') ?>
