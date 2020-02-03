<?php

//requet sql SELECT * FROM Acteur
//$partners = reusltat de ta requete

$pdoStat = $bdd->prepare('SELECT * FROM acteur');

$executeIsOK = $pdoStat->execute();

$partners = $pdoStat->fetchAll();

?>

