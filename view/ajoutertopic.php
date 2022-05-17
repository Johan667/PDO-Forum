<?php ob_start(); // On débute la mise en tampon?>

<form action="index.php?action=ajoutertopic" method="post">
<input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="createdAt">
<input type="hidden" value="1" name="verouille">
  <div class="form-group">
    <label for="titre">Titre du Topic</label>
    <input type="text" class="form-control" id="titre" name="titre" required>
  </div>
  <div class="form-group">
    <label for="membre">Utilisateur</label>

    <select class="form-control" id="membre" name="id_membre">
    <?php
            foreach ($requete_membre->fetchAll() as $membre) {
                echo "<option value='".$membre['id_membre']."'>".$membre['pseudo'].'</option>';
            }
            ?>
    </select>
  </div>
  <div class="form-group">
    <label for="categorie">Categorie</label>
    <select class="form-control" id="categorie" name="id_categorie">
    <?php
            foreach ($requete_categorie->fetchAll() as $categorie) {
                echo "<option value='".$categorie['id_categorie']."'>".$categorie['nomCategorie'].'</option>';
            }
            ?>
    </select>
  </div>
  <button type="submit" value="soumettre" class="btn btn-success">Ajouter le Topic</button>


</form>


<?php
$titre = 'Topics';
$titre_secondaire = 'Touts les topics';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
