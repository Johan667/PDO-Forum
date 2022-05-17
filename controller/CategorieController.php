<?php

namespace Controller;

use Model\Connect;

class CategorieController
{
    public function afficherCategories() // Afficher les topics
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->query('SELECT id_categorie,nomCategorie FROM categorie
        ');
        $path = 'view/affichercategories.php';
        require $path;
    }
}
