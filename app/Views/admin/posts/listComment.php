<h1 class="text-center mb-4">Liste des commentaires signalés</h1>


<div class="row">
	<?php foreach ($posts as $post): ?>
		<?php if($post->moderation == 1): ?>
		<div class="col-md-8">	
			<form action="?p=posts.delete" method="post" style="display: inline;">		
			<p class="text-left"  > <u>Titre de l'article:</u>	<em class="font-weight-bold text-uppercase"><?= strip_tags($post->titres) ?></em> 			
				<p>Posté le: <?= strip_tags(html_entity_decode($post->date_commentaire)) ?></p>
				<p class="text-left" ><strong><?= strip_tags(html_entity_decode($post->auteur)) ?> :</strong> 
				<em><?=  strip_tags(html_entity_decode($post->commentaire)) ?> </em></p>
				<hr>
			</div>

				<div class="col-md-2">
					
						<input type="hidden" name="id" value=" <?= $post->id ?>">
						<button type="submit" class="btn btn-danger alert" onclick="clicked(event)">Supprimer</button>
				</div>
			</form>	
		
			<div class="col-md-1">		
						<a  href="index.php?p=admin.posts.confirmComment&id=<?= $post->id ?>"  class="btn btn-success alert ">Confirmer</a>			
				</div>

	
<?php endif; ?>

	<?php endforeach; ?>
</div>