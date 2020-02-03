<?php

if($_POST)
{

	if(!empty($_POST['id_user']) && !empty($_POST['post']))
	{
		$bdd->query("INSERT INTO post (id_user, post, date_add) VALUES ('$_POST[id_user]', '$_POST[post]', NOW())") OR DIE ($bdd->error);       
		echo 'Votre message a bien été enregistré.';
	}
	else
	{
		echo 'Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire';
	}

}

	$resultat = $bdd->query("SELECT id_user, post, DATE_FORMAT(date_add, '%d/%m/%Y') AS datefr FROM post ORDER BY date_add DESC"); 

	$rows = $resultat->rowCount();   
	print('<h3>'  . $rows . ' Commentaire(s)</h3>');

	while($commentaire = $resultat->fetch())
	{
		echo '<div id="message">';
		echo '<div>Commentaire:<br/>' . $commentaire['post'] . '</div>';
		echo '<div>Par: ' . $commentaire['id_user'] . ', le: ' . $commentaire['datefr'] . '</div>';
		echo '</div>';
	}

?>