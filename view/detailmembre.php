<?php ob_start(); // On débute la mise en tampon?>

<h2> Detail du Membre </h2>
<?php $detail = $requete->fetch(); ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">Role</th>



            </tr>
        </thead>
        <tbody>
            <!-- Affiche le détail d'un membre -->

            <tr>
                <td><?= $detail['pseudo']; ?></td>

                <td><?= $detail['role']; ?>
                </td>

            
            </tr>
        </tbody>

    </table>




<?php
$titre = 'Membre';
$titre_secondaire = '';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
