<?php

namespace Controller;

use Model\Connect;

class TopicController
{
    public function afficherTopics($id) // Afficher les topics
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->prepare("SELECT t.id_topic,t.titre,t.verouille,m.pseudo, DATE_FORMAT(createdAt, '%Y-%m-%d') AS creation
        FROM topic t
        INNER JOIN membre m
        ON t.id_membre = m.id_membre
        WHERE t.id_categorie = :id
        ORDER BY createdAt");
        $requete->execute(['id' => $id]);
        $path = 'view/affichertopics.php';
        require $path;
    }

    public function detailTopics($id) // Afficher les topics
    {
        $bdd = Connect::seConnecter();
        // Prépare et Exécute une requête SQL sans marque substitutive
        $requete = $bdd->prepare("SELECT t.id_topic,t.titre,t.verouille,m.pseudo, DATE_FORMAT(createdAt, '%Y-%m-%d') AS creation
                                FROM topic t
                                INNER JOIN membre m
                                ON t.id_membre = m.id_membre
                                WHERE id_topic = :id
                                ");
        $requete->execute(['id' => $id]);

        $requete_post = $bdd->prepare("SELECT p.id_post,p.message, m.pseudo, DATE_FORMAT(createdAt, '%Y-%m-%d') AS creation
    FROM post p
    INNER JOIN membre m
    ON p.id_membre = m.id_membre
    WHERE id_topic = :id");
        $requete_post->execute(['id' => $id]);

        $requete_utilisateur = $bdd->prepare('
        SELECT id_membre,pseudo
        FROM membre
        ');
        $requete_utilisateur->execute(['id' => $id]);
        $path = 'view/detailtopic.php';
        require $path;
    }

    public function addMessage() // Requete préparé de l'ajout d'un acteur
    {
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $utilisateur = filter_input(INPUT_POST, 'id_utilisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_topic = filter_input(INPUT_POST, 'id_topic', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $createdAt = filter_input(INPUT_POST, 'createdAt', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($message && $utilisateur && $id_topic) {
            $bdd = Connect::seConnecter();
            $requete = $bdd->prepare('INSERT INTO post (id_topic,id_membre,message,createdAt) VALUES (:id_topic,:id_membre,:message,:createdAt)');
            $requete->execute([
                'id_topic' => $id_topic,
                'id_membre' => $utilisateur,
                'message' => htmlentities($message),
                'createdAt' => $createdAt,
 ]);
            header('location:'.$_SERVER['HTTP_REFERER']);
            die();
        } else {
            echo 'Service indisponible';
        }
    }

    public function VuaddTopic()
    {
        $bdd = Connect::seConnecter();
        $requete_membre = $bdd->query('SELECT id_membre, pseudo
                                FROM membre
                                ');
        $requete_categorie = $bdd->query('SELECT id_categorie, nomCategorie
         FROM categorie
         ');
        $path = 'view/ajoutertopic.php';
        require $path;
    }

    public function addTopic()
    {
        $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $createdAt = filter_input(INPUT_POST, 'createdAt', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $verouille = filter_input(INPUT_POST, 'verouille', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_membre = filter_input(INPUT_POST, 'id_membre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($titre && $createdAt && $verouille && $id_membre && $id_categorie) {
            $bdd = Connect::seConnecter();
            $requete = $bdd->prepare('INSERT INTO topic (titre,createdAt,verouille,id_categorie,id_membre) VALUES (:titre,:createdAt,:verouille,:id_categorie,:id_membre)');
            $requete->execute([
                'titre' => $titre,
                'createdAt' => $createdAt,
                'verouille' => $verouille,
                'id_membre' => $id_membre,
                'id_categorie' => $id_categorie,
 ]);
            header('location: index.php?action=affichercategories');
            die();
        } else {
            echo 'Service indisponible';
        }
    }
}
