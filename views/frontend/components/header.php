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
					<div class="logo">
						<a href="/">
							<img src="/assets/icons/logo2.png" alt="<?= SITE_NAME ?>">
						</a>
					</div>
				</div>
				<div class="col-md-4 d-flex justify-content-center align-items-center">
					<ul class="nav_list">
						<li><a href="/">Главная</a></li>
						<li><a href="/movies">Фильмы</a></li>
						<li><a href="/info">Информация</a></li>
					</ul>
				</div>
				<div class="col-md-4 d-flex justify-content-end align-items-center">
					<?php if ($auth->check()): ?>
						<a href="/lk" class="btn btn-success">Личный кабинет</a>
					<?php else: ?>
						<a href="/login" class="btn btn-dark">Вход/Регистрация</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
<main>
