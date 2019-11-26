<?php if($_SESSION['usersid'] == $_GET['id'] || isset($_SESSION['auth'])): ?>

    <form class="needs-validation" method="POST">
  <div class="form-row">

  <div class="col-md-12 mb-3">
       <?= $form->changePassword('password', 'Nouveau mot de passe', ['type' => 'password']); ?>
       <?= $form->changePassword('cpassword', 'Nouveau mot de passe', ['type' => 'password']); ?>

    </div>



  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  
</form>

<?php else: ?>

<?php header('location: index.php?p=users.posts.home'); ?> 

<?php endif; ?> 