<?php if($errors): ?>
	<div class="alert alert-danger text-center">
					Identifiant ou Mot de passe, incorrect
				</div>
 <?php endif; ?>

 
 <link rel="stylesheet" type="text/css" href="../style/connected.css">



<form class="form-signin" method="post">
  <h3 class="mb-3 font-weight-normal text-center">Se connecter</h3>
		<?= $form->inputLogin('username', 'Pseudo'); ?>
		<?= $form->changePassword('password', 'Mot de passe', ['type' => 'password']); ?>
  <p> <button class="btn btn-lg btn-primary" type="submit">Connexion</button> 	<a href="?p=users.login.register" class="btn btn-lg btn-success">S'enregistrer</a> </p>
</form>




  
