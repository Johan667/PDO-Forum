<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/3f1f47ed70.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        theme: 'modern',
      plugins: 'image table link paste contextmenu textpattern autolink',
      insert_toolbar: 'quickimage quicktable',
      selection_toolbar: 'bold italic | quicklink h1 h2 h3 blockquote',
      inline: true,
      paste_data_images: true,
      automatic_uploads: true,
      init_instance_callback : function(ed) {
        // ed.setContent("<h1>Title</h1><p>Content...</p>");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
           if (xhttp.readyState == 4 && xhttp.status == 200) {
              ed.setContent(xhttp.responseText);
           }
        };
        xhttp.open("GET", "content.php", true);
        xhttp.send();
      },
      content_css: [
        '//www.tinymce.com/css/codepen.min.css'
      ]
      });
    </script>
  <title><?= $titre; ?></title> <!-- Affectera le juste titre de chaque ob_clean -->
</head>
<div class="container">
  <div class="wrapper">
    <header>

      <nav id="navbar-header">
        <div id="logo">
          <a href="index.php?action=login"><img src="public/img/forum.jpg" alt="forum"></a>
        </div>
        <ul>
          <li class="btnNav"><a href="index.php?action=vulogin">Accueil</a></li>
          <li class="btnNav"><a href="index.php?action=affichercategories">Categories</a></li>
          <li class="btnNav"><a href="index.php?action=affichermembres">Membres</a></li>

        </ul>

      </nav>

    </header>

    <body class="bg">


      <div class="titre2"><?= $titre_secondaire; ?></div>
      <main>
        <div class="contenu">
          <?= $contenu; ?>
          <!-- Recupere le contenu -->

        </div>

      </main>
  </div>
  </body>

</html>