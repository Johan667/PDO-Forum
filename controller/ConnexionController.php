<?php

namespace Controller;

use Model\Connect;

class ConnexionController
{
    private $_connexion;
    private $_user;

    public function __construct($connexion)
    {
        $this->_connexion = $connexion;
    }

    public function VuLogin()
    {
        $path = 'view/accueil.php';
        require $path;
    }

    public function Login($pseudo)
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($pseudo && $pass) {
            $bdd = Connect::seConnecter();
            $requete = $bdd->query('SELECT pseudo,pass 
            FROM membre WHERE pseudo = :pseudo');
            header('location: index.php?action=affichercategories');
            die();
        } else {
            echo 'Service indisponible';
        }
    }

    public function VuInscription()
    {
        $path = 'view/inscription.php';
        require $path;
    }

    public function Inscription()
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($pseudo && $pass) {
            $bdd = Connect::seConnecter();
            $requete = $bdd->prepare('INSERT INTO membre (pseudo,pass,mail,role) VALUES (:pseudo,:pass,:mail,:role)');
            $requete->execute([
            'pseudo' => $pseudo,
            'pass' => $pass,
            'email' => $pass,
            'role' => $role,
        ]);
            header('location:index.php?login');
            die();
        } else {
            echo 'Service indisponible';
        }
    }
}
