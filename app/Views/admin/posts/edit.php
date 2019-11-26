
<form action="#" method="POST" enctype="multipart/form-data"  >
	<?= $form->input('titre', 'Titre de L\'article'); ?>
	<?= $form->input('contenu', 'Contenu'); ?>
	<?= $form->select('category_id', 'Categorie', $categories); ?>
	<?= $form->changedates('datetime', 'Date de mise en ligne', $article->datetimes); ?>
    <div class="row">
        <div class="col"><?= $form->uploadImage('file', 'L\'image de l\'article'); ?> </div>
        <div class="col"><?= $form->addComment('textAlt', 'Texte alternative de l\'image'); ?></div>
    </div>

	<button class="btn btn-primary">Sauvegarder</button> 
</form>

<?= $post->file ?>