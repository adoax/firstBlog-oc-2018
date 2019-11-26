<?php if($login): ?>   
<div class="mt-5 ">
<?php if( $Comment->moderation != 1): ?>
    <p class="text-center"> Vouliez-vous vraiment signaler ce commentaire. "<?= $Comment->commentaire ?>" de "<?= $Comment->auteur ?>""
    <form action="#" method="POST" enctype="multipart/form-data "  >
        <?= $form->ReportComment('moderation', ''); ?>
            <div class="row justify-content-between">
                <button class="btn btn-primary col-4">Oui</button> 
    </form>
        <a href="index.php?p=posts.show&id=<?= $Comment->id_billet; ?>" class="btn btn-danger col-4">Non</a>
            </div>
    <?php else: ?>
        <p  class="text-center align-middle"> Merci d'avoir signalé ce commentaire, vous pouvez retourner sur l'article</p>
        <div class="row justify-content-md-center">
        <a href="index.php?p=posts.show&id=<?= $Comment->id_billet; ?>" class="btn btn-danger col-4 mt-5">Retour</a>
        </div>
<?php endif; ?>
</div>


<?php else: ?>
		<?php header ('location: index.php'); ?>
<?php endif; ?>        
