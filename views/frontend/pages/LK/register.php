<?php
/**
 * @var \App\Kernel\Session\interface\SessionInterface $session
 * @var \App\Kernel\View\ViewInterface $view
 */
?>
<?php $view->start(); ?>

<div class="container">
	<?php if ($session->has('error')): ?>
		<div class="alert alert-danger errors" role="alert">
			<ul>
				<?php foreach ($session->getFlash('error') as $error): ?>
					<li><?= $error ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-12 text-center mb-5">
			<h1>Регистрация нового пользователя</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="/register" method="post" class="form_login">
				<div class="form-floating mb-3">
					<input type="text"
					       name="user_name"
					       class="form-control <?php if ($session->has('user_name')): ?> is-invalid <?php endif; ?>"
					       id="floatingInputName"
					       required
					>
					<?php if ($session->has('user_name')) : ?>
						<div id="user_name" class="invalid-feedback">
							<?= $session->getFlash('user_name')[0] ?>
						</div>
					<?php endif; ?>
					<label for="floatingInputName">Имя</label>
				</div>
				<div class="form-floating mb-3">
					<input type="email"
					       name="user_email"
					       class="form-control <?php if ($session->has('user_email')): ?> is-invalid <?php endif; ?>"
					       id="floatingInput"
					       required
					>
					<?php if ($session->has('user_email')) : ?>
						<div id="user_email" class="invalid-feedback">
							<?= $session->getFlash('user_email')[0] ?>
						</div>
					<?php endif; ?>
					<label for="floatingInput">Email</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password"
					       name="user_password"
					       class="form-control <?php if ($session->has('user_password')): ?> is-invalid <?php endif; ?>"
					       id="floatingPassword"
					       required
					>
					<?php if ($session->has('user_password')) : ?>
						<div id="user_password" class="invalid-feedback">
							<?= $session->getFlash('user_password')[0] ?>
						</div>
					<?php endif; ?>
					<label for="floatingPassword">Пароль</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password"
					       name="user_password_confirmed"
					       class="form-control <?php if ($session->has('user_password_confirmed')): ?> is-invalid <?php endif; ?>"
					       id="floatingPassword"
					       required
					>
					<?php if ($session->has('user_password_confirmed')) : ?>
						<div id="user_password_confirmed" class="invalid-feedback">
							<?= $session->getFlash('user_password_confirmed')[0] ?>
						</div>
					<?php endif; ?>
					<label for="floatingPassword">Повторите пароль</label>
				</div>
				<div class="form-floating mb-3 d-flex justify-content-center">
					<input class="form-check-input" name="private_data" type="checkbox" value="1" id="flexCheckChecked"
					       checked>
					<p class="mx-3">Даю согласие на обработку персональных данных</p>
				</div>
				<button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
			</form>
		</div>

		<div class="col-12 d-flex justify-content-center flex-column align-items-center mt-5">
			<p>Нажимая кнопку "Зарегистрироваться", Вы соглашаетесь с
				<a href="/info" class="text-primary">Уловиями пользования</a>
			</p>
		</div>
	</div>
</div>

<?php $view->end(); ?>
