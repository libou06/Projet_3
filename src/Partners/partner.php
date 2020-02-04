<?php
$requ = $bdd->prepare("SELECT * FROM acteur WHERE id_acteur = ?");
$requ->execute(array($_GET['acteur']));
$partner = $requ->fetch();

if(empty($partner)){
    header("Location: /404");
}