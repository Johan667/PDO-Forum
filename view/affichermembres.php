<?php ob_start(); // On débute la mise en tampon?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Membres</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($requete as $membre) {?>
    <tr>
    <td><a href="index.php?action=detailmembre&id=<?=$membre['id_membre']; ?>"><?= $membre['pseudo']; ?></a></td>

    </tr>
<?php }?>

  </tbody>
</table>



<?php
$titre = 'Membres';
$titre_secondaire = 'Touts les membres';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
