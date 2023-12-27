<?php $view->component('frontend.head') ?>


<div class="container">
	<?php if ($session->has('error')) { ?>
		<div class="alert alert-danger errors" role="alert">
			<ul>
				<?php foreach ($session->getFlash('error') as $error) { ?>
					<li><?= $error ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	<div class="row">
		<div class="col-12 text-center mb-5">
			<h1>Регистрация нового пользователя</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="/register" method="post" class="form_login">
				<div class="form-floating mb-3">
					<input type="text" name="user_name" class="form-control" id="floatingInputName" required>
					<label for="floatingInputName">Имя</label>
				</div>
				<div class="form-floating mb-3">
					<input type="email" name="user_email" class="form-control" id="floatingInput" required>
					<label for="floatingInput">Email</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" name="user_password" class="form-control" id="floatingPassword" required>
					<label for="floatingPassword">Пароль</label>
				</div>
				<button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
			</form>
		</div>

		<div class="col-12 d-flex justify-content-center flex-column align-items-center mt-5">
			<p>Нажимая кнопку "Зарегистрироваться", Вы соглашаетесь с уловиями пользования</p>
		</div>
	</div>

</div>


<?php $view->component('frontend.footer') ?>
