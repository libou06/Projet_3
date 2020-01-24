<?php
    if(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="accueil") {
        include('../templates/accueil.php');
    }
    elseif(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="connexion") {
        include('../templates/connexion.php');
    	//Include page connexion
    }
    elseif(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="partenaire") {
        include('../templates/partenaire.php');
    }
    elseif(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="inscription") {
        include('../templates/inscription.php');
    }
    elseif(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page']=="profil") {
        include('../templates/profil.php');
    }
    else{
        //Include template 404
    }
    ?>