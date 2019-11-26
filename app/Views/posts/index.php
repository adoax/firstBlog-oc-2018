<div class="row">
	<div class="col-sm-11">
		<div class="container"> 	
			<div class="card-deck mb-3 text-center"> 
				<?php foreach ($posts as $post):  ?>
				<?php if($post->datetime <= $datePost): ?>
					<div class="card mb-4 box-shadow" >
					  <img class="card-img-top" src="image/<?= $post->file; ?>" alt="<?= "$post->textAlt" ?>">
					  <div class="card-body">
					    <h5 class="card-title"><?= strip_tags($post->titre); ?></h5>
					    <p class="card-text"><em><?= strip_tags($post->categories); ?></em></p>
					    <p class="card-text"><?= strip_tags($post->extrait); ?></p>
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
