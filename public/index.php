<?php
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
    else{
        include('../templates/404.php');
    }