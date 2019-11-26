<?php if($login ): ?>    
	<form action="#" method="POST" enctype="multipart/form-data"  >

<?= $form->inputLogin('commentaire', 'Modifier votre commentaire'); ?>


<button class="btn btn-primary">Modifier</button>
</form>         
<?php else: ?>
		<?php header ('location: index.php'); ?>
<?php endif; ?>        
