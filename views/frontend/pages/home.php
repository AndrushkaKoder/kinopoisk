<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

<?php $view->start(); ?>
	<section class="py-5 text-center container">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto">
				<h1 class="fw-light">Фильмы на любой вкус</h1>
				<p class="lead text-body-secondary">
					Фильмотека для вечерних посиделок с друзьями
				</p>
				<p>
					<a href="/movies" class="btn btn-primary my-2">К списку фильмов</a>
				</p>
			</div>
		</div>
	</section>

	<div class="album py-5 bg-body-tertiary">
		<div class="container">

			<div class="row mb-5">
				<div class="col-12 text-center">
					<h3>Популярные фильмы</h3>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

				<div class="col">
					<div class="card shadow-sm">
						<svg class="bd-placeholder-img card-img-top" width="100%" height="225"
						     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
						     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
							<rect width="100%" height="100%" fill="#55595c"/>
							<text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
						</svg>
						<div class="card-body">
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
								additional content. This content is a little bit longer.</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a href="/film" class="btn btn-sm btn-outline-secondary">View</a>
								</div>
								<small class="text-body-secondary">9 mins</small>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<?php $view->end(); ?>
