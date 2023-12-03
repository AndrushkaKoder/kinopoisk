<?php $view->component('frontend.head') ?>

<h1>Регистрация нового пользователя</h1>
<form action="/register" method="post">

	<div>
		<label for="user_name">Имя</label>
		<input type="text" name="user_name" id="user_name" required>

		<?php if ($session->has('user_name')) { ?>
			<div class="errors">
				<ul>
					<?php foreach ($session->getFlash('user_name') as $error) { ?>
						<li><?=$error?></li>
					<?php } ?>
				</ul>
			</div>
		<?php }; ?>
	</div>

	<div>
		<label for="user_email">E-mail</label>
		<input type="email" name="user_email" id="user_email" required>

		<?php if ($session->has('user_email')) { ?>
			<div class="errors">
				<ul>
					<?php foreach ($session->getFlash('user_email') as $error) { ?>
						<li><?=$error?></li>
					<?php } ?>
				</ul>
			</div>
		<?php }; ?>
	</div>

	<div>
		<label for="user_password">Пароль</label>
		<input type="password" name="user_password" id="user_password" required>

		<?php if ($session->has('user_password')) { ?>
			<div class="errors">
				<ul>
					<?php foreach ($session->getFlash('user_password') as $error) { ?>
						<li><?=$error?></li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	</div>




	<button type="submit">Регистрация</button>
</form>

<?php $view->component('frontend.footer') ?>
