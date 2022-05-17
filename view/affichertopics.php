<?php ob_start(); // On débute la mise en tampon?>
<a href="index.php?action=vuAddTopic"><button type="button" class="btn btn-success" >Ajouter un topic</button></a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Crée</th>
      <th scope="col">Statut</th>
      <th scope="col">Crée par</th>

    </tr>
  </thead>
  <tbody>

<?php foreach ($requete as $topic) {?>
    <tr>
    <td><a href="index.php?action=detailtopic&id=<?=$topic['id_topic']; ?>"><?= $topic['titre']; ?></a></td>
    <td><?= $topic['creation']; ?></a></td>
   <?php if ($topic['verouille'] == 1) {
    echo '<td> <i class="fa-regular fa-circle-check"></i></td>';
} else {
    echo '<td> <i class="fa-solid fa-lock"></i></td>';
}?> 
<td><?= $topic['pseudo']; ?></a></td>
</tr> 
   
<?php }?>


  </tbody>
</table>



<?php
$titre = 'Topics';
$titre_secondaire = 'Touts les topics';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
