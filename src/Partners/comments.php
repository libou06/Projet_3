<?php

if($_POST)
{

	if(!empty($_POST['username']) && !empty($_POST['post']))
	{
		$bdd->query("INSERT INTO post (username, post, date_add) VALUES ('$_POST[username]', '$_POST[post]', NOW())") OR DIE ($bdd->error);       
		echo 'Votre message a bien été enregistré.';
	}
	else
	{
		echo 'Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire';
	}

}

	$resultat = $bdd->query("SELECT username, post, DATE_FORMAT(date_add, '%d/%m/%Y') AS datefr FROM post ORDER BY date_add DESC"); 

	$rows = $resultat->rowCount();   
	print('<h3>'  . $rows . ' Commentaire(s)</h3>');

	while($commentaire = $resultat->fetch())
	{
		echo '<div id="message">';
		echo '<div>Commentaire:<br/>' . $commentaire['post'] . '</div>';
		echo '<div>Par: ' . $commentaire['username'] . ', le: ' . $commentaire['datefr'] . '</div>';
		echo '</div>';
	}

?>