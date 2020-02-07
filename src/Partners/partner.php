<?php
$requ = $bdd->prepare("SELECT * FROM acteur WHERE id_acteur = ?");
$requ->execute(array($_GET['acteur']));
$partner = $requ->fetch();

if(empty($partner)){
	header("Location: /404");
}

$id = $partner['id_acteur'];

$likes = $bdd->prepare('SELECT id FROM likes WHERE id_acteur = ?');
$likes->execute(array($id));
$likes = $likes->rowCount();
$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_acteur = ?');
$dislikes->execute(array($id));
$dislikes = $dislikes->rowCount();


?>