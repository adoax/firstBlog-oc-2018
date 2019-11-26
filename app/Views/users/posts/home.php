<h1 class="text-center">Bienvenue <?php if(isset($_SESSION['users'])){
   echo strip_tags(html_entity_decode($_SESSION['users']));
} else {
    echo  strip_tags(html_entity_decode($_SESSION['auth']));
}
; ?> sur l'espace membre</h1>



<?php if(isset($_SESSION['users'])): ?>
<h2>Pour aller sur l'édition de votre profil cliquer sur ce lien <a href="?p=users.edit.edition&id=<?= $_SESSION['usersid']?>">Edition</a> </h2>
<?php else: ?>
<h2>Pour aller sur l'édition de votre profil cliquer sur ce lien <a href="?p=users.edit.edition&id=<?= $_SESSION['authid']?>">Edition</a> </h2>

<?php endif; ?>