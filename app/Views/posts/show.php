<?= App::setTitle(strip_tags($article->titre)); ?>
<?= App::setMeta( 'Extrait du livres ' . strip_tags($article->titre) . ': ' . strip_tags($article->extrait) ) ?>

<div class="text-center">
	<h1><?= $article->titre; ?></h1>
	<p class="text-left"><em><?= strip_tags($article->categories); ?></em></p>
	<p class="text-left" ><em><?= $timeset->datetimes; ?></em></p>
	<p ><?= nl2br($article->contenu, false); ?></p>

</div>
<br/>
<br/>


<?php if ($login): ?>
	<form action="#" method="POST" enctype="multipart/form-data"  >

		<?= $form->addComment('commentaire', 'Ajouter un commentaire'); ?>

	<button class="btn btn-primary">Envoyer</button> 
</form>

<?php else: ?>
<p> Vous devez être connecté pour pouvoir ajouter un commentaire. </p>

<?php endif; ?>


<br/>
<div class="row">
<?php foreach ($comments as $commentaires): ?>
	<div class="col-md-10">	
		<form action="?p=posts.delete" method="post" style="display: inline;">						
			<p class="text-left" ><strong> Posté par: <?= strip_tags(html_entity_decode($commentaires->auteur)); ?></strong> Le <?= strip_tags(html_entity_decode($commentaires->date_commentaire_fr)); ?>
			<br/><em><?=  strip_tags(html_entity_decode($commentaires->commentaire)); ?> </em></p>
			<hr>
	</div>
	<div class="col-md-2">
		<?php if ($login && isset($_SESSION['usersid']) && $_SESSION['usersid'] ==  $commentaires->id_user || isset($_SESSION['auth'])): ?>
			<a href="index.php?p=posts.editComment&id=<?= $commentaires->id; ?>" class="fas fa-pencil-alt pl-1"></a> 
				<input type="hidden" name="id" value=" <?= $commentaires->id; ?>">
				<button type="submit" class="far fa-trash-alt pr-1" onclick="clicked(event)"></button>
		</form>	
			<?php elseif($login && $commentaires->id_user != 1 && $commentaires->moderation == NULL):?>
				<a href="index.php?p=posts.signalement&id=<?= $commentaires->id; ?>" class="fas fa-exclamation-circle "></a>
      
      <?php elseif($login && $commentaires->id_user != 1 && $commentaires->moderation == 2 ): ?>
			<span class="d-inline-block" data-toggle="popover" data-content="Ce commentaire à deja étais controller par l'administrateur">
			<a tabindex="0" class="fas fa-exclamation-circle text-success" role="button" data-toggle="popover" data-trigger="focus" style="pointer-events: none;"></a>
</span>
      
			<?php elseif($login && $commentaires->id_user != 1): ?>
			<span class="d-inline-block" data-toggle="popover" data-content="Ce commentaire a déjà étais signalé.">
			<a tabindex="0" class="fas fa-exclamation-circle text-warning" role="button" data-toggle="popover" data-trigger="focus" style="pointer-events: none;"></a>
</span>	
      
				
		<?php endif; ?>
			
	</div>

<?php endforeach; ?>
</div>