<?php

namespace Controller;

use Model\Connect;

class MembreController
{
    public function afficherMembres() // Afficher les topics
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->query('SELECT id_membre,pseudo,role FROM membre');
        $path = 'view/affichermembres.php';
        require $path;
    }

    public function detailMembre($id) // Afficher les topics
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->prepare('SELECT pseudo,role
                                FROM membre 
                                WHERE id_membre = :id
                                ');
        $requete->execute(['id' => $id]);
        $path = 'view/detailmembre.php';
        require $path;
    }
}
