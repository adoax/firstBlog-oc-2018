<div class="mt-5 ">
<?php if( $Comment->moderation == 1): ?>
    <p class="text-center">Vouliez-vous vraiment approuver ce commentaire "<?= $Comment->commentaire ?>" de "<?= $Comment->auteur ?>""
    <form action="#" method="POST" enctype="multipart/form-data "  >
        <?= $form->ReportComment('moderation', ''); ?>
            <div class="row justify-content-between">
                <button class="btn btn-primary col-4">Oui</button> 
    </form>
        <a href="index.php?p=admin.posts.listComment" class="btn btn-danger col-4">Non</a>
            </div>
    <?php else: ?>
        <p  class="text-center align-middle">Commentaire bien approuvé, vous pouvez continuer</p>
        <div class="row justify-content-md-center">
        <a href="index.php?p=admin.posts.listComment" class="btn btn-danger col-4 mt-5">Retour</a>
        </div>
<?php endif; ?>
</div>