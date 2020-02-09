<?php

if(isset($_POST['validation_post'])){
    $ins = $bdd->prepare('INSERT INTO post (id_user, id_acteur, date_add, post) VALUES (?, ?, NOW(), ?)');
    $ins->execute(array($_SESSION['user']['id_user'], $_GET['acteur'], $_POST['post']));
}

$resultat = $bdd->prepare("SELECT id_user, post, DATE_FORMAT(date_add, '%d/%m/%Y') AS dateFormat FROM post WHERE id_acteur=? AND id_user=? ORDER BY id_post DESC");
$resultat->execute(array($_GET['acteur'], $_SESSION['user']['id_user']));

	$rows = $resultat->rowCount();   
	print('<h3>'  . $rows . ' Commentaire(s)</h3>');

	while($commentaire = $resultat->fetch())
	{

        $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
        $requser->execute(array($commentaire['id_user']));
        $userinfo = $requser->fetch();

		echo '<div id="message">';
		echo '<div>Commentaire:<br/>' . $commentaire['post'] . '</div>';
		echo '<div>Par: ' .  $userinfo['username'] . ', le: ' . $commentaire['dateFormat'] . '</div>';
		echo '</div>';
	}

?>