<?php
ob_start();

       session_start();
?>
    <form action="index.php?action=inscription" method="post">
        <!-- Le formulaire sera traité par la page add_user.php -->

        <p><input type="text" placeholder="Entrez votre Login" name="pseudo" required></p>

        <p><input type="password" placeholder="Mot de Passe" name="pass" required></p>

        <p><input type="password" placeholder="Confirmer le Mot de passe" name="passwordconf" required></p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="mentions" id="flexCheckDefault" required>


            <p><button type="submit" class="btn btn-success" value="inscription">Inscription</button></p>
    </form>
    <?php
$titre = 'Inscription';
$titre_secondaire = 'Inscrivez vous';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
