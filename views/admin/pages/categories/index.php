<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Category> $categories
 */
?>

<?php $view->component('admin.components.head') ?>

<section class="content">
	<h2>Список категорий</h2>
	<div class="container">
		<?php if ($categories): ?>
			<div class="row">
				<div class="col-12">
					<ul>
						<?php foreach ($categories as $category): ?>
							<?php
							$view->component(
								'admin.components.category.category',
								['category' => $category]
							);
							?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php else: ?>
			<div class="row">
				<div class="col-12 text-center">
					<h3>Категорий нет</h3>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-12 text-end">
				<a href="/admin/categories/add" class="btn btn-dark">Добавить категорию</a>
			</div>
		</div>
	</div>

</section>

<?php $view->component('admin.components.footer') ?>
