<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../image/favicon/favicon.ico">
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=nay07w745l1x3neervarlh0n23u03wtx8d7yow3tmn6jb8hj"></script>
  <script>
      tinymce.init({
        selector: '.mytextarea',
        plugins: 'paste',
        paste_auto_cleanup_on_paste : true,
        paste_remove_styles: true,
        paste_remove_styles_if_webkit: true,
        paste_strip_class_attributes: true,
        paste_as_text: true

      });

  </script>

  <link rel="stylesheet" type="text/css" href="../style/style.css">
	<title><?= App::getTitle(); ?></title>
    <meta name="description" content="<?= App::getMeta(); ?>" />
</head>
<?php //demande la permition d'utilisé les cookies ?>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#edeff5",
        "text": "#838391"
      },
      "button": {
        "background": "#4b81e8"
      }
    },
    "showLink": false,
    "theme": "classic",
    "position": "bottom-right"
  })});
</script>
<body>
  <header>
  	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Blog | Adoax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" data-children-count="1">


          <?php if ($login): ?>
            <?php  if(isset($_SESSION['auth'])): ?>
             <a class="navbar-brand" href="index.php?p=admin.dashboard.index">Admin</a>
             <a class="navbar-brand" href="index.php?p=users.posts.home">Profil</a>
              <?php else: ?>
                <a class="navbar-brand" href="index.php?p=users.posts.home">Profil</a>
              <?php endif; ?>
             <a class="navbar-brand" href="index.php?p=posts.logout">Déconnexion</a>
           <?php else: ?>
              <a class="navbar-brand" href="index.php?p=users.login.login">Connexion</a>
          <?php endif; ?>


          </form>
        </div>
      </nav>
  </header>
  <section role="main" class="container" >

  <div style="padding-top: 100px; padding-bottom: 100px">
    <?= $content; ?>
  </div>

</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>