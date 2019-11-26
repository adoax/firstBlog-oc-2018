 <?php if(isset($_SESSION['usersid']) && $_SESSION['usersid'] == $_GET['id'] || isset($_SESSION['auth'])): ?>
 <h2>Bienvenue sur l'édition de votre profil</h2>

<link rel="stylesheet" type="text/css" href="../public/style/connected.css">


<form class="needs-validation" method="POST">
  <div class="form-row">


    <div class="col-md-4 mb-3">
      <?= $form->inputLogin('username', 'Pseudo <a tabindex="0" class="fas fa-exclamation-triangle text-danger"  data-toggle="popover" data-trigger="focus"  data-content="Si vous modifiez votre pseudo, les commentaires que vous aurez posté restera le même Pseudo, mais vous pourez encore modifier vos commentaires"></a> '); ?>
      
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-12 mb-3">
    <?= $form->inputLogin('email', 'Email', ['type' => 'email']); ?>
    
    </div>

    <?php if(isset($_SESSION['users'])): ?>
      <div class="clo-md-12 mb-3">
      <p>Modifer votre<a href="?p=users.edit.changePass&id=<?= $_SESSION['usersid'] ?>"><strong> Mot de passe </strong></a> </p>
    </div>

   <?php else: ?>

    <div class="clo-md-12 mb-3">
      <p>Modifer votre<a href="?p=users.edit.changePass&id=<?= $_SESSION['authid'] ?>"><strong> Mot de passe </strong></a> </p>
  </div>
    
<?php endif; ?>

  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  
</form>
<?php else: ?>

<?php header('location: index.php?p=users.posts.home'); ?> 

<?php endif; ?> 
