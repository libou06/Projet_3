<?php

    if(!isset($_GET['page']) || $_GET['page']=="home") {
        include('../templates/home.php');
    }
    elseif($_GET['page']=="connexion"){
        //Include page connexion
    }
    else{
        //Include template 404
    }