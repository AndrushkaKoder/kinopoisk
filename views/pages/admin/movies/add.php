<?php $view->component('admin.head') ?>
<h1>Hello from create page</h1>


<?php if ($session->has('title')) { ?>
	<div class="errors">
		<ul>
			<?php foreach ($session->getFlash('title') as $error) { ?>
			<li style="color: red"><?=$error?></li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>

<form action="/admin/movies/create" method="post">
	<label for="title">Новый фильм</label>
	<input id="title" type="text" name="title" placeholder="Название фильма">
	<label for="email">Почта</label>
	<input id="email" type="email" name="email" placeholder="почта">
	<button type="submit">Добавить</button>
</form>

<?php $view->component('admin.footer') ?>
