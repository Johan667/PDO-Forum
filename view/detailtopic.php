<?php ob_start(); // On débute la mise en tampon?>

<h2> Detail du Topic </h2>
<?php $detail = $requete->fetch(); ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Date</th>
                <th scope="col">Ouvert par</th>



            </tr>
        </thead>
        <tbody>
            <!-- Affiche le détail d'un topic -->

            <tr>
                <td><?= $detail['titre']; ?></td>

                <td><?= $detail['creation']; ?>
                </td>
                <td><?= $detail['pseudo']; ?>
                </td>

            
            </tr>
        </tbody>

    </table>

    <h2>Posts</h2>
    <table class="table table-dark">
        <thead>
        <?php   foreach ($requete_post->fetchAll() as $post) { ?>
            <tr>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col">Crée Par</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <!-- Affiche les posts d'un topic -->

            <td><?= $post['message']; ?></td>
            <td><?= $post['creation']; ?></td>
            <td><?= $post['pseudo']; ?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    <?php if ($detail['verouille'] == 1) {?>
    <h2>Répondre</h2>
        <form action="index.php?action=ajoutermessage" method="post">
        <input type="hidden" value="<?=$detail['id_topic']; ?>" name="id_topic">
        <input type="hidden" value="<?php echo date('Y-m-d H:m:s'); ?>" name="createdAt">
        <label for="utilisateur">Choisissez un utilisateur</label>
    <select class="form-control" id="utilisateur" name="id_utilisateur">
    <?php
            foreach ($requete_utilisateur as $utilisateur) {
                echo "<option value='".$utilisateur['id_membre']."'>".$utilisateur['pseudo'].'</option>';
            }
            ?>
    </select><br>
    <textarea id="mytextarea" name="message">Ajouter votre message</textarea><br>
    <button type="submit" value="soumettre" class="btn btn-success">Envoyer le message</button>

        </form>
<?php } ?>
  

<?php
$titre = 'Detail Topic';
$titre_secondaire = '';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
