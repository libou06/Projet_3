<!DOCTYPE html>

<?php
include('../src/connect_database.php');
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

		<form action="partenaire" method="POST">

			<h2>Laisser votre commentaire</h2>

			<label for="username"></label>
			<input type="text" id="username" name="username" placeholder= <?php echo $_SESSION['user']['username']; ?> required><br>

            <label for="post"></label>
            <textarea id="post" name="post" placeholder="Laisser votre commentaie ici" required></textarea><br/>			

			<input type="submit" name="validation_post" value="Envoyer">

			<?php
			if(isset($erreur)) {
				echo '<span style="color: red; ">' .$erreur. "</span>";
			}
			?>

		</form>

	</div>

	<?php include("footer.php"); ?>

</body>

</html>
