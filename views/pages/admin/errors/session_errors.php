<?php if ($session->has('user_password')) { ?>
	<div class="errors">
		<ul>
			<?php foreach ($session->getFlash('title') as $error) { ?>
				<li><?=$error?></li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
