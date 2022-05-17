<?php

namespace Controller;

use Model\Connect;

class PostController
{
    public function afficherPosts($id) // Afficher les posts
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->prepare("SELECT id_post,message,verouille,id_topic, DATE_FORMAT(createdAt, '%Y') AS creation,
        FROM post ORDER BY createdAt
        WHERE id_topic = :id");
        $requete->execute(['id' => $id]);
        $path = 'view/afficherposts.php';
        require $path;
    }
}
