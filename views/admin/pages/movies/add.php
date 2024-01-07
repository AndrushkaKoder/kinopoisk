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


<form action="/admin/movies/create" method="post" enctype="multipart/form-data">
	<label for="title">Новый фильм</label>
	<input id="title" type="text" name="title" placeholder="Название фильма">
	<label for="cover">Обложка фильма</label>
	<input type="file" name="cover" id="cover">
	<button type="submit">Добавить</button>
</form>

<?php $view->component('admin.footer') ?>
