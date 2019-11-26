<h1> <?= $categorie->titre ?></h1>


<div class="row">
	<div class="col-sm-11">
		<div class="container">
			<div class="card-deck mb-3 text-center"> 
				<?php foreach ($articles as $post): ?>
					<?php if($post->datetime <= $datePost): ?>
						<div class="card" style="width: 18rem;">
							<img class="card-img-top" src="image/<?= strip_tags($post->file) ?>" alt="<?= "$post->textAlt" ?>">
								<div class="card-body">
									<h5 class="card-title"><?= $post->titre; ?></h5>
									<p class="card-text"><em><?= $post->categorie; ?></em></em></p>
									<p class="card-text"><?= $post->extrait; ?></p>
									<a href="<?= $post->url ?>" class="btn btn-primary">Lire la suite..</a>
								</div>
							</div>
							<?php endif ?>	
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		
	<div class="col-sm-1">
			<ul>
				<?php foreach ($categories as $categorie): ?>
				<li><a href="<?= $categorie->url; ?>"><?=strip_tags($categorie->titre); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

		



