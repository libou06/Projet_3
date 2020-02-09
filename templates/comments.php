<!DOCTYPE html>

<?php
include('../src/connect_database.php');

if(!isset($_SESSION['user'])){
    header("Location: /connexion");
}

?>

<html lang="fr">

<head>
	<meta charset="utf-8" />
	<?php include("link_css.php"); ?>
	<title>Partenaire GBAF </title>
</head>

<body>
	<?php include("header.php"); ?>
	<hr>
	<div id="container" >

		<form action="/partenaire/<?php echo $_GET['acteur']?>" method="POST">

			<h2>Laisser votre commentaire</h2>
            <label for="post"></label>
            <textarea id="post" name="post" placeholder="Laisser votre commentaie ici" required></textarea><br/>			

			<input type="submit" name="validation_post" value="Envoyer">

		</form>

	</div>

	<?php include("footer.php"); ?>

</body>

</html>
