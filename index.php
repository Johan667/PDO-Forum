<?php

use Controller\CategorieController;
use Controller\ConnexionController;
use Controller\MembreController;
use Controller\PostController;
use Controller\TopicController;

// On charges nos classes grace à la fonction autoload
spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

// On crée le controller pour afficher les informations voulues selon l'action
$ControllerTopic = new TopicController();
$ControllerPost = new PostController();
$ControllerMembre = new MembreController();
$ControllerCategorie = new CategorieController();
$ControllerConnexion = new ConnexionController($connexion);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'inscription': $ControllerConnexion->Inscription();
        break;
        case 'vuinscription': $ControllerConnexion->VuInscription();
        break;
        case 'login': $ControllerConnexion->Login($connexion);
        break;
        case 'vulogin': $ControllerConnexion->VuLogin();
        break;
        case 'vuAddTopic': $ControllerTopic->VuaddTopic();
        break;
        case 'ajoutertopic': $ControllerTopic->addTopic();
        break;
        case 'ajoutermessage': $ControllerTopic->addMessage();
        break;
        case 'affichertopics': $ControllerTopic->afficherTopics($_GET['id']);
        break;
        case 'detailtopic': $ControllerTopic->detailTopics($_GET['id']);
        break;
        case 'afficherposts': $ControllerPost->afficherPosts($_GET['id']);
        break;
        case 'affichermembres': $ControllerMembre->afficherMembres();
        break;
        case 'detailmembre': $ControllerMembre->detailMembre($_GET['id']);
        break;
        case 'affichercategories': $ControllerCategorie->afficherCategories();
        break;
    }
}
