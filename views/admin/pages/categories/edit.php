<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Category $category
 */
?>

<?php $view->component('admin.components.head') ?>
<section class="content">

	<?php if ($session->has('error')): ?>
		<div class="alert alert-danger errors" role="alert">
			<ul>
				<?php foreach ($session->getFlash('error') as $error): ?>
					<li><?= $error ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>


	<div class="container">
		<h2>Изменить категорию <?= $category->title() ?></h2>
		<div class="row">
			<div class="col-12">
				<form action="/admin/categories/update" method="post">
					<input type="hidden" name="id" value="<?= $category->id() ?>">
					<label for="title" class="form-label">Название категории</label>
					<input type="text" name="title" id="title" class="form-control" value="<?= $category->title() ?>">
					<button type="submit" class="btn btn-default mt-3">Сохранить</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="/admin/categories" class="btn btn-success">Назад</a>
			</div>
		</div>
	</div>
</section>
<?php $view->component('admin.components.footer') ?>
