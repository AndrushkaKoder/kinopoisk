<?php if ($session->has('error')): ?>
	<div class="alert alert-danger errors" role="alert">
		<ul>
			<?php foreach ($session->getFlash('error') as $error): ?>
				<li><?= $error ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
