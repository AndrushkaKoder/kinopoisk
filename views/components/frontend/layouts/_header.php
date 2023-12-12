<?php
/**
 * @var \App\Kernel\Auth\interface\AuthInterface $auth
 */
$user = $auth->user()
?>
<header>
	<div class="header_top mt-3 p-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="/">LOGO</a>
				</div>
				<div class="col-md-4">
					<ul class="d-flex justify-content-between header_nav">
						<li><a href="/">Главная</a></li>
						<li><a href="/movies">Фильмы</a></li>
						<li><a href="/info">Информация</a></li>
					</ul>
				</div>
				<div class="col-md-4 d-flex justify-content-end align-items-center">
					<?php if ($auth->check()): ?>
						<span><?= $user->email() ?></span>
						<form action="/logout" method="post">
							<input type="hidden" name="user_id" value="<?= $user->id() ?>">
							<button class="btn btn-success">Выход</button>
						</form>
					<?php else: ?>
						<a href="/login" class="btn btn-dark">Вход/Регистрация</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
