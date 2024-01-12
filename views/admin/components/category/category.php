<?php
/**
 * @var \App\Models\Category $category
 */
?>

<li class="d-flex justify-content-between mb-3">
	<a href="/admin/categories/update?id=<?= $category->id() ?>"><?= $category->title() ?></a>
	<form action="/admin/categories/remove" method="post" class="delete_form">
		<input type="hidden" name="id" value="<?= $category->id() ?>">
		<button type="submit" class="btn btn-danger">Удалить</button>
	</form>
</li>
