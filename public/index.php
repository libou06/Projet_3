<?php
session_start();
    if(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="accueil") {
        include('../templates/home.php');
    }
    elseif($_GET['page']=="connexion") {
        include('../templates/login.php');
    }
    elseif($_GET['page']=="partenaire") {
        include('../templates/partners.php');
    }
    elseif($_GET['page']=="inscription") {
        include('../templates/registration.php');
    }
    elseif($_GET['page']=="profil") {
        include('../templates/profile.php');
    }
    elseif($_GET['page']=="commentaire") {
        include('../templates/comments.php');
    }
    elseif($_GET['page']=="deconnexion") {
        include('../templates/logout.php');
    }
    else{
        include('../templates/404.php');
    }