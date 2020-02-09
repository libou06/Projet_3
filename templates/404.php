<!DOCTYPE html>
<?php
include('../src/connect_database.php');
?>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
      <?php include("link_css.php"); ?>
	<title>Page 404</title>
</head>

<body>

	<?php include("header.php"); ?><hr>
	
	<section id="error404">
		<h2>404 Page Not Found !</h2>
		<p>La page que vous recherchez n'existe pas !</p>
		<a href="accueil">Retour à la page d'accueil</a>
		
	</section>

	<?php include("footer.php"); ?>
	
</body>
</html>