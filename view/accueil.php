<?php

use Controller\ConnexionController;

ob_start();

       session_start();
       $_SESSION['token'] = bin2hex(random_bytes(24));
       $ControllerConnexion = new ConnexionController($connexion);
       $user = $ControllerConnexion->Login($pseudo);
       if (!isset($_SESSION)) {
           echo '<h3> Veuillez vous connecter<br>',
                'ou <a href="index.php?action=vuinscription">Inscrivez vous </a></h3>';
       } else {
           echo '<h3>Bienvenue !<br>'.ucwords($_SESSION['pseudo']).'</h3>';
           echo "<h2><a href='index.php?action=deconnexion'><i class='fa-solid fa-arrow-right-from-bracket'>&nbspDeconnexion </i></a></h2>";
       } ?>

<form action="index.php?action=login" method="post">
    <div class="form-group">
        <p><label for="pseudo">Pseudo</label><br>
            <input type="text" placeholder="pseudo" name="pseudo" required>

        </p>
        <!-- On met un input caché avec un token pour sécurisé la session et eviter une attaque CSRF -->
        <p><label for="pass">Mot de passe</label><br>
            <input type="password" placeholder="Mot de Passe" name="pass" required>
        </p>
    </div>
    <p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="cookie" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Se souvenir de moi
            </label><br>
        </div>
        <button type="submit" class="btn btn-success" value="connexion">Connexion</button>
    </p>
</form>
<?php var_dump($_SESSION); ?>
<?php

$titre = 'Acceuil';
$titre_secondaire = '';
$contenu = ob_get_clean(); // tout le code générer va la dedans
$path = 'template.php';
require $path;
