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
			<h1>Аутентификация пользователя</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="/login" method="post" class="form_login">
				<div class="form-floating mb-3">
					<input type="email" name="user_email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
					<label for="floatingInput">Email</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" name="user_password" class="form-control" id="floatingPassword" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
				</div>
				<button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
			</form>
		</div>

		<div class="col-12 d-flex justify-content-center flex-column align-items-center mt-5">
			<div><p>Нет аккаунта?</p></div>
			<div><a href="/register"><u>Зарегистрируйтесь!</u></a></div>
		</div>
	</div>

</div>


<?php $view->component('frontend.footer') ?>
