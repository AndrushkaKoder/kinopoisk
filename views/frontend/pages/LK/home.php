<?php
/**
 * @var \App\Kernel\Auth\interface\AuthInterface $auth
 * @var \App\Kernel\View\ViewInterface $view
 * */

$user = $auth->user();
?>

<?php $view->start(); ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Личный кабинет пользователя:  <?= $user->username()?></h1>
		</div>
		<div class="col-12">
			<form action="/logout" method="post">
				<input type="hidden" name="user_id" value="<?= $user->id() ?>">
				<button type="submit" class="btn btn-danger">Выйти</button>
			</form>
		</div>
	</div>
</div>
<?php $view->end(); ?>
