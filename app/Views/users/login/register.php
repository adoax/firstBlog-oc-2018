<link rel="stylesheet" type="text/css" href="../style/connected.css">

<?php //Indique L'erreur ?>
  <?php if($errors): ?>
    <div class="alert alert-danger text-center">
            Identifiant ou Mot de passe, incorrect
          </div>
  <?php endif; ?>
  <?php if($errorss): ?>
    <div class="alert alert-danger text-center">
        Les mots de passe ne correspondent pas.
          </div>
  <?php endif; ?>
  <?php if($errorPseudo): ?>
    <div class="alert alert-danger text-center">
        Pseudo déjà existant
          </div>
  <?php endif; ?>
  <?php if($errorEmail): ?>
    <div class="alert alert-danger text-center">
          Email  déjà existant
          </div>
  <?php endif; ?>

  <?php if($succes): ?>
    <div class="alert alert-success text-center">
          Votre compte a bien étais créer, vous pouvez vous  <a href="index.php?p=users.login.login">connecter si vous le souhaitez </a>
          </div>
  <?php endif; ?>

<?php // Indiquation des erreurs fini ?>
<?php if(!$succes): ?>
<h3 class="mb-3 font-weight-normal text-center">S'enregistrer</h3>
<form class="needs-validation" method="POST">
  <div class="form-row">


    <div class="col-md-4 mb-3">
      <?= $form->inputLogin('username', 'Pseudo'); ?>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-12 mb-3">
    <?= $form->inputLogin('email', 'Email', ['type' => 'email']); ?>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>

    <div class="col-md-6 mb-3">
       <?= $form->changePassword('password', 'Mot de passe', ['type' => 'password']); ?>

    </div>
    <div class="col-md-6 mb-3">
        <?= $form->changePassword('cpassword', 'Répéter le mot de passe', ['type' => 'password']); ?>

    </div>
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1" >J'accepte les <a href="index.php?p=posts.CGU">Conditions générales d'utilisation</a></label>
  </div>
  </div>
  <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

<?php endif; ?>