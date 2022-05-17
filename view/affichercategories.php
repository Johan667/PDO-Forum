<?php ob_start(); // On débute la mise en tampon?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Categories</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($requete as $categorie) {?>
    <tr>
    <td><a href="index.php?action=affichertopics&id=<?=$categorie['id_categorie']; ?>"><?= $categorie['nomCategorie']; ?></a></td>

    </tr>
<?php }?>

  </tbody>
</table>



<?php
$titre = 'Catégories';
$titre_secondaire = 'Toutes les catégories';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
