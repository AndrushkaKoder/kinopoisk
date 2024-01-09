<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
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
		<h2>Добавить категорию</h2>
		<div class="row">
			<div class="col-12">
				<form action="/admin/categories/create" method="post">
					<label for="title" class="form-label">Название категории</label>
					<input type="text" name="title" id="title" class="form-control">
					<button type="submit" class="btn btn-default mt-3">Добавить</button>
				</form>
			</div>
		</div>
	</div>
</section>
<?php $view->component('admin.components.footer') ?>
