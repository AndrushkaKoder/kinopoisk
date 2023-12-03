<?php $view->component('frontend.head') ?>

<h1>Аутентификация пользователя</h1>

<?php if ($session->has('error')) { ?>
	<div class="errors">
		<ul>
			<?php foreach ($session->getFlash('error') as $error) { ?>
				<li><?=$error?></li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>

<form action="/login" method="post">

	<div>
		<label for="user_email">E-mail</label>
		<input type="email" name="user_email" id="user_email" required>
	</div>

	<div>
		<label for="user_password">Пароль</label>
		<input type="password" name="user_password" id="user_password" required>
	</div>

	<button type="submit">Войти</button>
</form>

<p>Нет аккаунта?</p>
<a href="/register">Зарегистрируйтесь!</a>

<?php $view->component('frontend.footer') ?>

